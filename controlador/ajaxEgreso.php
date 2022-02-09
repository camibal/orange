<?php
include dirname(__file__, 2) . '/modelo/egresos.php';

$egreso = new Egresos();
$tipo    = $_GET['tipo'];

if ($tipo == 'inserta') {
    if ($egreso->insertaEgreso($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta') {
    $resultado = $egreso->consultaEgreso($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    if ($egreso->editaEgreso($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'elimina_logico') {
    if ($egreso->eliminaLogicoEgreso($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'valida_concepto') {
    $resultado = $egreso->validaConcepto($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_concepto') {
    if ($egreso->insertaConcepto($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_concepto') {
    $resultado = $egreso->ultimaConcepto($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_proveedor') {
    if ($egreso->insertaProveedor($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultimo_proveedor') {
    $resultado = $egreso->ultimoProveedor($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'gastos_por_anio') {
    $resultado = $egreso->gastosPorAnio();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'gastos_por_mes') {
    $resultado = $egreso->gastosPorMes();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}