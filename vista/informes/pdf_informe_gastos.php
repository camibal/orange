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
            <div id="tablaGastos">
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
                          Informe de gastos
                        </strong>
                      </h4>
                    </th>
                    <th scope="col" colspan="3" class="text-center">
                      <strong>
                        Fecha y hora impresion:<br>';

$cadena .= date('Y-m-d H:i:s');

$cadena .= '
                      </strong>
                    </th>
                  </tr>
                  <tr>
                    <th scope="col" colspan="7" class="text-center"></th>
                  </tr>
                  <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Abonado</th>
                    <th scope="col">Saldo</th>
                  </tr>
                </thead>
                <tbody id="contenidoGastos">';

$tipo = $_GET['tipo'];
if ($tipo == 'informe_gastos') {
    if($_GET["fecha_inicial_gastos"] == '' || $_GET["fecha_final_gastos"] == ''){
      $where = '';
    } else {
      $fecha_inicial = $_GET['fecha_inicial_gastos'];
      $fecha_final = $_GET['fecha_final_gastos'];
      $where = " AND (fecha_egreso >= '".$fecha_inicial."' AND fecha_egreso <= '".$fecha_final."')";
    }
    //Instancia del informes
    $informes = new Informes();
    //Lista del menu Nivel 1
    $listaGastos = $informes->getGastos($where);
    //Se recorre array de nivel 1
    if (isset($listaGastos)) {
        $contador = 0;
        $total_valor = 0;
        $total_abono = 0;
        $total_saldo = 0;
        for ($i = 0; $i < sizeof($listaGastos); $i++) {
            $cadena .= '<tr>';
            $cadena .= '<td>' . $listaGastos[$i]["fecha_egreso"] . '</td>';

                if($listaGastos[$i]["rsocial_proveedor"] != ''){
                    $cliente = $listaGastos[$i]["rsocial_proveedor"];
                } else {
                    $cliente = $listaGastos[$i]["nombres_proveedor"].' '.$listaGastos[$i]["apellidos_proveedor"];
                }
            
            $cadena .= '<td>' . $cliente . '</td>';
            $cadena .= '<td>' . $listaGastos[$i]["nombre_categoria"] . '</td>';
            $cadena .= '<td>' . $listaGastos[$i]["descripcion_egreso"] . '</td>';
            $cadena .= '<td>' . number_format($listaGastos[$i]["valor_egreso"],0,".",".") . '</td>';
            $cadena .= '<td>' . number_format($listaGastos[$i]["abono_egreso"],0,".",".") . '</td>';
            $cadena .= '<td>' . number_format($listaGastos[$i]["saldo_egreso"],0,".",".") . '</td>';

                $total_valor = $total_valor + $listaGastos[$i]["valor_egreso"] ;
                $total_abono = $total_abono + $listaGastos[$i]["abono_egreso"] ;
                $total_saldo = $total_saldo + $listaGastos[$i]["saldo_egreso"] ;

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
              <td scope="col" colspan="4">
                <p class="text-right"><b>Total</b></p>
              </td>
              <td class="text-right">
                <span><b>'. number_format($total_valor,0,".",".") .'</b></span>
              </td>
              <td class="text-right">
                <span><b>'. number_format($total_abono,0,".",".") .'</b></span>
              </td>
              <td class="text-right">
                <span><b>'. number_format($total_saldo,0,".",".") .'</b></span>
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
$dompdf->stream("Informe de gastos");
