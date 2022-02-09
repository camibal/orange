<script type="text/javascript">
    //Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaAbonos').DataTable(
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

  //Funcion para validar abono menor o igual a saldo
  function carga_saldo(){
    fkID_ingreso = $("#fkID_ingreso").val();
    $.ajax({
      url: "../controlador/ajaxAbono.php",
      data: "fkID_ingreso="+fkID_ingreso+"&tipo=consulta_ingreso",
      dataType: 'json'
    })
    .done(function(data) {
      $.each(data[0], function( key, value ) {
        if(key == "saldo_ingreso"){
          saldo_ingreso = value;
        }
      });
      
      saldo_ingreso = parseInt(saldo_ingreso);
      $("#saldo_ingreso").val(saldo_ingreso);
    })
    .fail(function(data) {
      console.log(data);
    })
    .always(function(data) {
      console.log(data);
    });
  }

    //Funcion boton crear abono
    $("#btn_crear_abono").click(function(){
        $("#modalAbonoLabel").text("Crear abono");
        $("#btn_guardar_abono").attr("data-accion","crear");
        $("#form_abono")[0].reset();
        $("#btn_guardando").hide();
        limpiar_campos();
    });

    //Funcion guardar abono
    $("#btn_guardar_abono").click(function(){
        resultado = campos_incompletos();
        if(resultado == true){
          resultado_abono = validar_abono();
          if (resultado_abono == true) {
            accion = $(this).attr('data-accion');
            if(accion == 'crear'){
              crea_abono();
              return false;
            }
          } else {
            return false;
          }
        }
    });

    //Funcion validar abono
    function validar_abono(){
      saldo_ingreso = parseInt($("#saldo_ingreso").val());
      valor_abono = parseInt($("#valor_abono").val());
      var bandera = true;
      if(valor_abono > saldo_ingreso){ 
        bandera = false;
        marcar_campos("#valor_abono", 'incorrecto');
      } else {
        marcar_campos("#valor_abono", 'correcto');
      }
      if(bandera == false){
        alertify.alert(
          'Abono mayor al saldo',
          'El valor del abono no puede ser mayor al saldo',
          function(){
            alertify.error('Abono mayor al saldo');
        });
        return false;
      } else {
        return true;
      }
    }

    //Campos incompletos
    function campos_incompletos(){
      var bandera = true;
      if($("#fecha_abono").val() == ""){
        bandera = false;
        marcar_campos("#fecha_abono", 'incorrecto');
      } else {
        marcar_campos("#fecha_abono", 'correcto');
      }
      if($('#fkID_cliente').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_cliente", 'incorrecto');
      } else {
        marcar_campos("#fkID_cliente", 'correcto');
      }
      if($('#fkID_ingreso').val().trim() == 0){
        bandera = false;
        marcar_campos("#fkID_ingreso", 'incorrecto');
      } else {
        marcar_campos("#fkID_ingreso", 'correcto');
      }
      if($("#valor_abono").val() == ""){
        bandera = false;
        marcar_campos("#valor_abono", 'incorrecto');
      } else {
        marcar_campos("#valor_abono", 'correcto');
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

    //Funcion para guardar el abono
    function crea_abono(){
        fkID_cliente = $("#fkID_cliente").val();
        fkID_ingreso = $("#fkID_ingreso").val();
        fecha_abono = $("#fecha_abono").val();
        valor_abono = $("#valor_abono").val();
        obs_abono = $("#obs_abono").val();

        $.ajax({
          url: "../controlador/ajaxAbono.php",
          data: 'fkID_cliente='+fkID_cliente+'&fecha_abono='+fecha_abono+'&fkID_ingreso='+fkID_ingreso+'&obs_abono='+obs_abono+'&valor_abono='+valor_abono+'&tipo=inserta'
        })
        .done(function(data) {
          //---------------------
          $("#btn_guardar_abono").hide();
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
        $("#modalAbono").removeClass("show");
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        $('#tabla').load('abonos/index.php');
    }

    //Carga eventos
    carga_eventos();


    //Funcion para eliminar el abono
    function elimina_abono(id_persona){
        $.ajax({
          url: "../controlador/ajaxAbono.php",
          data: 'id_abono='+id_abono+'&tipo=elimina_logico'
        })
        .done(function(data) {
          //---------------------
          $("#btn_eliminar_abono").hide();
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

    //Funcion eliminar
    function evento_eliminar(){
        //Funcion eliminar equipo
        $("[name*='btn_eliminar']").click(function(){
            id_abono = $(this).attr('data-id-abono');
            $("#btn_eliminar_abono").attr("data-id-abono",id_abono);
            $("#btn_eliminando").hide();
        });

        //Funcion eliminar abono
        $("[name*='btn_eliminar_abono']").click(function(){
            id_abono = $(this).attr('data-id-abono');
            elimina_abono(id_abono);
        });
    }

    //Funcion para pasar eventos
    function carga_eventos(){
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

    //Funcion solo permite numeros
    $(function(){
        $(".soloNumeros").keydown(function(event){
            //alert(event.keyCode);
            if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !==110 && event.keyCode !==8 && event.keyCode !==9){
                return false;
            }
        });
    });

    //Funcion para cargar ingresos segun cliente
    $("#fkID_cliente").change(function(){
      vaciar_ingresos();
      carga_ingresos();
    });

    //Funcion para cargar saldo del ingreso
    $("#fkID_ingreso").change(function(){
      $("#saldo_ingreso").val("");
      carga_saldo();
    });

    //Vacia el select ingresos
    function vaciar_ingresos(){
      $('#fkID_ingreso')[0].options.length = 0;
      $('#fkID_ingreso').append(new Option('Seleccione...', 0));
    }

  //Funcion para cargar ingresos segun cliente
  function carga_ingresos(){
    id_cliente = $("#fkID_cliente").val();
      $.ajax({
          url: "../controlador/ajaxAbono.php",
          data: "id_cliente="+id_cliente+"&tipo=carga_ingresos",
          dataType: 'json'
      })
      .done(function(data) {
        for (var i = 0; i < data.length; i++) {
          $.each(data[i], function( key, value ) {
              if(key == "id_ingreso"){
                optionValue = value;
              }
              if(key == "fecha_ingreso"){
                optionText = value;
              }
              if(key == "descripcion_ingreso"){
                optionText = optionText + '-' + value;
              }
              if(key == "saldo_ingreso"){
                optionText = optionText + '-' + value;
              }
          });
          $('#fkID_ingreso').append(new Option(optionText, optionValue));
        }
      })
      .fail(function(data) {
        alertify.alert(
          'Cliente sin saldos',
          'El cliente seleccionado no tiene saldos pendientes',
          function(){
            alertify.error('No hay saldos pendientes');
        });
        return false;
      })
      .always(function(data) {
          console.log(data);
      });
  };
</script>
