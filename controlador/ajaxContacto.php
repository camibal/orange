<?php
include dirname(__file__, 2) . '/modelo/contacto.php';

$contacto = new Contacto();
$tipo     = $_GET['tipo'];

if ($tipo == 'inserta') {
    if ($contacto->insertaContacto($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta') {
    $resultado = $contacto->consultaContacto($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    if ($contacto->editaContacto($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'elimina_logico') {
    if ($contacto->eliminaLogicoContacto($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'valida_cargo') {
    $resultado = $contacto->validaCargo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_cargo') {
    if ($contacto->insertaCargo($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultimo_cargo') {
    $resultado = $contacto->ultimoCargo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_cliente') {
    if ($contacto->insertaCliente($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultimo_cliente') {
    $resultado = $contacto->ultimoCliente($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
