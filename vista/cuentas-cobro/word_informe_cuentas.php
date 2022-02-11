<?php
include dirname(__file__, 2) . '../../modelo/cuentas_cobro.php';
$date = date("d-m-Y i:s");
header("Content-Type: application/vnd.msword");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=" . $date . ".doc");

$cadena = '
<!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	       <title>Informe de envios</title>
	       <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
         <style>
         body{
           text-align: center;
         }
         h4{
           font-size: 2rem;
         }
         p{
           font-size: 1.5rem;
           font-weight: 500;
         }
         .mt-3{
          padding-top: 4rem!important;
         }
         .mt-5{
          padding-top: 6rem!important;
         }
         .font-weight-bold{
           font-weight: bold;
         }
         .section1{
           padding-bottom: 15rem;
         }
         .section2{
           padding-top: 10rem;
         }
         .text-dark{
          color: #5a5c69!important;
         }
         </style>
    </head>
    <body>
    <!-- Modal -->';

$cadena .= '<div class="container bg-white w-100 h-100 p-5">';

$tipo = $_GET['tipo'];
$id = $_GET['id'];
$fech = $_GET['fecha'];
$valorPagar = $_GET['valorPagar'];
$valorPagarNumber = $_GET['valorPagarNumber'];
$consecutivo = $_GET['consecutivo'];

if ($tipo == 'informe_cuentas') {
  //Instancia del informes
  $informes = new CuentasCobro();
  //Lista del menu Nivel 1
  $listaEnvios = $informes->consultaDetalles($id);
  //Se recorre array de nivel 1
  if (isset($listaEnvios)) {
    $contador = 0;
    // $cadena = sizeof($listaEnvios);
    for ($i = 0; $i < sizeof($listaEnvios); $i++) {
      $cadena .= '<div class="text-center section1">';
      $cadena .= '<p class="text-dark font-weight-bold pl-5" style="float: left;">' . $listaEnvios[$i]["ciudad"] . ' ' . $fech . '</p>';
      $cadena .= '<p class="text-dark font-weight-bold pr-5" style="float: right;">Cuenta de cobro N°' . $consecutivo . '</p>';
      $cadena .= '</div>';
      $cadena .= '<div class="d-flex flex-column text-center mt-5 section2">';
      $cadena .= '<h4 class="text-dark font-weight-bold section2">KRONOS SOLUCIONES TIC SAS</h4>';
      $cadena .= '<h4 class="text-dark font-weight-bold mt-0">NIT: 901.413.106-3</h4>';
      $cadena .= '<h4 class="text-dark font-weight-bold mt-3">DEBE A:</h4>';
      $cadena .= '<p class="text-dark">' . $listaEnvios[$i]["nombre"] . '</p>';
      $cadena .= '<p class="text-dark"><span class="font-weight-bold">CC:</span> ' . $listaEnvios[$i]["cedula"] . '</p>';
      $cadena .= '<h4 class="text-dark font-weight-bold mt-2">LA SUMA DE:</h4>';
      $cadena .= '<p class="text-dark">' . $valorPagarNumber . ' ' . '(' . $valorPagar . ' pesos)' . '</p>';
      $cadena .= '<h4 class="text-dark font-weight-bold mt-2">POR CONCEPTO DE:</h4>';
      $cadena .= '<p class="text-dark">' . $listaEnvios[$i]["concepto"] . '</p>';
      $cadena .= '<p class="mt-3 text-dark">' . $listaEnvios[$i]["nombre"] . '</p>';
      $cadena .= '<p class="mt-0 text-dark"><span class="font-weight-bold">Cel:</span> ' . $listaEnvios[$i]["celular"] . '</p>';
      $cadena .= `
      <p class="text-dark">Certifico que he presentado este servicio personalmente y que no he contratado o
                vinculado dos o más trabajadores asociados a la actividad Art. 384 parágrafo 2
                Estatuto Tributario
            </p>
      `;
      $cadena .= ' </div>';
      $cadena .= ' <div class="d-flex flex-column text-center">';
      $cadena .= '<p class="text-dark font-weight-bold">Formas de pago:</p>';
      $cadena .= '<p class="text-dark">' . $listaEnvios[$i]["formas_pago"] . ' </p>';
      $cadena .= '</div>';
      $cadena .= '</div>';

      $contador++;
    }
  } else {
    $cadena .= '<div>';
    $cadena .= '<div>No existen envios</div>';
    $cadena .= '</div>';
  }
}

$cadena .= '</div>';
$cadena .= '
    </body>
</html>';

echo $cadena;
