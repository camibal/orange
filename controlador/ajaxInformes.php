<?php
include dirname(__file__, 2) . '/modelo/informes.php';

$informes = new informes();
$tipo     = $_GET['tipo'];

if ($tipo == 'informe_ventas') {
	if($_GET["fecha_inicial"] == '' || $_GET["fecha_final"] == ''){
		$where = '';
	} else {
		$fecha_inicial = $_GET['fecha_inicial'];
		$fecha_final = $_GET['fecha_final'];
		$where = " AND (fecha_ingreso >= '".$fecha_inicial."' AND fecha_ingreso <= '".$fecha_final."')";
	}

    $resultado = $informes->getVentas($where);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'informe_gastos') {
	if($_GET["fecha_inicial"] == '' || $_GET["fecha_final"] == ''){
		$where = '';
	} else {
		$fecha_inicial = $_GET['fecha_inicial'];
		$fecha_final = $_GET['fecha_final'];
		$where = " AND (fecha_egreso >= '".$fecha_inicial."' AND fecha_egreso <= '".$fecha_final."')";
	}

    $resultado = $informes->getGastos($where);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'informe_abonos') {
	if($_GET["fecha_inicial"] == '' || $_GET["fecha_final"] == ''){
		$where = '';
	} else {
		$fecha_inicial = $_GET['fecha_inicial'];
		$fecha_final = $_GET['fecha_final'];
		$where = " AND (fecha_abono >= '".$fecha_inicial."' AND fecha_abono <= '".$fecha_final."')";
	}

    $resultado = $informes->getAbonos($where);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}