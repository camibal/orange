<script type="text/javascript">
    //Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaEgresos').DataTable(
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

    //Funcion boton crear egreso
    $("#btn_crear_egreso").click(function(){
        $("#modalEgresoLabel").text("Crear egreso");
        $("#btn_guardar_egreso").attr("data-accion","crear");
        $("#form_egreso")[0].reset();
        $("#btn_guardando").hide();
        limpiar_campos();
    });

    //Funcion guardar egreso
    $("#btn_guardar_egreso").click(function(){
        resultado = campos_incompletos();
        if(resultado == true){
            //Valida que el abono no sea mayor al valor total
            valor = valida_saldo();
            if(valor == true){
              accion = $(this).attr('data-accion');
              if(accion == 'crear'){
                console.log('Entro a crea egreso');
                crea_egreso();
              }
              if(accion == 'editar'){
                edita_egreso();
                return false;
              }
            }
        }
    });

    //Campos incompletos
    function campos_incompletos(){
      var bandera = true;
      if($("#fecha_egreso").val().length == 0){
        bandera = false;
        marcar_campos("#fecha_egreso", 'incorrecto');
      } else {
        marcar_campos("#fecha_egreso", 'correcto');
      }
      if($('#fkID_proveedor').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_proveedor", 'incorrecto');
      } else {
        marcar_campos("#fkID_proveedor", 'correcto');
      }
      if($('#fkID_concepto').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_concepto", 'incorrecto');
      } else {
        marcar_campos("#fkID_concepto", 'correcto');
      }
      if($("#valor_egreso").val().length == 0){
        bandera = false;
        marcar_campos("#valor_egreso", 'incorrecto');
      } else {
        marcar_campos("#valor_egreso", 'correcto');
      }
      if($("#abono_egreso").val().length == 0){
        bandera = false;
        marcar_campos("#abono_egreso", 'incorrecto');
      } else {
        marcar_campos("#abono_egreso", 'correcto');
      }
      if($("#saldo_egreso").val().length == 0){
        bandera = false;
        marcar_campos("#saldo_egreso", 'incorrecto');
      } else {
        marcar_campos("#saldo_egreso", 'correcto');
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

    //Funcion para guardar el egreso
    function crea_egreso(){
        fecha_egreso = $("#fecha_egreso").val();
        fkID_proveedor = $("#fkID_proveedor").val();
        fkID_concepto = $("#fkID_concepto").val();
        descripcion_egreso = $("#descripcion_egreso").val();
        valor_egreso = $("#valor_egreso").val();
        abono_egreso = $("#abono_egreso").val();
        saldo_egreso = $("#saldo_egreso").val();

        $.ajax({
          url: "../controlador/ajaxEgreso.php",
          data: 'fecha_egreso='+fecha_egreso+'&fkID_proveedor='+fkID_proveedor+'&fkID_concepto='+fkID_concepto+'&descripcion_egreso='+descripcion_egreso+'&valor_egreso='+valor_egreso+'&abono_egreso='+abono_egreso+'&saldo_egreso='+saldo_egreso+'&tipo=inserta'
        })
        .done(function(data) {
          //---------------------
          $("#btn_guardar_egreso").hide();
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
        $("#modalEgreso").removeClass("show");
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        $('#tabla').load('egresos/index.php');
    }

    //Carga eventos
    carga_eventos();

    //Carga el egreso por el ID
    function carga_egreso(id_egreso){

        console.log("Carga el egreso "+ id_egreso);

        $.ajax({
            url: "../controlador/ajaxEgreso.php",
            data: "id_egreso="+id_egreso+"&tipo=consulta",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
              console.log(key+"--"+value);
              $("#"+key).val(value);
            });

            id_egreso = data.id_egreso;
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion para guardar el egreso
    function edita_egreso(){
        id_egreso = $("#id_egreso").val();
        fecha_egreso = $("#fecha_egreso").val();
        fkID_proveedor = $("#fkID_proveedor").val();
        fkID_concepto = $("#fkID_concepto").val();
        descripcion_egreso = $("#descripcion_egreso").val();
        valor_egreso = $("#valor_egreso").val();
        abono_egreso = $("#abono_egreso").val();
        saldo_egreso = $("#saldo_egreso").val();

        $.ajax({
          url: "../controlador/ajaxEgreso.php",
          data: 'id_egreso='+id_egreso+'&fecha_egreso='+fecha_egreso+'&fkID_proveedor='+fkID_proveedor+'&fkID_concepto='+fkID_concepto+'&descripcion_egreso='+descripcion_egreso+'&valor_egreso='+valor_egreso+'&abono_egreso='+abono_egreso+'&saldo_egreso='+saldo_egreso+'&tipo=edita'
        })
        .done(function(data) {
          //---------------------
          $("#btn_guardar_egreso").hide();
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


    //Funcion para eliminar el egreso
    function elimina_egreso(id_persona){
        $.ajax({
          url: "../controlador/ajaxEgreso.php",
          data: 'id_egreso='+id_egreso+'&tipo=elimina_logico'
        })
        .done(function(data) {
          //---------------------
          $("#btn_eliminar_egreso").hide();
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
            id_egreso = $(this).attr('data-id-egreso');
            $("#modalEgresoLabel").text("Editar egreso");
            carga_egreso(id_egreso);
            $("#btn_guardar_egreso").attr("data-accion","editar");
            $("#btn_guardando").hide();
            limpiar_campos();
        });
    }

    //Funcion eliminar
    function evento_eliminar(){
        //Funcion eliminar equipo
        $("[name*='btn_eliminar']").click(function(){
            id_egreso = $(this).attr('data-id-egreso');
            $("#btn_eliminar_egreso").attr("data-id-egreso",id_egreso);
            $("#btn_eliminando").hide();
        });

        //Funcion eliminar egreso
        $("[name*='btn_eliminar_egreso']").click(function(){
            id_egreso = $(this).attr('data-id-egreso');
            elimina_egreso(id_egreso);
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
    $(".paginate_button").click(function(){
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

    //Funcion boton crear proveedor
  $("#btn_crear_proveedor").click(function(){
    $("#modalProveedorLabel").text("Crear proveedor");
    $("#btn_guardar_proveedor").attr("data-accion","crear");
    $("#form_proveedor")[0].reset();
    $("#btn_guardando_proveedor").hide();
    limpiar_campos();
  });

    //Funcion guardar proveedor
    $("#btn_guardar_proveedor").click(function(){
        validar_proveedor();
        return false;
    });

    //Valida campos de proveedor
    function validar_proveedor(){
      var bandera = true;
      if($("#nombres_proveedor").val().length == 0){
        bandera = false;
        marcar_campos("#nombres_proveedor", 'incorrecto');
      } else {
        marcar_campos("#nombres_proveedor", 'correcto');
      }
      if($('#celular_proveedor').val().trim() == 0){
        bandera = false;
        marcar_campos("#celular_proveedor", 'incorrecto');
      }  else {
        marcar_campos("#celular_proveedor", 'correcto');
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
        crea_proveedor();
      }
    }

    //Funcion para guardar el proveedor
    function crea_proveedor(){
      nombres_proveedor = $("#nombres_proveedor").val();
      apellidos_proveedor = $("#apellidos_proveedor").val();
      documento_proveedor = $("#documento_proveedor").val();
      rsocial_proveedor = $("#rsocial_proveedor").val();
      email_proveedor = $("#email_proveedor").val();
      celular_proveedor = $("#celular_proveedor").val();

      $.ajax({
        url: "../controlador/ajaxEgreso.php",
        data: 'nombres_proveedor='+nombres_proveedor+'&apellidos_proveedor='+apellidos_proveedor+'&documento_proveedor='+documento_proveedor+'&rsocial_proveedor='+rsocial_proveedor+'&email_proveedor='+email_proveedor+'&celular_proveedor='+celular_proveedor+'&tipo=inserta_proveedor'
      })
      .done(function(data) {
        console.log(data);
        $("#modalProveedor").removeClass("show");
        $("#modalProveedor").removeClass("modal-backdrop");
        carga_proveedor();
      })
      .fail(function(data) {
        console.log(data);
      })
      .always(function(data) {
        console.log(data);
      });
    }

    //Funcion para cargar proveedor
    function carga_proveedor(){

        $.ajax({
            url: "../controlador/ajaxEgreso.php",
            data: "tipo=ultimo_proveedor",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                if(key == "id_proveedor"){
                    optionValue = value;
                }
                if(key == "nombres_proveedor"){
                  optionText = value;
                }
                if(key == "apellidos_proveedor"){
                  optionText = optionText+' '+value;
                }
                if(key == "rsocial_proveedor"){
                  optionText = optionText+' '+value;
                }
            });
            $('#fkID_proveedor').append(new Option(optionText, optionValue));
            $('#fkID_proveedor').val(optionValue);
            alert('Guardado el proveedor');
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion guardar concepto
    $("#btn_guardar_concepto").click(function(){
        resultado = campos_incompletos_concepto();
        if(resultado == true){
          validar_concepto();
          return false;
        }
        return false;
    });

    //Campos incompletos
    function campos_incompletos_concepto(){
      var bandera = true;
      if($("#nombre_concepto").val() == ""){
        bandera = false;
        marcar_campos("#nombre_concepto", 'incorrecto');
      } else {
        marcar_campos("#nombre_concepto", 'correcto');
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

    //Funcion para guardar el concepto
    function crea_concepto(){
        nombre_concepto = $("#nombre_concepto").val();

        $.ajax({
          url: "../controlador/ajaxEgreso.php",
          data: 'nombre_concepto='+nombre_concepto+'&tipo=inserta_concepto'
        })
        .done(function(data) {
          //---------------------
          console.log(data);
          $("#modalConcepto").removeClass("show");
          $("#modalConcepto").removeClass("modal-backdrop");
          carga_concepto();
          $("#nombre_concepto").val("");
        })
        .fail(function(data) {
          console.log(data);
        })
         always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar concepto
    function carga_concepto(){

        $.ajax({
            url: "../controlador/ajaxEgreso.php",
            data: "tipo=ultima_concepto",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                if(key == "id_concepto"){
                    optionValue = value;
                }
                if(key == "nombre_concepto")
                    optionText = value;
            });
            $('#fkID_concepto').append(new Option(optionText, optionValue));
            $('#fkID_concepto').val(optionValue);
            alert('Guardado el concepto');
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion para validar tipo de contacto
    function validar_concepto(){
        nombre_concepto = $("#nombre_concepto").val();

        $.ajax({
          url: "../controlador/ajaxEgreso.php",
          data: 'nombre_concepto='+nombre_concepto+'&tipo=valida_concepto',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
          if(data[0]["cantidad"] >0){
            alert('La concepto ya esta registrado');
            $("#nombre_concepto").val("");
            $("#nombre_concepto").focus();
          } else {
            crea_concepto();
          }
        })
        .fail(function(data) {
          console.log(data);
        });
    }

    //Funcion al cambiar el valor
    $("#valor_egreso").blur(function(){
      calcula_saldo();
    });

    //Funcion al cambiar el abono
    $("#abono_egreso").blur(function(){
      calcula_saldo();
    });

    //Funcion para calcular saldo
    function calcula_saldo(){
      valor_egreso = $('#valor_egreso').val();
      abono_egreso = $('#abono_egreso').val();
      saldo_egreso = valor_egreso - abono_egreso;
      $('#saldo_egreso').val(saldo_egreso);
    }

    //Funcion para validar saldo
    function valida_saldo(){
      valor_egreso = $('#valor_egreso').val();
      abono_egreso = $('#abono_egreso').val();
      if(abono_egreso > valor_egreso){
          alertify.alert(
          'Abono egreso',
          'El valor del abono no puede ser mayor al valor total',
          function(){
            alertify.error('Abono mayor a egreso total');          
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
            if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)  && event.keyCode !==110 && event.keyCode !==8 && event.keyCode !==9){
                return false;
            }
        });
    });
</script>
