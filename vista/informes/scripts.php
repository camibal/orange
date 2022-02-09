<script type="text/javascript">
    //Redireccion a index de informes
    $("#btn_generar_ventas").click(function(){
      fecha_inicial = $("#fecha_inicial_ventas").val();
      fecha_final = $("#fecha_final_ventas").val();
      if(fecha_inicial > fecha_final){
        alertify.alert(
          'Fecha inicial mayor a la final',
          'La fecha inicial no puede ser mayor a la final',
          function(){
            alertify.error('Fecha inicial mayor a la final');
        });
        return false;
      } else {
        carga_tabla_ventas();
      }
    });

    //Redireccion a index de informes
    $("#btn_generar_gastos").click(function(){
      fecha_inicial = $("#fecha_inicial_gastos").val();
      fecha_final = $("#fecha_final_gastos").val();
      if(fecha_inicial > fecha_final){
        alertify.alert(
          'Fecha inicial mayor a la final',
          'La fecha inicial no puede ser mayor a la final',
          function(){
            alertify.error('Fecha inicial mayor a la final');
        });
        return false;
      } else {
        carga_tabla_gastos();
      }
    });

    //Redireccion a index de informes
    $("#btn_generar_abonos").click(function(){
      fecha_inicial = $("#fecha_inicial_abonos").val();
      fecha_final = $("#fecha_final_abonos").val();
      if(fecha_inicial > fecha_final){
        alertify.alert(
          'Fecha inicial mayor a la final',
          'La fecha inicial no puede ser mayor a la final',
          function(){
            alertify.error('Fecha inicial mayor a la final');
        });
        return false;
      } else {
        carga_tabla_abonos();
      }
    });


    //Funcion para cargar tabla con filtros
    function carga_tabla_ventas(){
      fecha_inicial = $("#fecha_inicial_ventas").val();
      fecha_final = $("#fecha_final_ventas").val();

        $.ajax({
          url: "../controlador/ajaxInformes.php",
          data: 'fecha_inicial='+fecha_inicial+'&fecha_final='+fecha_final+'&tipo=informe_ventas',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
            console.log(data);
            contenido = '';
            contador = 0;
            total_valor = 0;
            total_abono = 0;
            total_saldo = 0;

               $.each(data, function (ind, elem) {
                  contenido += '<tr>';
                  contenido += '<td>' +elem["fecha_ingreso"]+'</td>';
                  if(elem["rsocial_cliente"] != ''){
                    cliente = elem["rsocial_cliente"];
                  } else {
                    cliente = elem["nombres_cliente"]+' '+elem["apellidos_cliente"];
                  }
                  contenido += '<td>' + cliente + '</td>';
                  contenido += '<td>' +elem["nombre_categoria"]+'</td>';
                  contenido += '<td>' +elem["descripcion_ingreso"]+'</td>';

                  //Se formatean los valores
                  valor_ingreso = Intl.NumberFormat("de-DE").format(elem["valor_ingreso"]);
                  abono_ingreso = Intl.NumberFormat("de-DE").format(elem["abono_ingreso"]);
                  saldo_ingreso = Intl.NumberFormat("de-DE").format(elem["saldo_ingreso"]);

                  //Suma los totales
                  total_valor = parseInt(total_valor) + parseInt(elem["valor_ingreso"]);
                  total_abono = parseInt(total_abono) + parseInt(elem["abono_ingreso"]);
                  total_saldo = parseInt(total_saldo) + parseInt(elem["saldo_ingreso"]);

                  contenido += '<td class="text-right">' + valor_ingreso +'</td>';
                  contenido += '<td class="text-right">' + abono_ingreso +'</td>';
                  contenido += '<td class="text-right">' + saldo_ingreso +'</td>';
                  contenido += '</tr>';
                  contador++;
        });
                  contenido += '<tr>';
                  contenido += '<td scope="col" colspan="4"><p class="text-right"><b>Total</b></p></td>';

                  //Se formatean los valores
                  total_valor = Intl.NumberFormat("de-DE").format(total_valor);
                  total_abono = Intl.NumberFormat("de-DE").format(total_abono);
                  total_saldo = Intl.NumberFormat("de-DE").format(total_saldo);

                  contenido += '<td class="text-right"><span><b>'+ total_valor +'</b></span></td>';
                  contenido += '<td class="text-right"><span><b>'+ total_abono +'</b></span></td>';
                  contenido += '<td class="text-right"><span><b>'+ total_saldo +'</b></span></td>';
                  contenido += '</tr>';
          $("#contenidoVentas").html(contenido);
        })
        .fail(function(data) {
          $("#contenidoVentas").html('No existen ventas.');
        })
        .always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar tabla con filtros
    function carga_tabla_gastos(){
      fecha_inicial = $("#fecha_inicial_gastos").val();
      fecha_final = $("#fecha_final_gastos").val();

        $.ajax({
          url: "../controlador/ajaxInformes.php",
          data: 'fecha_inicial='+fecha_inicial+'&fecha_final='+fecha_final+'&tipo=informe_gastos',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
            console.log(data);
            contenido = '';
            contador = 0;
            total_valor = 0;
            total_abono = 0;
            total_saldo = 0;

               $.each(data, function (ind, elem) {
                  contenido += '<tr>';
                  contenido += '<td>' +elem["fecha_egreso"]+'</td>';
                  if(elem["rsocial_proveedor"] != ''){
                    cliente = elem["rsocial_proveedor"];
                  } else {
                    cliente = elem["nombres_proveedor"]+' '+elem["apellidos_proveedor"];
                  }
                  contenido += '<td>' + cliente + '</td>';
                  contenido += '<td>' +elem["nombre_concepto"]+'</td>';
                  contenido += '<td>' +elem["descripcion_egreso"]+'</td>';

                  //Se formatean los valores
                  valor_egreso = Intl.NumberFormat("de-DE").format(elem["valor_egreso"]);
                  abono_egreso = Intl.NumberFormat("de-DE").format(elem["abono_egreso"]);
                  saldo_egreso = Intl.NumberFormat("de-DE").format(elem["saldo_egreso"]);

                  //Suma los totales
                  total_valor = parseInt(total_valor) + parseInt(elem["valor_egreso"]);
                  total_abono = parseInt(total_abono) + parseInt(elem["abono_egreso"]);
                  total_saldo = parseInt(total_saldo) + parseInt(elem["saldo_egreso"]);

                  contenido += '<td class="text-right">' + valor_egreso +'</td>';
                  contenido += '<td class="text-right">' + abono_egreso +'</td>';
                  contenido += '<td class="text-right">' + saldo_egreso +'</td>';
                  contenido += '</tr>';
                  contador++;
        });
                  contenido += '<tr>';
                  contenido += '<td scope="col" colspan="4"><p class="text-right"><b>Total</b></p></td>';

                  //Se formatean los valores
                  total_valor = Intl.NumberFormat("de-DE").format(total_valor);
                  total_abono = Intl.NumberFormat("de-DE").format(total_abono);
                  total_saldo = Intl.NumberFormat("de-DE").format(total_saldo);

                  contenido += '<td class="text-right"><span><b>'+ total_valor +'</b></span></td>';
                  contenido += '<td class="text-right"><span><b>'+ total_abono +'</b></span></td>';
                  contenido += '<td class="text-right"><span><b>'+ total_saldo +'</b></span></td>';
                  contenido += '</tr>';
          $("#contenidoGastos").html(contenido);
        })
        .fail(function(data) {
          $("#contenidoGastos").html('No existen gastos.');
        })
        .always(function(data) {
          console.log(data);
        });
    }

    //Funcion para cargar tabla con filtros
    function carga_tabla_abonos(){
      fecha_inicial = $("#fecha_inicial_abonos").val();
      fecha_final = $("#fecha_final_abonos").val();

        $.ajax({
          url: "../controlador/ajaxInformes.php",
          data: 'fecha_inicial='+fecha_inicial+'&fecha_final='+fecha_final+'&tipo=informe_abonos',
          dataType: 'json'
        })
        .done(function(data) {
          //---------------------
            console.log(data);
            contenido = '';
            contador = 0;
            total_valor = 0;
            total_abono = 0;
            total_saldo = 0;

               $.each(data, function (ind, elem) {
                  contenido += '<tr>';
                  contenido += '<td>' +elem["id_abono"]+'</td>';
                  contenido += '<td>' +elem["fecha_abono"]+'</td>';
                  contenido += '<td>' +elem["id_ingreso"]+'</td>';
                  if(elem["rsocial_cliente"] != ''){
                    cliente = elem["rsocial_cliente"];
                  } else {
                    cliente = elem["nombres_cliente"]+' '+elem["apellidos_cliente"];
                  }
                  contenido += '<td>' + cliente + '</td>';
                  contenido += '<td>' +elem["descripcion_ingreso"]+'</td>';

                  //Se formatean los valores
                  valor_abono = Intl.NumberFormat("de-DE").format(elem["valor_abono"]);

                  //Suma los totales
                  total_valor = parseInt(total_valor) + parseInt(elem["valor_abono"]);

                  contenido += '<td class="text-right">' + valor_abono +'</td>';
                  contenido += '</tr>';
                  contador++;
        });
                  contenido += '<tr>';
                  contenido += '<td scope="col" colspan="5"><p class="text-right"><b>Total</b></p></td>';

                  //Se formatean los valores
                  total_valor = Intl.NumberFormat("de-DE").format(total_valor);

                  contenido += '<td class="text-right"><span><b>'+ total_valor +'</b></span></td>';
                  contenido += '</tr>';
          $("#contenidoAbonos").html(contenido);
        })
        .fail(function(data) {
          $("#contenidoAbonos").html('No existen abonos.');
        })
        .always(function(data) {
          console.log(data);
        });
    }
    
  //Funcion para imprimir
  $("#btn_imprimir_ventas").click(function(){
    printDiv('tablaVentas');
    return false;
  });

  //Funcion para imprimir
  $("#btn_imprimir_gastos").click(function(){
    printDiv('tablaGastos');
    return false;
  });

  //Funcion para imprimir
  $("#btn_imprimir_abonos").click(function(){
    printDiv('tablaAbonos');
    return false;
  });

  //Funcion para imprimir
  $("#btn_imprimir_clientes").click(function(){
    printDiv('tablaClientes');
    return false;
  });

  //Funcion para imprimir
  function printDiv(nombreDiv) {
    var ficha = document.getElementById(nombreDiv);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write(ficha.innerHTML);
    ventimp.document.close();
    ventimp.print( );
    ventimp.close()
  }

  //Funcion para exportar a excel
  $("#btn_excel_ventas").click(function(){
    fecha_inicial_ventas = $("#fecha_inicial_ventas").val();
    fecha_final_ventas = $("#fecha_final_ventas").val();

    window.location = '../vista/informes/excel_informe_ventas.php?fecha_inicial_ventas='+fecha_inicial_ventas+'&fecha_final_ventas='+fecha_final_ventas+'&tipo=informe_ventas';
      return false;
  });

  //Funcion para exportar a excel
  $("#btn_excel_gastos").click(function(){
    fecha_inicial_gastos = $("#fecha_inicial_gastos").val();
    fecha_final_gastos = $("#fecha_final_gastos").val();

    window.location = '../vista/informes/excel_informe_gastos.php?fecha_inicial_gastos='+fecha_inicial_gastos+'&fecha_final_gastos='+fecha_final_gastos+'&tipo=informe_gastos';
      return false;
  });

  //Funcion para exportar a excel
  $("#btn_excel_abonos").click(function(){
    fecha_inicial_abonos = $("#fecha_inicial_abonos").val();
    fecha_final_abonos = $("#fecha_final_abonos").val();

    window.location = '../vista/informes/excel_informe_abonos.php?fecha_inicial_abonos='+fecha_inicial_abonos+'&fecha_final_abonos='+fecha_final_abonos+'&tipo=informe_abonos';
      return false;
  });

  //Funcion para exportar a excel
  $("#btn_excel_clientes").click(function(){
    window.location = '../vista/informes/excel_informe_clientes.php?&tipo=informe_clientes';
    return false;
  });

  //Funcion para exportar a PDF
  $("#btn_pdf_ventas").click(function(){
    fecha_inicial_ventas = $("#fecha_inicial_ventas").val();
    fecha_final_ventas = $("#fecha_final_ventas").val();
    
    window.location = '../vista/informes/pdf_informe_ventas.php?fecha_inicial_ventas='+fecha_inicial_ventas+'&fecha_final_ventas='+fecha_final_ventas+'&tipo=informe_ventas';
      return false;
  });

  //Funcion para exportar a PDF
  $("#btn_pdf_gastos").click(function(){
    fecha_inicial_gastos = $("#fecha_inicial_gastos").val();
    fecha_final_gastos = $("#fecha_final_gastos").val();
    
    window.location = '../vista/informes/pdf_informe_gastos.php?fecha_inicial_gastos='+fecha_inicial_gastos+'&fecha_final_gastos='+fecha_final_gastos+'&tipo=informe_gastos';
      return false;
  });

  //Funcion para exportar a PDF
  $("#btn_pdf_abonos").click(function(){
    fecha_inicial_abonos = $("#fecha_inicial_abonos").val();
    fecha_final_abonos = $("#fecha_final_abonos").val();
    
    window.location = '../vista/informes/pdf_informe_abonos.php?fecha_inicial_abonos='+fecha_inicial_abonos+'&fecha_final_abonos='+fecha_final_abonos+'&tipo=informe_abonos';
      return false;
  });

  //Funcion para exportar a PDF
  $("#btn_pdf_clientes").click(function(){    
    window.location = '../vista/informes/pdf_informe_clientes.php?&tipo=informe_clientes';
    return false;
  });
</script>
