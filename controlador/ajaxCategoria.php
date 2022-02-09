<?php
include dirname(__file__, 2) . '/modelo/categoria.php';

$categoria = new Categoria();
$tipo    = $_GET['tipo'];

if ($tipo == 'inserta') {
    if ($categoria->insertaCategoria($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta') {
    $resultado = $categoria->consultaCategoria($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    if ($categoria->editaCategoria($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'elimina_logico') {
    if ($categoria->eliminaLogicoCategoria($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}