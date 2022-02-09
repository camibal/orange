 <script type="text/javascript">
    //Funcion boton crear Usuario
	$("#btn_crear_usuario").click(function(){
		$("#modalUsuarioLabel").text("Crear Usuario");
		$("#btn_guardar_usuario").attr("data-accion","crear");
		$("#form_Usuario")[0].reset();
		$("#btn_guardando").hide();
	});

	//Funcion guardar Usuario
	$("#btn_guardar_usuario").click(function(){
		respuesta = validar_campos();
		if (respuesta) {
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_Usuario();
			}
			if(accion == 'editar'){
				 edita_Usuario();
			}
		}
	});

	//Funcion para guardar el Usuario
	function crea_Usuario(){
		nombre_usuario = $("#nombre_usuario").val();
	 	pass_usuario = $("#pass_usuario").val();
	 	email_usuario = $("#email_usuario").val();
	 	celular_usuario = $("#celular_usuario").val();

	    $.ajax({
	      url:  "../controlador/ajaxUsuario.php",
	      data: 'nombre_usuario='+ nombre_usuario + '&pass_usuario='+ pass_usuario + '&email_usuario='+ email_usuario + '&celular_usuario='+ celular_usuario + '&tipo=inserta',
	    	success:function(r){
	    		$("#btn_guardar_usuario").hide();
          		$("#btn_guardando").show();
				alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio()',1000);
			}
		})
	}

	//Funcion guardar Usuario
	$("[name*='btn_cerrar_sesion']").click(function(){
		console.log("hola")
		$.ajax({
	        url: "../controlador/ajaxUsuario.php",
	        data: "tipo=cerrar_sesion",
	    })
	    .done(function(data) {
	    	console.log(data)
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	})

	//Carga el Usuario por el ID
	function carga_usuario(id_Usuario){
	    $.ajax({
	        url: "../controlador/ajaxUsuario.php",
	        data: "id_usuario="+id_Usuario+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	        	if (key=="pass_usuario") {
	        		pass_antiguo=value;
	        	}
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });

	        id_Usuario = data.id_Usuario;
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    })
	};

	//Funcion para guardar el Usuario
	function edita_Usuario(){
		id_usuario = $("#id_usuario").val();
	 	nombre_usuario = $("#nombre_usuario").val();
	 	pass_usuario = $("#pass_usuario").val();
	 	email_usuario = $("#email_usuario").val();
	 	celular_usuario = $("#celular_usuario").val();

	    $.ajax({
	      	url: "../controlador/ajaxUsuario.php",
	      	data: 'id_usuario='+id_usuario+'&nombre_usuario='+  nombre_usuario +'&pass_antiguo='+  pass_antiguo + '&pass_usuario='+ pass_usuario + '&email_usuario='+ email_usuario + '&celular_usuario='+ celular_usuario + '&tipo=edita',
	     	success:function(r){
	     		$("#btn_guardar_usuario").hide();
          		$("#btn_guardando").show();
				alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio()',1000);
			}
		})
	}

 	//Funcion para eliminar el usuario
    function elimina_usuario(id_usuario){
        $.ajax({
          url: "../controlador/ajaxUsuario.php",
          data: 'id_usuario='+id_usuario+'&tipo=elimina_logico'
        })
        .done(function(data) {
          //---------------------
          $("#btn_eliminar_usuario").hide();
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

	//Campos incompletos de usuario
	function validar_campos(){
		var bandera = true;
      if($("#nombre_cargo").val() == 0){
        bandera = false;
        marcar_campos("#nombre_cargo", 'incorrecto');
      } else {
        marcar_campos("#nombre_cargo", 'correcto');
      }
      if($("#fkID_persona").val() == 0){
        bandera = false;
        marcar_campos("#fkID_persona", 'incorrecto');
      } else {
        marcar_campos("#fkID_persona", 'correcto');
      }
      if($("#nombre_usuario").val() == 0){
        bandera = false;
        marcar_campos("#nombre_usuario", 'incorrecto');
      } else {
        marcar_campos("#nombre_usuario", 'correcto');
      }
      if($("#pass_usuario").val() == 0){
        bandera = false;
        marcar_campos("#pass_usuario", 'incorrecto');
      } else {
        marcar_campos("#pass_usuario", 'correcto');
      }
		if(bandera == false){
			alert('Complete el formulario');
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

	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaUsuarios').DataTable(
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

    //Funcion para cargar sitio
    function cargar_sitio(){
  		$("#modalEquipo").removeClass("show");
 		$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  		$('.modal-backdrop').remove();//eliminamos el backdrop del modal
  		$('#tabla').load('usuarios/index.php');
    }

    function validarEmail( email ) {
	    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if ( !expr.test(email) ){
	    	alert("Error: La dirección de correo " + email + " es incorrecta.");
	    	$("#email").val("");
	    }else{
	    	return true;
	    }
	}

	//Funcion eliminar
	function evento_eliminar(){
		//Funcion eliminar categoria
		$("[name*='btn_eliminar']").click(function(){
			$("#btn_eliminando").hide();
			id_usuario = $(this).attr('data-id-usuario');
			$("#btn_eliminar_usuario").attr("data-id-usuario",id_usuario);
		});

		//Funcion eliminar categoria
		$("[name*='btn_eliminar_usuario']").click(function(){
			id_usuario = $(this).attr('data-id-usuario');
			elimina_usuario(id_usuario);
		});
	}

	//Funcion para pasar eventos
	function carga_eventos(){
		evento_eliminar();
		evento_paginar();
		evento_editar();
	}

	//Carga eventos
	carga_eventos();

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

	//Funcion editar
	function evento_editar(){
		$("[name*='btn_editar']").click(function(){
			id_usuario = $(this).attr('data-id-usuario');
			$("#modalUsuarioLabel").text("Editar usuario");
			carga_usuario(id_usuario);
			$("#btn_guardar_usuario").attr("data-accion","editar");
			$("#btn_guardando").hide();
			limpiar_campos();
		});
	}
</script>
