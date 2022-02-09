<?php
include dirname(__file__, 2) . '/modelo/login.php';

$login = new Login();
$tipo     = $_GET['tipo'];

if ($tipo == 'logeo') {
    $resultado = $login->getLogin($_GET);
    if ($resultado) {
        session_start();
        $_SESSION["id_usuario"] = $resultado[0]["id_usuario"];
        header('location: ../vista/index.php');
        //echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}