<script type="text/javascript">
	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaCategorias').DataTable(
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

    //Funcion boton crear categoria
	$("#btn_crear_categoria").click(function(){
		$("#modalCategoriaLabel").text("Crear categoria");
		$("#btn_guardar_categoria").attr("data-accion","crear");
		$("#form_categoria")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar categoria
	$("#btn_guardar_categoria").click(function(){
		resultado = campos_incompletos();
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_categoria();
			}
			if(accion == 'editar'){
				edita_categoria();
			}
		}
	});

	//Campos incompletos
	function campos_incompletos(){
		var bandera = true;
		if($("#nombre_categoria").val().length == 0){
			bandera = false;
			marcar_campos("#nombre_categoria", 'incorrecto');
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

	//Funcion para guardar el categoria
	function crea_categoria(){
	 	nombre_categoria = $("#nombre_categoria").val();

	    $.ajax({
	      url: "../controlador/ajaxCategoria.php",
	      data: 'nombre_categoria='+nombre_categoria+'&tipo=inserta'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_guardar_categoria").hide();
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

	//Carga eventos
	carga_eventos();

	//Carga el categoria por el ID
	function carga_categoria(id_categoria){

	    console.log("Carga el categoria "+ id_categoria);

	    $.ajax({
	        url: "../controlador/ajaxCategoria.php",
	        data: "id_categoria="+id_categoria+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log(data);
	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });

	        id_categoria = data.id_categoria;
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para guardar el categoria
	function edita_categoria(){
		id_categoria = $("#id_categoria").val();
	 	nombre_categoria = $("#nombre_categoria").val();

	    $.ajax({
	      url: "../controlador/ajaxCategoria.php",
	      data: 'id_categoria='+id_categoria+'&nombre_categoria='+nombre_categoria+'&tipo=edita'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_guardar_categoria").hide();
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

	//Funcion para eliminar el categoria
	function elimina_categoria(id_categoria){
	    $.ajax({
	      url: "../controlador/ajaxCategoria.php",
	      data: 'id_categoria='+id_categoria+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_categoria").hide();
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
  		$("#modalCategoria").removeClass("show");
 		$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  		$('.modal-backdrop').remove();//eliminamos el backdrop del modal
  		$('#tabla').load('categoria/index.php');
    }

	//Funcion editar
	function evento_editar(){
		$("[name*='btn_editar']").click(function(){
			id_categoria = $(this).attr('data-id-categoria');
			console.log('Entro a editar categoria');
			$("#modalCategoriaLabel").text("Editar categoria");
			carga_categoria(id_categoria);
			$("#btn_guardar_categoria").attr("data-accion","editar");
			$("#btn_guardando").hide();
			limpiar_campos();
		});
	}

	//Funcion eliminar
	function evento_eliminar(){
		//Funcion eliminar categoria
		$("[name*='btn_eliminar']").click(function(){
			$("#btn_eliminando").hide();
			id_categoria = $(this).attr('data-id-categoria');
			$("#btn_eliminar_categoria").attr("data-id-categoria",id_categoria);
		});

		//Funcion eliminar categoria
		$("[name*='btn_eliminar_categoria']").click(function(){
			id_categoria = $(this).attr('data-id-categoria');
			elimina_categoria(id_categoria);
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
</script>