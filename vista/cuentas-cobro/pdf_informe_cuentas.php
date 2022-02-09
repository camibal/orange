<?php
include dirname(__file__, 2) . '../../modelo/cuentas_cobro.php';
$cadena = '
<!DOCTYPE html>
    <head>
	       <title>Informe de envios</title>
	       <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.min.css" />
         <style>
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
      $cadena .= '<p class="text-dark font-weight-bold pr-5" style="float: right;">Cuenta de cobro N°' . $listaEnvios[$i]["id"] . '</p>';
      $cadena .= '</div>';
      $cadena .= '<div class="d-flex flex-column text-center mt-5 section2">';
      $cadena .= '<h4 class="text-dark font-weight-bold section2">KRONOS SOLUCIONES TIC SAS</h4>';
      $cadena .= '<h4 class="text-dark font-weight-bold mt-0">NIT: 901.413.106-3</h4>';
      $cadena .= '<h4 class="text-dark font-weight-bold mt-3">DEBE A:</h4>';
      $cadena .= '<p class="text-dark">' . $listaEnvios[$i]["nombre"] . '</p>';
      $cadena .= '<p class="text-dark"><span class="font-weight-bold">CC:</span> ' . $listaEnvios[$i]["cedula"] . '</p>';
      $cadena .= '<h4 class="text-dark font-weight-bold mt-2">LA SUMA DE:</h4>';

      $cadena .= '<p class="text-dark">$' . $listaEnvios[$i]["valor"] . ' ' . '(' . $valorPagar . ' pesos)' . '</p>';
      
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



$filename = "Informe cuenta de cobro";

// include autoloader
require_once '../../librerias/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($cadena);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename);

?>