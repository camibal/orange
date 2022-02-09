<?php
include dirname(__file__, 2) . '../../modelo/informes.php';
// Halamos las librerias de dompdf
require_once '../../librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// Inicializamos dompdf
$dompdf = new Dompdf();
//HTML
$cadena = '
<!DOCTYPE html>
    <head>
	       <title>Historico equipo</title>
	       <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.min.css" />
    </head>
    <body>
    <!-- Modal -->';

//HTML
$cadena .= '
            <div id="tablaClientes">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col" colspan="2" class="text-center">
                      <img src="../../imagenes/logo_empresa.png" class="img-fluid">
                    </th>
                    <th scope="col" colspan="2" class="text-center">
                      <h4>
                        <strong>
                          Kronos Soluciones TIC<br>
                          Informe de clientes
                        </strong>
                      </h4>
                    </th>
                    <th scope="col" colspan="2" class="text-center">
                      <strong>
                        Fecha y hora impresion:<br>';

$cadena .= date('Y-m-d H:i:s');

$cadena .= '
                      </strong>
                    </th>
                  </tr>
                  <tr>
                    <th scope="col" colspan="6" class="text-center"></th>
                  </tr>
                <tr>
                  <th scope="col">Nombres</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Documento</th>
                  <th scope="col">Razón social</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Celular</th>
                </tr>
                </thead>
                <tbody id="contenidoVentas">';

$tipo = $_GET['tipo'];
if ($tipo == 'informe_clientes') {
    //Instancia del informes
    $informes = new Informes();
    //Lista del menu Nivel 1
    $listaClientes = $informes->getClientes();
    //Se recorre array de nivel 1
    if (isset($listaClientes)) {
        for ($i = 0; $i < sizeof($listaClientes); $i++) {
            $cadena .= '<tr>';
            $cadena .= '<td>' . $listaClientes[$i]["nombres_cliente"] . '</td>';
            $cadena .= '<td>' . $listaClientes[$i]["apellidos_cliente"] . '</td>';
            $cadena .= '<td>' . $listaClientes[$i]["documento_cliente"] . '</td>';
            $cadena .= '<td>' . $listaClientes[$i]["rsocial_cliente"] . '</td>';
            $cadena .= '<td>' . $listaClientes[$i]["email_cliente"]  . '</td>';
            $cadena .= '<td>' . $listaClientes[$i]["celular_cliente"]  . '</td>';
            $cadena .= '</tr>';
            $contador++;
        }
    } else {
        $cadena .= '<tr>';
        $cadena .= '<td colspan="10">No existen equipos</td>';
        $cadena .= '</tr>';
    }
}

$cadena .=  '<tr>
              <td scope="col" colspan="5">
                <p class="text-right"><b>Total</b></p>
              </td>
              <td class="text-right">
                <span><b>'. number_format($total_valor,0,".",".") .'</b></span>
              </td>
            </tr>';

 $cadena .=    '</tbody>
              </table>
            </div>';
$cadena .= '
    </body>
</html>';

$dompdf->loadHtml($cadena);
// Colocamos als propiedades de la hoja
$dompdf->setPaper("A4");
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream("Informe de clientes");
