<script type="text/javascript">
    //Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaIngresos').DataTable(
            {
                "pagingType": "full_numbers",
                "lengthMenu": [[ 10, 25, 50, -1], [ 10, 25, 50, "Todos"]],
                "language": {
                    "lengthMenu":     "Mostrando _MENU_ registros",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                    "search":         "Buscar:",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "zeroRecords": "No hay registros que coincidan.",
                    "infoEmpty": "No se encuentran registros.",
                    "infoFiltered":   "(Filtrando _MAX_ registros en total)",
                    "paginate": {
                        "first":      "<--",
                        "last":       "-->",
                        "next":       ">",
                        "previous":   "<"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                },
                "order": []
            }
        );
    });

    //Funcion boton crear ingreso
    $("#btn_crear_ingreso").click(function(){
        $("#modalIngresoLabel").text("Crear ingreso");
        $("#btn_guardar_ingreso").attr("data-accion","crear");
        $("#form_ingreso")[0].reset();
        $("#btn_guardando").hide();
        limpiar_campos();
    });

    //Funcion guardar ingreso
    $("#btn_guardar_ingreso").click(function(){
        resultado = campos_incompletos();
        if(resultado == true){
            //Valida que el abono no sea mayor al valor total
            valor = valida_saldo();
            if(valor == true){
              accion = $(this).attr('data-accion');
              if(accion == 'crear'){
                crea_ingreso();
              }
              if(accion == 'editar'){
                edita_ingreso();
                return false;
              }
            }
        }
    });

    //Campos incompletos
    function campos_incompletos(){
      var bandera = true;
      if($("#fecha_ingreso").val().length == 0){
        bandera = false;
        marcar_campos("#fecha_ingreso", 'incorrecto');
      } else {
        marcar_campos("#fecha_ingreso", 'correcto');
      }
      if($('#fkID_cliente').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_cliente", 'incorrecto');
      } else {
        marcar_campos("#fkID_cliente", 'correcto');
      }
      if($('#fkID_categoria').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_categoria", 'incorrecto');
      } else {
        marcar_campos("#fkID_categoria", 'correcto');
      }
      if($("#valor_ingreso").val().length == 0){
        bandera = false;
        marcar_campos("#valor_ingreso", 'incorrecto');
      } else {
        marcar_campos("#valor_ingreso", 'correcto');
      }
      if($("#abono_ingreso").val().length == 0){
        bandera = false;
        marcar_campos("#abono_ingreso", 'incorrecto');
      } else {
        marcar_campos("#abono_ingreso", 'correcto');
      }
      if($("#saldo_ingreso").val().length == 0){
        bandera = false;
        marcar_campos("#saldo_ingreso", 'incorrecto');
      } else {
        marcar_campos("#saldo_ingreso", 'correcto');
      }
      if(bandera == false){
        alertify.alert(
          'Campos incompletos',
          'Los campos con * son obligatorios',
          function(){
            alertify.error('Campos vacios');
        });
        return false;
      } else {
        return true;
      }
    }

  //Funcion para marcar los campos
  function marcar_campos(campo, tipo){
    if(tipo == 'correcto'){
      $(campo).removeClass('is-invalid');
      $(campo).addClass('is-valid');
    }
    if(tipo == 'incorrecto'){
      $(campo).removeClass('is-valid');
      $(campo).addClass('is-invalid');
    }
  }

    //Funcion para guardar el ingreso
    function crea_ingreso(){
        fecha_ingreso = $("#fecha_ingreso").val();
        fkID_cliente = $("#fkID_cliente").val();
        fkID_categoria = $("#fkID_categoria").val();
        descripcion_ingreso = $("#descripcion_ingreso").val();
        valor_ingreso = $("#valor_ingreso").val();
        abono_ingreso = $("#abono_ingreso").val();
        saldo_ingreso = $("#saldo_ingreso").val();

        $.ajax({
          url: "../controlador/ajaxIngreso.php",
          data: 'fecha_ingreso='+fecha_ingreso+'&fkID_cliente='+fkID_cliente+'&fkID_categoria='+fkID_categoria+'&descripcion_ingreso='+descripcion_ingreso+'&valor_ingreso='+valor_ingreso+'&abono_ingreso='+abono_ingreso+'&saldo_ingreso='+saldo_ingreso+'&tipo=inserta'
        })
        .done(function(data) {
          //---------------------
          $("#btn_guardar_ingreso").hide();
          $("#btn_guardando").show();
          alertify.success('Creado correctamente');
          setTimeout('cargar_sitio()',1000);
        })
        .fail(function(data) {
          console.log(data);
        })
        .always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar sitio
    function cargar_sitio(){
        $("#modalIngreso").removeClass("show");
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        $('#tabla').load('ingresos/index.php');
    }

    //Carga eventos
    carga_eventos();

    //Carga el ingreso por el ID
    function carga_ingreso(id_ingreso){

        console.log("Carga el ingreso "+ id_ingreso);

        $.ajax({
            url: "../controlador/ajaxIngreso.php",
            data: "id_ingreso="+id_ingreso+"&tipo=consulta",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
              console.log(key+"--"+value);
              $("#"+key).val(value);
            });

            id_ingreso = data.id_ingreso;
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion para guardar el ingreso
    function edita_ingreso(){
        id_ingreso = $("#id_ingreso").val();
        fecha_ingreso = $("#fecha_ingreso").val();
        fkID_cliente = $("#fkID_cliente").val();
        fkID_categoria = $("#fkID_categoria").val();
        descripcion_ingreso = $("#descripcion_ingreso").val();
        valor_ingreso = $("#valor_ingreso").val();
        abono_ingreso = $("#abono_ingreso").val();
        saldo_ingreso = $("#saldo_ingreso").val();

        $.ajax({
          url: "../controlador/ajaxIngreso.php",
          data: 'id_ingreso='+id_ingreso+'&fecha_ingreso='+fecha_ingreso+'&fkID_cliente='+fkID_cliente+'&fkID_categoria='+fkID_categoria+'&descripcion_ingreso='+descripcion_ingreso+'&valor_ingreso='+valor_ingreso+'&abono_ingreso='+abono_ingreso+'&saldo_ingreso='+saldo_ingreso+'&tipo=edita'
        })
        .done(function(data) {
          //---------------------
          $("#btn_guardar_ingreso").hide();
          $("#btn_guardando").show();
          alertify.success('Editado correctamente');
          setTimeout('cargar_sitio()',1000);
        })
        .fail(function(data) {
          console.log(data);
        })
        .always(function(data) {
          console.log(data);
        });
    }


    //Funcion para eliminar el ingreso
    function elimina_ingreso(id_persona){
        $.ajax({
          url: "../controlador/ajaxIngreso.php",
          data: 'id_ingreso='+id_ingreso+'&tipo=elimina_logico'
        })
        .done(function(data) {
          //---------------------
          $("#btn_eliminar_ingreso").hide();
          $("#btn_cancelar").hide();
          $("#btn_eliminando").show();
          alertify.success('Eliminado correctamente');
          setTimeout('cargar_sitio()',1000);
        })
        .fail(function(data) {
          console.log(data);
        })
         always(function(data) {
          console.log(data);
        });
    }

    //Funcion editar
    function evento_editar(){
        //Funcion guardar equipo
        $("[name*='btn_editar']").click(function(){
            id_ingreso = $(this).attr('data-id-ingreso');
            $("#modalIngresoLabel").text("Editar ingreso");
            carga_ingreso(id_ingreso);
            $("#btn_guardar_ingreso").attr("data-accion","editar");
            $("#btn_guardando").hide();
            $("#abono_ingreso").attr("readonly","readonly");
            limpiar_campos();
        });
    }

    //Funcion eliminar
    function evento_eliminar(){
        //Funcion eliminar equipo
        $("[name*='btn_eliminar']").click(function(){
            id_ingreso = $(this).attr('data-id-ingreso');
            $("#btn_eliminar_ingreso").attr("data-id-ingreso",id_ingreso);
            $("#btn_eliminando").hide();
        });

        //Funcion eliminar ingreso
        $("[name*='btn_eliminar_ingreso']").click(function(){
            id_ingreso = $(this).attr('data-id-ingreso');
            alert(id_ingreso)
            // elimina_ingreso(id_ingreso);
        });
    }

    //Funcion para pasar eventos
    function carga_eventos(){
        evento_editar();
        evento_eliminar();
        evento_paginar();
    }

  //Funcion para paginar
  function evento_paginar(){
    //Funcion para pasar eventos
      $(".paginate_button ").click(function(){
          carga_eventos();
      });

    //Funcion para pasar eventos
      $("[type*='search']").keypress(function(){
          carga_eventos();
      });
  }

  //Funcion para limpiar campos
  function limpiar_campos(){
    $("input").removeClass('is-invalid');
    $("input").removeClass('is-valid');
    $("select").removeClass('is-invalid');
    $("select").removeClass('is-valid');
  }

    //Funcion boton crear cliente
  $("#btn_crear_cliente").click(function(){
    $("#modalClienteLabel").text("Crear cliente");
    $("#btn_guardar_cliente").attr("data-accion","crear");
    $("#form_cliente")[0].reset();
    $("#btn_guardando_cliente").hide();
    $("#abono_ingreso").removeAttr("readonly");
    limpiar_campos();
  });

    //Funcion guardar cliente
    $("#btn_guardar_cliente").click(function(){
        validar_cliente();
        return false;
    });

    //Valida campos de cliente
    function validar_cliente(){
      var bandera = true;
      if($("#nombres_cliente").val().length == 0){
        bandera = false;
        marcar_campos("#nombres_cliente", 'incorrecto');
      } else {
        marcar_campos("#nombres_cliente", 'correcto');
      }
      if($('#celular_cliente').val().trim() == 0){
        bandera = false;
        marcar_campos("#celular_cliente", 'incorrecto');
      }  else {
        marcar_campos("#celular_cliente", 'correcto');
      }
      if(bandera == false){
       alertify.alert(
          'Campos incompletos',
          'Los campos con * son obligatorios',
          function(){
            alertify.error('Campos vacios');
        });
        return false;
      } else {
        crea_cliente();
      }
    }

    //Funcion para guardar el cliente
    function crea_cliente(){
      nombres_cliente = $("#nombres_cliente").val();
      apellidos_cliente = $("#apellidos_cliente").val();
      documento_cliente = $("#documento_cliente").val();
      rsocial_cliente = $("#rsocial_cliente").val();
      email_cliente = $("#email_cliente").val();
      celular_cliente = $("#celular_cliente").val();

      $.ajax({
        url: "../controlador/ajaxContacto.php",
        data: 'nombres_cliente='+nombres_cliente+'&apellidos_cliente='+apellidos_cliente+'&documento_cliente='+documento_cliente+'&rsocial_cliente='+rsocial_cliente+'&email_cliente='+email_cliente+'&celular_cliente='+celular_cliente+'&tipo=inserta_cliente'
      })
      .done(function(data) {
        console.log(data);
        $("#modalCliente").removeClass("show");
        $("#modalCliente").removeClass("modal-backdrop");
        carga_cliente();
      })
      .fail(function(data) {
        console.log(data);
      })
      .always(function(data) {
        console.log(data);
      });
    }

    //Funcion para cargar cliente
    function carga_cliente(){

        $.ajax({
            url: "../controlador/ajaxIngreso.php",
            data: "tipo=ultimo_cliente",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                if(key == "id_cliente"){
                    optionValue = value;
                }
                if(key == "nombres_cliente"){
                  optionText = value;
                }
                if(key == "apellidos_cliente"){
                  optionText = optionText+' '+value;
                }
                if(key == "rsocial_cliente"){
                  optionText = optionText+' '+value;
                }
            });
            $('#fkID_cliente').append(new Option(optionText, optionValue));
            $('#fkID_cliente').val(optionValue);
            alert('Guardado el cliente');
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion guardar categoria
    $("#btn_guardar_categoria").click(function(){
        resultado = campos_incompletos_categoria();
        if(resultado == true){
          validar_categoria();
        }        
        return false;
    });

    //Funcion para guardar el categoria
    function crea_categoria(){
        nombre_categoria = $("#nombre_categoria").val();

        $.ajax({
          url: "../controlador/ajaxIngreso.php",
          data: 'nombre_categoria='+nombre_categoria+'&tipo=inserta_categoria'
        })
        .done(function(data) {
          //---------------------
          console.log(data);
          $("#modalCategoria").removeClass("show");
          $("#modalCategoria").removeClass("modal-backdrop");
          carga_categoria();
          $("#nombre_categoria").val("");
        })
        .fail(function(data) {
          console.log(data);
        })
         always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar categoria
    function carga_categoria(){

        $.ajax({
            url: "../controlador/ajaxIngreso.php",
            data: "tipo=ultima_categoria",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                if(key == "id_categoria"){
                    optionValue = value;
                }
                if(key == "nombre_categoria")
                    optionText = value;
            });
            $('#fkID_categoria').append(new Option(optionText, optionValue));
            $('#fkID_categoria').val(optionValue);
            alert('Guardado la categoria');
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion para validar tipo de contacto
    function validar_categoria(){
        nombre_categoria = $("#nombre_categoria").val();

        $.ajax({
          url: "../controlador/ajaxIngreso.php",
          data: 'nombre_categoria='+nombre_categoria+'&tipo=valida_categoria',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
          if(data[0]["cantidad"] >0){
            alert('La categoria ya esta registrado');
            $("#nombre_categoria").val("");
            $("#nombre_categoria").focus();
          } else {
            crea_categoria();
          }
        })
        .fail(function(data) {
          console.log(data);
        });
    }

    //Funcion al cambiar el valor
    $("#valor_ingreso").blur(function(){
      calcula_saldo();
    });

    //Funcion al cambiar el abono
    $("#abono_ingreso").blur(function(){
      calcula_saldo();
    });

    //Funcion para calcular saldo
    function calcula_saldo(){
      valor_ingreso = $('#valor_ingreso').val();
      abono_ingreso = $('#abono_ingreso').val();
      saldo_ingreso = valor_ingreso - abono_ingreso;
      $('#saldo_ingreso').val(saldo_ingreso);
    }

    //Funcion para validar saldo
    function valida_saldo(){
      valor_ingreso = parseInt($('#valor_ingreso').val());
      abono_ingreso = parseInt($('#abono_ingreso').val());
      if(abono_ingreso > valor_ingreso){
          alertify.alert(
          'Abono ingreso',
          'El valor del abono no puede ser mayor al valor total',
          function(){
            alertify.error('Abono mayor a ingreso total');          
          });
          return false;
      } else {
        return true;
      }
    }

    //Campos incompletos
    function campos_incompletos_categoria(){
        var bandera = true;
        if($("#nombre_categoria").val() == ""){
            bandera = false;
            marcar_campos("#nombre_categoria", 'incorrecto');
        } else {
            marcar_campos("#nombre_categoria", 'correcto');
        }
        if(bandera == false){
            alertify.alert(
                'Campos incompletos',
                'Los campos con * son obligatorios',
                function(){
                    alertify.error('Campos vacios');
            });
            return false;
        } else {
            return true;
        }
    }

    //Funcion solo permite numeros
    $(function(){
        $(".soloNumeros").keydown(function(event){
            //alert(event.keyCode);
            if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !==110 && event.keyCode !==8 && event.keyCode !==9){
                return false;
            }
        });
    });
</script>
