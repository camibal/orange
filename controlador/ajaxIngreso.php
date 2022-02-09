<?php
include dirname(__file__, 2) . '/modelo/ingresos.php';

$ingreso = new Ingresos();
$tipo    = $_GET['tipo'];

if ($tipo == 'inserta') {
    if ($ingreso->insertaIngreso($_GET)) {
        $fkID_ingreso = $ingreso->ultimoIngreso();
        if($_GET["abono_ingreso"] > 0){
            $ingreso->insertaAbono($fkID_ingreso[0]["id_ingreso"],$_GET);
        }
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta') {
    $resultado = $ingreso->consultaIngreso($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    if ($ingreso->editaIngreso($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'elimina_logico') {
    if ($ingreso->eliminaLogicoIngreso($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'valida_categoria') {
    $resultado = $ingreso->validaCategoria($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_categoria') {
    if ($ingreso->insertaCategoria($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_categoria') {
    $resultado = $ingreso->ultimaCategoria($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_cliente') {
    if ($ingreso->insertaCliente($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultimo_cliente') {
    $resultado = $ingreso->ultimoCliente($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'ventas_por_año') {
    $resultado = $ingreso->ventasPorAño();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'ventas_por_mes') {
    $resultado = $ingreso->ventasPorMes();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}