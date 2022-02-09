<?php
include dirname(__file__, 2) . '/modelo/cuentas_cobro.php';

$cuentasCobro = new cuentasCobro();

// variables
// post
$tipo  = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";
$nombre  = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
$ciudad  = isset($_REQUEST['ciudad']) ? $_REQUEST['ciudad'] : "";
$fecha  = isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : "";
$cedula  = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : "";
$valor  = isset($_REQUEST['valor']) ? $_REQUEST['valor'] : "";
$concepto  = isset($_REQUEST['concepto']) ? $_REQUEST['concepto'] : "";
$celular  = isset($_REQUEST['celular']) ? $_REQUEST['celular'] : "";
$formaspago  = isset($_REQUEST['formas_pago']) ? $_REQUEST['formas_pago'] : "";
// delete
$id  = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
// echo $tipo;

if ($tipo == 'consulta') {
   $resultado = $cuentasCobro->consultaCliente($id);
   if ($resultado) {
      echo json_encode($resultado); //imprime el json
   } else {
      echo 'No se consulto';
   }
}

if ($tipo == 'guardar') {
   if ($cuentasCobro->postCuentasCobro($nombre, $ciudad, $fecha, $cedula, $valor, $concepto, $celular, $formaspago)) {
      echo 'Se guardo';
   } else {
      echo 'No se guardo';
   }
}

if ($tipo == 'eliminar') {
   if ($cuentasCobro->deleteCuentasCobro($id)) {
      echo 'Se elimino';
   } else {
      echo 'No se elimino';
   }
}

if ($tipo == 'editar') {
   if ($cuentasCobro->editaCuentasCobro($id, $nombre, $ciudad, $fecha, $cedula, $valor, $concepto, $celular, $formaspago)) {
      echo 'Se guardo';
   } else {
      echo 'No se guardo';
   }
}

if ($tipo == 'detalle') {
   $resultado = $cuentasCobro->consultaDetalles($id);
   if ($resultado) {
       echo json_encode($resultado); //imprime el json
   } else {
       return 'No se consulto';
   }
}
