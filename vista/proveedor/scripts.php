<script type="text/javascript">
	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaProveedores').DataTable(
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

    //Funcion boton crear proveedor
	$("#btn_crear_proveedor").click(function(){
		$("#modalProveedorLabel").text("Crear proveedor");
		$("#btn_guardar_proveedor").attr("data-accion","crear");
		$("#form_proveedor")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar proveedor
	$("#btn_guardar_proveedor").click(function(){
		resultado = campos_incompletos();
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_proveedor();
			}
			if(accion == 'editar'){
				edita_proveedor();
			}
		}
	});

	//Campos incompletos
	function campos_incompletos(){
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
		if($('#email_proveedor').val().trim() == 0){
			bandera = false;
			marcar_campos("#email_proveedor", 'incorrecto');
		}  else {
			marcar_campos("#email_proveedor", 'correcto');
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

	//Funcion para guardar el proveedor
	function crea_proveedor(){
	 	nombres_proveedor = $("#nombres_proveedor").val();
	 	apellidos_proveedor = $("#apellidos_proveedor").val();
	 	documento_proveedor = $("#documento_proveedor").val();
	 	rsocial_proveedor = $("#rsocial_proveedor").val();
	 	email_proveedor = $("#email_proveedor").val();
	 	celular_proveedor = $("#celular_proveedor").val();
	 	direccion_proveedor = $("#direccion_proveedor").val();
	 	telefono_proveedor = $("#telefono_proveedor").val();
	 	web_proveedor = $("#web_proveedor").val();

	    $.ajax({
	      url: "../controlador/ajaxProveedor.php",
	      data: 'nombres_proveedor='+nombres_proveedor+'&apellidos_proveedor='+apellidos_proveedor+'&documento_proveedor='+documento_proveedor+'&rsocial_proveedor='+rsocial_proveedor+'&email_proveedor='+email_proveedor+'&celular_proveedor='+celular_proveedor+'&direccion_proveedor='+direccion_proveedor+'&telefono_proveedor='+telefono_proveedor+'&web_proveedor='+web_proveedor+'&tipo=inserta'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_guardar_proveedor").hide();
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

	//Carga el proveedor por el ID
	function carga_proveedor(id_proveedor){

	    console.log("Carga el proveedor "+ id_proveedor);

	    $.ajax({
	        url: "../controlador/ajaxProveedor.php",
	        data: "id_proveedor="+id_proveedor+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {

	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });

	        id_proveedor = data.id_proveedor;
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para guardar el proveedor
	function edita_proveedor(){
		id_proveedor = $("#id_proveedor").val();
	 	nombres_proveedor = $("#nombres_proveedor").val();
	 	apellidos_proveedor = $("#apellidos_proveedor").val();
	 	documento_proveedor = $("#documento_proveedor").val();
	 	rsocial_proveedor = $("#rsocial_proveedor").val();
	 	email_proveedor = $("#email_proveedor").val();
	 	celular_proveedor = $("#celular_proveedor").val();
	 	direccion_proveedor = $("#direccion_proveedor").val();
	 	telefono_proveedor = $("#telefono_proveedor").val();
	 	web_proveedor = $("#web_proveedor").val();

	    $.ajax({
	      url: "../controlador/ajaxProveedor.php",
	      data: 'id_proveedor='+id_proveedor+'&nombres_proveedor='+nombres_proveedor+'&apellidos_proveedor='+apellidos_proveedor+'&documento_proveedor='+documento_proveedor+'&rsocial_proveedor='+rsocial_proveedor+'&email_proveedor='+email_proveedor+'&celular_proveedor='+celular_proveedor+'&telefono_proveedor='+telefono_proveedor+'&web_proveedor='+web_proveedor+'&tipo=edita'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_guardar_proveedor").hide();
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

	//Funcion para eliminar el proveedor
	function elimina_proveedor(id_proveedor){
	    $.ajax({
	      url: "../controlador/ajaxProveedor.php",
	      data: 'id_proveedor='+id_proveedor+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_proveedor").hide();
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
  		$("#modalProveedor").removeClass("show");
 		$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
  		$('.modal-backdrop').remove();//eliminamos el backdrop del modal
  		$('#tabla').load('proveedor/index.php');
    }

	//Funcion editar
	function evento_editar(){
		$("[name*='btn_editar']").click(function(){
			id_proveedor = $(this).attr('data-id-proveedor');
			console.log('Entro a editar proveedor');
			$("#modalProveedorLabel").text("Editar proveedor");
			carga_proveedor(id_proveedor);
			$("#btn_guardar_proveedor").attr("data-accion","editar");
			$("#btn_guardando").hide();
			limpiar_campos();
		});
	}

	//Funcion eliminar
	function evento_eliminar(){
		//Funcion eliminar proveedor
		$("[name*='btn_eliminar']").click(function(){
			$("#btn_eliminando").hide();
			id_proveedor = $(this).attr('data-id-proveedor');
			$("#btn_eliminar_proveedor").attr("data-id-proveedor",id_proveedor);
		});

		//Funcion eliminar proveedor
		$("[name*='btn_eliminar_proveedor']").click(function(){
			id_proveedor = $(this).attr('data-id-proveedor');
			elimina_proveedor(id_proveedor);
		});
	}

	//Funcion para pasar eventos
	function carga_eventos(){
		evento_editar();
		evento_eliminar();
	}

    //Funcion para pasar eventos
    $(".paginate_button").click(function(){
        carga_eventos();
    });

    //Funcion para pasar eventos
    $("[type*='search']").keypress(function(){
        carga_eventos();
    });
	
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
</script>
