<?php
include dirname(__file__, 2) . '/modelo/proveedor.php';

$proveedor = new Proveedor();
$tipo    = $_GET['tipo'];

if ($tipo == 'inserta') {
    if ($proveedor->insertaProveedor($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta') {
    $resultado = $proveedor->consultaProveedor($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    if ($proveedor->editaProveedor($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'elimina_logico') {
    if ($proveedor->eliminaLogicoProveedor($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}