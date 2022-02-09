<script type="text/javascript">
	//Funcion para el Datatable
	$(document).ready(function() {
		$('#tablaCuentas').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "Todos"]
			],
			"language": {
				"lengthMenu": "Mostrando _MENU_ registros",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty": "Mostrando 0 a 0 de 0 registros",
				"search": "Buscar:",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"zeroRecords": "No hay registros que coincidan.",
				"infoEmpty": "No se encuentran registros.",
				"infoFiltered": "(Filtrando _MAX_ registros en total)",
				"paginate": {
					"first": "<--",
					"last": "-->",
					"next": ">",
					"previous": "<"
				},
				"aria": {
					"sortAscending": ": activate to sort column ascending",
					"sortDescending": ": activate to sort column descending"
				},
			},
			"order": []
		});
	});

	//Carga todo
	carga_eventos();

	// 
	// crear
	// 

	$("#btn_crear_cliente").click(function() {
		$("#modalContactoLabel").text("Crear cuenta de cobro");
		$("#btn_crear_cuenta_cobro").attr("data-accion", "crear");
		$("#form_contacto")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar cliente
	$("#btn_crear_cuenta_cobro").click(function() {
		resultado = validar_cuenta_cobro();
		if (resultado == true) {
			accion = $(this).attr('data-accion');
			if (accion == 'crear') {
				crea_cuenta_cobro();
			}
			if (accion == 'editar') {
				edita_cuenta_cobro();
			}
		}
	});

	//Funcion para guardar el cliente
	function crea_cuenta_cobro() {
		nombre = $("#nombre_cuentas_cobro").val();
		ciudad = $("#ciudad_cuentas_cobro").val();
		fecha = $("#fecha_cuentas_cobro").val();
		cedula = $("#cedula_cuentas_cobro").val();
		valor = $("#valor_cuentas_cobro").val();
		concepto = $("#concepto_cuentas_cobro").val();
		celular = $("#celular_cuentas_cobro").val();
		formaspago = $("#formas_pago_cuentas_cobro").val();

		$.ajax({
			type: 'POST',
			url: "../controlador/ajaxCuentasCobro.php",
			data: 'tipo=guardar' + '&nombre=' + nombre + '&ciudad=' + ciudad + '&fecha=' + fecha + '&cedula=' + cedula + '&valor=' + valor + '&concepto=' + concepto + '&celular=' + celular + '&formas_pago=' + formaspago,

			success: function(data) {
				//Cuando la interacción sea exitosa, se ejecutará esto.
				$("#btn_crear_cuenta_cobro").removeClass("d-none");
				$("#btn_guardando").addClass("d-none");
				alertify.success(data)
				setTimeout('cargar_sitio()', 1000);
				// alert(data)
			},
			error: function(data) {
				//Cuando la interacción retorne un error, se ejecutará esto.
				alertify.success(data)
			}
		})
	}

	// 
	// eliminar
	// 

	function evento_eliminar() {

		$("[name*='btn_eliminar']").click(function() {
			id_ingreso = $(this).attr('data-id-cuentas');
			$("#btn_eliminar_cuenta_cobro").attr("data-id-cuentas", id_ingreso);
			// $("#btn_eliminando").addClass("d-none");
		});
		// eliminar cuenta de cobro
		$("[name*='btn_eliminar_cuenta_cobro']").click(function() {
			$("#btn_cancelar").addClass("d-none");
			$("#btn_eliminar_cuenta_cobro").addClass("d-none");
			$("#btn_eliminando").removeClass("d-none");
			id = $(this).attr('data-id-cuentas');
			elimina_cuenta_cobro(id);
		});
	}

	// function eliminar
	function elimina_cuenta_cobro(id) {
		$.ajax({
			type: 'POST',
			url: "../controlador/ajaxCuentasCobro.php",
			data: 'id=' + id + '&tipo=eliminar',
			success: function(data) {
				//Cuando la interacción sea exitosa, se ejecutará esto.
				$("#btn_cancelar").removeClass("d-none");
				$("#btn_eliminar_cuenta_cobro").removeClass("d-none");
				$("#btn_eliminando").addClass("d-none");
				alertify.success(data)
				setTimeout('cargar_sitio()', 1000);
			},
			error: function(data) {
				//Cuando la interacción retorne un error, se ejecutará esto.
				alertify.success(data)
			}
		})
	}

	// 
	// editar
	// 

	//Funcion para guardar el cliente
	function edita_cuenta_cobro() {
		id = $("#id_cuentas_cobro").val();
		nombre = $("#nombre_cuentas_cobro").val();
		ciudad = $("#ciudad_cuentas_cobro").val();
		fecha = $("#fecha_cuentas_cobro").val();
		cedula = $("#cedula_cuentas_cobro").val();
		valor = $("#valor_cuentas_cobro").val();
		concepto = $("#concepto_cuentas_cobro").val();
		celular = $("#celular_cuentas_cobro").val();
		formaspago = $("#formas_pago_cuentas_cobro").val();

		$.ajax({
				url: "../controlador/ajaxCuentasCobro.php",
				data: 'id=' + id + '&nombre=' + nombre + '&ciudad=' + ciudad + '&fecha=' + fecha + '&cedula=' + cedula + '&valor=' + valor + '&concepto=' + concepto + '&celular=' + celular + '&formas_pago=' + formaspago + '&tipo=editar'
			})
			.done(function(data) {
				//---------------------
				$("#btn_guardar_cliente").hide();
				$("#btn_guardando").show();
				alertify.success('Editado correctamente');
				setTimeout('cargar_sitio()', 1000);
			})
			.fail(function(data) {
				console.log(data);
			})
			.always(function(data) {
				console.log(data);
			});
	}

	function evento_editar() {
		$("[name*='btn_editar']").click(function() {
			id = $(this).attr('data-id-cuentas');
			$("#modalContactoLabel").text("Editar cuenta de cobro");
			carga_cliente(id);
			$("#btn_crear_cuenta_cobro").attr("data-accion", "editar");
			$("#btn_guardando").hide();
			limpiar_campos();
		});
	}

	//Carga el cliente por el ID
	function carga_cliente(id) {
		$.ajax({
				url: "../controlador/ajaxCuentasCobro.php",
				data: "id=" + id + "&tipo=consulta",
				dataType: 'json'
			})
			.done(function(data) {
				$.each(data[0], function(key, value) {
					console.log(key + "--" + value);
					$("#" + key + "_cuentas_cobro").val(value);
				});
				id = data.id;
			})
			.fail(function(data) {
				console.log(data);
			})
			.always(function(data) {
				console.log(data);
			});
	};


	// 
	// descargar
	// 

	//Funcion para cargar el detllae
	$("[name*='btn_detalles']").click(function() {
		id_cuentas = $(this).attr('data-id-cuentas');
		carga_detalle(id_cuentas);
	});

	//Funcion para cargar detalle
	function carga_detalle(id_cuentas) {
		$.ajax({
				url: "../controlador/ajaxCuentasCobro.php",
				data: 'id=' + id_cuentas + '&tipo=detalle',
				dataType: 'json'
			})
			.done(function(data) {
				contenido = '';
				$.each(data, function(ind, elem) {
					// convirtiendo string a date
					var parts = elem["fecha"].split('-');
					var mydate = new Date(parts[0], parts[1] - 1, parts[2]);
					// meses en español
					const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
					// dias de la semana en español
					const dias_semana = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
					// traducir y almacenar
					var fecha = mydate.getDate() + ' de ' + meses[mydate.getMonth()] + ' de ' + mydate.getUTCFullYear()
					var text = elem["valor"];
					var integer = parseInt(text, 10);
					// set localStorage
					localStorage.setItem("idCliente", elem["id"]);
					localStorage.setItem("fecha", fecha);
					localStorage.setItem("valorPagar", toWords(integer));
					// contenido de los detalles
					contenido += '<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />';
					contenido += '<div class="container bg-white w-100 h-100 p-5 text-center">';
					contenido += '<div class="row justify-content-center">';
					contenido += '<div class="col-6 d-flex justify-content-center">';
					contenido += '<p class="text-dark font-weight-bold">' + elem["ciudad"] + '' + ' ' + '' + fecha + '</p>';
					contenido += '</div>';
					contenido += '<div class="col-6 d-flex justify-content-center">';
					contenido += '<p class="text-dark font-weight-bold">Cuenta de cobro N°' + elem["id"] + '</p>';
					contenido += '</div>';
					contenido += '<div class="d-flex flex-column text-center mt-5">';
					contenido += '<h4 class="text-dark font-weight-bold">KRONOS SOLUCIONES TIC SAS</h4>';
					contenido += '<h4 class="text-dark font-weight-bold mt-0">NIT: 901.413.106-3</h4>';
					contenido += '<h4 class="text-dark font-weight-bold mt-3">DEBE A:</h4>';
					contenido += '<p class="text-dark">' + elem["nombre"] + '</p>';
					contenido += '<p class="text-dark">CC: ' + elem["cedula"] + '</p>';
					contenido += '<h4 class="text-dark font-weight-bold mt-2">LA SUMA DE:</h4>';
					contenido += '<p class="text-dark" id="result">$' + elem["valor"] + ' ' + '(' + toWords(integer) + 'pesos)' + '</p>';
					contenido += '<h4 class="text-dark font-weight-bold mt-2">POR CONCEPTO DE:</h4>';
					contenido += '<p class="text-dark">' + elem["concepto"] + '</p>';
					contenido += '<p class="mt-3 text-dark"><strong>' + elem["nombre"] + '</strong></p>';
					contenido += '<p class="mt-0 text-dark"><strong>Cel: ' + elem["celular"] + '</strong></p>';
					contenido += `
					<p class="text-dark">Certifico que he presentado este servicio personalmente y que no he contratado o
                    vinculado dos o más trabajadores asociados a la actividad Art. 384 parágrafo 2
                    Estatuto Tributario
                </p>
					`;
					contenido += ' </div>';
					contenido += ' <div class="d-flex flex-column text-center">';
					contenido += '<p class="text-dark"><strong>Formas de pago:</strong></p>';
					contenido += '<p class="text-dark">' + elem["formas_pago"] + ' </p>';
					contenido += '</div>';
					contenido += '</div>';
					contenido += '</div>';
				});
				$("#contenidoEnvio").html(contenido);
			})
			.fail(function(data) {
				$("#contenidoEnvio").html('No existen cuentas de cobro.');
			})
			.always(function(data) {
				console.log(data);
			});
	}


	var th = ['', 'mil', 'millon', 'billon', 'trillon'];
	var dg = ['cero', 'un', 'dos', 'tres', 'cuatro', 'sinco', 'seis', 'siete', 'ocho', 'nueve'];
	var tn = ['diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve'];
	var tw = ['veinte', 'treinta', 'curenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'];

	function toWords(s) {
		s = s.toString();
		s = s.replace(/[\, ]/g, '');
		if (s != parseFloat(s)) return 'not a number';
		var x = s.indexOf('.');
		if (x == -1) x = s.length;
		if (x > 15) return 'too big';
		var n = s.split('');
		var str = '';
		var sk = 0;
		for (var i = 0; i < x; i++) {
			if ((x - i) % 3 == 2) {
				if (n[i] == '1') {
					str += tn[Number(n[i + 1])] + ' ';
					i++;
					sk = 1;
				} else if (n[i] != 0) {
					str += tw[n[i] - 2] + ' ';
					sk = 1;
				}
			} else if (n[i] != 0) {
				str += dg[n[i]] + ' ';
				if ((x - i) % 3 == 0) str += 'cientos';
				sk = 1;
			}
			if ((x - i) % 3 == 1) {
				if (sk) str += th[(x - i - 1) / 3] + ' ';
				sk = 0;
			}
		}
		if (x != s.length) {
			var y = s.length;
			str += 'point ';
			for (var i = x + 1; i < y; i++) str += dg[n[i]] + ' ';
		}
		return str.replace(/\s+/g, ' ');
	}

	//Funcion para imprimir
	$("#btn_imprimir_devoluciones").click(function() {
		printDiv('contenidoEnvio');
		return false;
	});

	//Funcion para imprimir
	function printDiv(nombreDiv) {
		var ficha = document.getElementById(nombreDiv);
		var ventimp = window.open(' ', 'popimpr');
		ventimp.document.write(ficha.innerHTML);
		ventimp.document.close();
		ventimp.print();
		ventimp.close()
	}

	//Funcion para descargar pdf
	$("[name*='btn_pdf']").click(function() {
		id_cuentas = $(this).attr('data-id-cuentas');
		window.location = "cuentas-cobro/pdf_informe_cuentas.php?tipo=informe_cuentas&id=" + id_cuentas;
	});
	//Funcion para descargar word
	$("[name*='btn_word']").click(function() {
		id_cuentas = localStorage.getItem("idCliente");
		fech = localStorage.getItem("fecha");
		valorPagar = localStorage.getItem("valorPagar");
		window.location = "cuentas-cobro/word_informe_cuentas.php?tipo=informe_cuentas&id=" + id_cuentas + "&fecha=" + fech + "&valorPagar=" + valorPagar;
	});

	$("#btn_pdf_devoluciones").click(function() {
		id_cuentas = localStorage.getItem("idCliente");
		fech = localStorage.getItem("fecha");
		valorPagar = localStorage.getItem("valorPagar");
		window.location = "cuentas-cobro/pdf_informe_cuentas.php?tipo=informe_cuentas&id=" + id_cuentas + "&fecha=" + fech + "&valorPagar=" + valorPagar;
	});

	//Valida campos de cliente
	function validar_cuenta_cobro() {
		var bandera = true;
		// nombre
		if ($("#nombre_cuentas_cobro").val().length == 0) {
			bandera = false;
			marcar_campos("#nombre_cuentas_cobro", 'incorrecto');
		} else {
			marcar_campos("#nombre_cuentas_cobro", 'correcto');
		}
		// ciudad
		if ($("#ciudad_cuentas_cobro").val().length == 0) {
			bandera = false;
			marcar_campos("#ciudad_cuentas_cobro", 'incorrecto');
		} else {
			marcar_campos("#ciudad_cuentas_cobro", 'correcto');
		}
		// fecha
		if ($("#fecha_cuentas_cobro").val().length == 0) {
			bandera = false;
			marcar_campos("#fecha_cuentas_cobro", 'incorrecto');
		} else {
			marcar_campos("#fecha_cuentas_cobro", 'correcto');
		}
		// cedula
		if ($("#cedula_cuentas_cobro").val().length == 0) {
			bandera = false;
			marcar_campos("#cedula_cuentas_cobro", 'incorrecto');
		} else {
			marcar_campos("#cedula_cuentas_cobro", 'correcto');
		}
		// valor
		if ($("#valor_cuentas_cobro").val().length == 0) {
			bandera = false;
			marcar_campos("#valor_cuentas_cobro", 'incorrecto');
		} else {
			marcar_campos("#valor_cuentas_cobro", 'correcto');
		}
		// concepto
		if ($("#concepto_cuentas_cobro").val().length == 0) {
			bandera = false;
			marcar_campos("#concepto_cuentas_cobro", 'incorrecto');
		} else {
			marcar_campos("#concepto_cuentas_cobro", 'correcto');
		}
		// celular
		if ($("#celular_cuentas_cobro").val().length == 0) {
			bandera = false;
			marcar_campos("#celular_cuentas_cobro", 'incorrecto');
		} else {
			marcar_campos("#celular_cuentas_cobro", 'correcto');
		}
		// formas pago
		if ($("#formas_pago_cuentas_cobro").val().length == 0) {
			bandera = false;
			marcar_campos("#formas_pago_cuentas_cobro", 'incorrecto');
		} else {
			marcar_campos("#formas_pago_cuentas_cobro", 'correcto');
		}
		if (bandera == false) {
			alertify.alert(
				'Campos incompletos',
				'Los campos con * son obligatorios',
				function() {
					alertify.error('Campos vacios');
				});
			return false;
		} else {
			return true;
		}
	}

	//Funcion para marcar los campos
	function marcar_campos(campo, tipo) {
		if (tipo == 'correcto') {
			$(campo).removeClass('is-invalid');
			$(campo).addClass('is-valid');
		}
		if (tipo == 'incorrecto') {
			$(campo).removeClass('is-valid');
			$(campo).addClass('is-invalid');
		}
	}

	//Funcion para cargar sitio
	function cargar_sitio() {
		$("#tablaCuentas").removeClass("show");
		$('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
		$('.modal-backdrop').remove(); //eliminamos el backdrop del modal
		$('#tabla').load('cuentas-cobro/index.php');
	}

	//Funcion para paginar
	function evento_paginar() {
		//Funcion para pasar eventos
		$(".paginate_button ").click(function() {
			carga_eventos();
		});

		//Funcion para pasar eventos
		$("[type*='search']").keypress(function() {
			carga_eventos();
		});
	}

	//Carga eventos
	function carga_eventos() {
		evento_eliminar();
		evento_editar()
		evento_paginar();
	}

	//Funcion para limpiar campos
	function limpiar_campos() {
		$("input").removeClass('is-invalid');
		$("input").removeClass('is-valid');
		$("select").removeClass('is-invalid');
		$("select").removeClass('is-valid');
	}

	//Funcion solo permite numeros
	$(function() {
		$(".soloNumeros").keydown(function(event) {
			//alert(event.keyCode);
			if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
				return false;
			}
		});
	});
</script>