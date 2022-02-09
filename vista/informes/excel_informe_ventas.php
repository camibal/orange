<?php
header("Pragma: public");
header("Expires: 0");
$filename = "Informe de ventas.xls";
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
                  <th scope="col">Cliente</th>
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
if ($tipo == 'informe_ventas') {
    if($_GET["fecha_inicial_ventas"] == '' || $_GET["fecha_final_ventas"] == ''){
      $where = '';
    } else {
      $fecha_inicial = $_GET['fecha_inicial_ventas'];
      $fecha_final = $_GET['fecha_final_ventas'];
      $where = " AND (fecha_ingreso >= '".$fecha_inicial."' AND fecha_ingreso <= '".$fecha_final."')";
    }
    //Instancia del informes
    $informes = new Informes();
    //Lista del menu Nivel 1
    $listaVentas = $informes->getVentas($where);
    //Se recorre array de nivel 1
    if (isset($listaVentas)) {
        $contador = 0;
        $total_valor = 0;
        $total_abono = 0;
        $total_saldo = 0;
        for ($i = 0; $i < sizeof($listaVentas); $i++) {
                echo '<tr>';
                echo '<td>' . $listaVentas[$i]["fecha_ingreso"] . '</td>';
                if($listaVentas[$i]["rsocial_cliente"] != ''){
                    $cliente = $listaVentas[$i]["rsocial_cliente"];
                } else {
                    $cliente = $listaVentas[$i]["nombres_cliente"].' '.$listaVentas[$i]["apellidos_cliente"];
                }
                echo '<td>' . $cliente . '</td>';
                echo '<td>' . $listaVentas[$i]["nombre_categoria"] . '</td>';
                echo '<td>' . $listaVentas[$i]["descripcion_ingreso"] . '</td>';
                echo '<td>' . $listaVentas[$i]["valor_ingreso"] . '</td>';
                echo '<td>' . $listaVentas[$i]["abono_ingreso"] . '</td>';
                echo '<td>' . $listaVentas[$i]["saldo_ingreso"] . '</td>';
                echo '</tr>';

                $total_valor = $total_valor + $listaVentas[$i]["valor_ingreso"] ;
                $total_abono = $total_abono + $listaVentas[$i]["abono_ingreso"] ;
                $total_saldo = $total_saldo + $listaVentas[$i]["saldo_ingreso"] ;

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