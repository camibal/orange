<script type="text/javascript">
    //Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaContactos').DataTable(
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

    //Funcion boton crear contacto
    $("#btn_crear_contacto").click(function(){
        $("#modalContactoLabel").text("Crear contacto");
        $("#btn_guardar_contacto").attr("data-accion","crear");
        $("#form_contacto")[0].reset();
        $("#btn_guardando").hide();
        limpiar_campos();
    });

    //Funcion guardar contacto
    $("#btn_guardar_contacto").click(function(){
        resultado = campos_incompletos();
        if(resultado == true){
            accion = $(this).attr('data-accion');
            if(accion == 'crear'){
                crea_contacto();
            }
            if(accion == 'editar'){
                edita_contacto();
            }
        }
    });

    //Funcion guardar cargo
    $("#btn_guardar_cargo").click(function(){
        resultado = campos_incompletos_cargo();
        if(resultado == true){
          validar_cargo();
        }        
        return false;
    });

    //Funcion para guardar el cargo
    function crea_cargo(){
        nombre_cargo = $("#nombre_cargo").val();

        $.ajax({
          url: "../controlador/ajaxContacto.php",
          data: 'nombre_cargo='+nombre_cargo+'&tipo=inserta_cargo'
        })
        .done(function(data) {
          //---------------------
          console.log(data);
          $("#modalCargo").removeClass("show");
          $("#modalCargo").removeClass("modal-backdrop");
          carga_cargo();
          $("#nombre_cargo").val("");
        })
        .fail(function(data) {
          console.log(data);
        })
         always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar cargo
    function carga_cargo(){

        $.ajax({
            url: "../controlador/ajaxContacto.php",
            data: "id_contacto="+id_contacto+"&tipo=ultimo_cargo",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
                console.log(key+"--"+value);
                if(key == "id_cargo"){
                    optionValue = value;
                }
                if(key == "nombre_cargo")
                    optionText = value;
            });
            $('#fkID_cargo').append(new Option(optionText, optionValue));
            $('#fkID_cargo').val(optionValue);
            alert('Guardado el cargo');
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion para validar tipo de contacto
    function validar_cargo(){
        nombre_cargo = $("#nombre_cargo").val();

        $.ajax({
          url: "../controlador/ajaxContacto.php",
          data: 'nombre_cargo='+nombre_cargo+'&tipo=valida_cargo',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
          if(data[0]["cantidad"] >0){
            alert('El cargo ya esta registrado');
            $("#nombre_cargo").val("");
            $("#nombre_cargo").focus();
          } else {
            crea_cargo();
          }
        })
        .fail(function(data) {
          console.log(data);
        });
    }

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
    if($("#documento_cliente").val().length == 0){
      bandera = false;
      marcar_campos("#documento_cliente", 'incorrecto');
    } else {
      marcar_campos("#documento_cliente", 'correcto');
    }
    if($('#celular_cliente').val().trim() == 0){
      bandera = false;
      marcar_campos("#celular_cliente", 'incorrecto');
    }  else {
      marcar_campos("#celular_cliente", 'correcto');
    }
    if($("#email_cliente").val().length == 0){
      bandera = false;
      marcar_campos("#email_cliente", 'incorrecto');
    } else {
      marcar_campos("#email_cliente", 'correcto');
    }
    celular_cliente = $('#celular_cliente').val();
        if(celular_cliente.length < 10 || celular_cliente.length > 10){
      bandera = false;
      marcar_campos("#celular_cliente", 'incorrecto');
      alertify.alert(
        'Campo celular erroneo',
        'El número de celular debe ser de 10 dígitos.',
        function(){
          alertify.error('Campo celular');
      });
      return false;
        } 
      if($("#email_cliente").val().indexOf('@') == -1 || $("#email_cliente").val().indexOf('.') == -1) {
      bandera = false;
      marcar_campos("#email_cliente", 'incorrecto');
      alertify.alert(
        'Campo Email erroneo',
        'El formato de Email es erroneo.',
        function(){
          alertify.error('Campo Email');
      });
            return false;
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
            url: "../controlador/ajaxContacto.php",
            data: "id_contacto="+id_contacto+"&tipo=ultimo_cliente",
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

    //Funcion para validar tipo de contacto
    function validar_cargo(){
        nombre_cargo = $("#nombre_cargo").val();

        $.ajax({
          url: "../controlador/ajaxContacto.php",
          data: 'nombre_cargo='+nombre_cargo+'&tipo=valida_cargo',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
          if(data[0]["cantidad"] >0){
            alert('El cargo ya esta registrado');
            $("#nombre_cargo").val("");
            $("#nombre_cargo").focus();
          } else {
            crea_cargo();
          }
        })
        .fail(function(data) {
          console.log(data);
        });
    }

    //Campos incompletos
    function campos_incompletos(){
        var bandera = true;
        if($("#nombres_contacto").val() == ""){
            bandera = false;
            marcar_campos("#nombres_contacto", 'incorrecto');
        } else {
            marcar_campos("#nombres_contacto", 'correcto');
        }
        if($('#celular_contacto').val() == ""){
            bandera = false;
            marcar_campos("#celular_contacto", 'incorrecto');
        }  else {
            marcar_campos("#celular_contacto", 'correcto');
        }
        if($('#fkID_cargo').val().trim() == 0){
          bandera = false;
          marcar_campos("#fkID_cargo", 'incorrecto');
        } else {
          marcar_campos("#fkID_cargo", 'correcto');
        }
        if($('#fkID_cliente').val().trim() == 0){
          bandera = false;
          marcar_campos("#fkID_cliente", 'incorrecto');
        } else {
          marcar_campos("#fkID_cliente", 'correcto');
        }
        if($("#email_contacto").val() != ''){
          if($("#email_contacto").val().indexOf('@') == -1 || $("#email_contacto").val().indexOf('.') == -1) {
            bandera = false;
            marcar_campos("#email_contacto", 'incorrecto');
            alertify.alert(
              'Campo Email erroneo',
              'El formato de Email es erroneo.',
              function(){
                alertify.error('Campo Email');
            });
            return false;
          }
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

    //Campos incompletos
    function campos_incompletos_cargo(){
        var bandera = true;
        if($("#nombre_cargo").val() == ""){
            bandera = false;
            marcar_campos("#nombre_cargo", 'incorrecto');
        } else {
            marcar_campos("#nombre_cargo", 'correcto');
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

    //Funcion para guardar el contacto
    function crea_contacto(){
        nombres_contacto = $("#nombres_contacto").val();
        apellidos_contacto = $("#apellidos_contacto").val();
        fkID_cargo = $("#fkID_cargo").val();
        fkID_cliente = $("#fkID_cliente").val();
        email_contacto = $("#email_contacto").val();
        celular_contacto = $("#celular_contacto").val();

        $.ajax({
          url: "../controlador/ajaxContacto.php",
          data: 'nombres_contacto='+nombres_contacto+'&apellidos_contacto='+apellidos_contacto+'&fkID_cargo='+fkID_cargo+'&fkID_cliente='+fkID_cliente+'&email_contacto='+email_contacto+'&celular_contacto='+celular_contacto+'&tipo=inserta'
        })
        .done(function(data) {
          //---------------------
          $("#btn_guardar_contacto").hide();
          $("#btn_guardando").show();
          alertify.success('Creado correctamente');
          setTimeout('cargar_sitio()',1000);
        })
        .fail(function(data) {
          console.log(data);
        })
         always(function(data) {
          console.log(data);
        });
    }

    //Carga eventos
    carga_eventos();

    //Carga el contacto por el ID
    function carga_contacto(id_contacto){

        console.log("Carga el contacto "+ id_contacto);

        $.ajax({
            url: "../controlador/ajaxContacto.php",
            data: "id_contacto="+id_contacto+"&tipo=consulta",
            dataType: 'json'
        })
        .done(function(data) {

            $.each(data[0], function( key, value ) {
              console.log(key+"--"+value);
              $("#"+key).val(value);
            });

            id_contacto = data.id_contacto;
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion para guardar el contacto
    function edita_contacto(){
        id_contacto = $("#id_contacto").val();
        nombres_contacto = $("#nombres_contacto").val();
        apellidos_contacto = $("#apellidos_contacto").val();
        fkID_cargo = $("#fkID_cargo").val();
        fkID_cliente = $("#fkID_cliente").val();
        email_contacto = $("#email_contacto").val();
        celular_contacto = $("#celular_contacto").val();

        $.ajax({
          url: "../controlador/ajaxContacto.php",
          data: 'id_contacto='+id_contacto+'&nombres_contacto='+nombres_contacto+'&apellidos_contacto='+apellidos_contacto+'&fkID_cargo='+fkID_cargo+'&fkID_cliente='+fkID_cliente+'&email_contacto='+email_contacto+'&celular_contacto='+celular_contacto+'&tipo=edita'
        })
        .done(function(data) {
          //---------------------
          $("#btn_guardar_contacto").hide();
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

    //Funcion para eliminar el contacto
    function elimina_contacto(id_contacto){
        $.ajax({
          url: "../controlador/ajaxContacto.php",
          data: 'id_contacto='+id_contacto+'&tipo=elimina_logico'
        })
        .done(function(data) {
          //---------------------
          $("#btn_eliminar_contacto").hide();
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

    //Funcion para cargar sitio
    function cargar_sitio(){
        $("#modalContacto").removeClass("show");
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        $('#tabla').load('contactos/index.php');
    }

    //Funcion para pasar eventos
    $(".paginate_button").click(function(){
        carga_eventos();
    });

    //Funcion para pasar eventos
    $("[type*='search']").keypress(function(){
        carga_eventos();
    });

    //Funcion editar
    function evento_editar(){
        $("[name*='btn_editar']").click(function(){
            id_contacto = $(this).attr('data-id-contacto');
            console.log('Entro a editar contacto');
            $("#modalContactoLabel").text("Editar contacto");
            carga_contacto(id_contacto);
            $("#btn_guardar_contacto").attr("data-accion","editar");
            $("#btn_guardando").hide();
            limpiar_campos();
        });
    }

    //Funcion eliminar
    function evento_eliminar(){
        //Funcion eliminar contacto
        $("[name*='btn_eliminar']").click(function(){
            $("#btn_eliminando").hide();
            id_contacto = $(this).attr('data-id-contacto');
            $("#btn_eliminar_contacto").attr("data-id-contacto",id_contacto);
        });

        //Funcion eliminar contacto
        $("[name*='btn_eliminar_contacto']").click(function(){
            id_contacto = $(this).attr('data-id-contacto');
            elimina_contacto(id_contacto);
        });
    }

    //Funcion para pasar eventos
    function carga_eventos(){
        evento_editar();
        evento_eliminar();
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
    limpiar_campos();
  });

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
