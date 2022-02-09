<?php
header("Pragma: public");
header("Expires: 0");
$filename = "Informe de gastos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

include dirname(__file__, 2) . '../../modelo/informes.php';
?>
		<div id="tablaVentas">
            <table class="table table-bordered" >
              <thead>
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
                <tbody id="contenidoVentas">
                	<?php
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
    $listaVentas = $informes->getGastos($where);
    //Se recorre array de nivel 1
    if (isset($listaVentas)) {
        $contador = 0;
        $total_valor = 0;
        $total_abono = 0;
        $total_saldo = 0;
        for ($i = 0; $i < sizeof($listaVentas); $i++) {
                echo '<tr>';
                echo '<td>' . $listaVentas[$i]["fecha_egreso"] . '</td>';
                if($listaVentas[$i]["rsocial_proveedor"] != ''){
                    $cliente = $listaVentas[$i]["rsocial_proveedor"];
                } else {
                    $cliente = $listaVentas[$i]["nombres_proveedor"].' '.$listaVentas[$i]["apellidos_proveedor"];
                }
                echo '<td>' . $cliente . '</td>';
                echo '<td>' . $listaVentas[$i]["nombre_categoria"] . '</td>';
                echo '<td>' . $listaVentas[$i]["descripcion_egreso"] . '</td>';
                echo '<td>' . $listaVentas[$i]["valor_egreso"] . '</td>';
                echo '<td>' . $listaVentas[$i]["abono_egreso"] . '</td>';
                echo '<td>' . $listaVentas[$i]["saldo_egreso"] . '</td>';
                echo '</tr>';

                $total_valor = $total_valor + $listaVentas[$i]["valor_egreso"] ;
                $total_abono = $total_abono + $listaVentas[$i]["abono_egreso"] ;
                $total_saldo = $total_saldo + $listaVentas[$i]["saldo_egreso"] ;

            $contador++;
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10">No existen equipos</td>';
        echo '</tr>';
    }
}
?>
                  <tr>
                    <td scope="col" colspan="4"><p class="text-right"><b>Total</b></p></td>
                    <td class="text-right">
                      <span><b><?php echo number_format($total_valor,0,'.','.'); ?></b></span></td>
                    <td class="text-right">
                      <span><b><?php echo number_format($total_abono,0,'.','.'); ?></b></span></td>
                    </td>
                    <td class="text-right">
                      <span><b><?php echo number_format($total_saldo,0,'.','.'); ?></b></span></td>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>