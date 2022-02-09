<?php
include dirname(__file__, 2) . '/modelo/abonos.php';

$abonos = new Abonos();
$tipo     = $_GET['tipo'];

if ($tipo == 'carga_ingresos') {
    $resultado = $abonos->getIngresos($_GET["id_cliente"]);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta') {
    if ($abonos->insertaAbono($_GET)) {
        $resultado_anterior = $abonos->consultaIngreso($_GET);
        $abonos->modificaIngreso($_GET,$resultado_anterior[0]["saldo_ingreso"],$resultado_anterior[0]["abono_ingreso"]);
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta') {
    $resultado = $abonos->consultaAbono($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'elimina_logico') {
    if ($abonos->eliminaLogicoIngreso($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta_ingreso') {
    $resultado = $abonos->consultaIngreso($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}