<?php
header("Pragma: public");
header("Expires: 0");
$filename = "Informe de abonos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

include dirname(__file__, 2) . '../../modelo/informes.php';
?>
		<div id="tablaAbonos">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th scope="col">Numero</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Numero ingreso</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Valor</th>
                </tr>
                </thead>
                <tbody id="contenidoAbonos">
                	<?php
$tipo = $_GET['tipo'];
if ($tipo == 'informe_abonos') {
    if($_GET["fecha_inicial_abonos"] == '' || $_GET["fecha_final_abonos"] == ''){
      $where = '';
    } else {
      $fecha_inicial = $_GET['fecha_inicial_abonos'];
      $fecha_final = $_GET['fecha_final_abonos'];
      $where = " AND (fecha_abono >= '".$fecha_inicial."' AND fecha_abono <= '".$fecha_final."')";
    }
    //Instancia del informes
    $informes = new Informes();
    //Lista del menu Nivel 1
    $listaAbonos = $informes->getAbonos($where);
    //Se recorre array de nivel 1
    if (isset($listaAbonos)) {
        $contador = 0;
        $total_valor = 0;
        $total_abono = 0;
        $total_saldo = 0;
        for ($i = 0; $i < sizeof($listaAbonos); $i++) {
                echo '<tr>';
                echo '<td>' . $listaAbonos[$i]["id_abono"] . '</td>';
                echo '<td>' . $listaAbonos[$i]["fecha_abono"] . '</td>';
                echo '<td>' . $listaAbonos[$i]["fkID_ingreso"] . '</td>';
                if($listaAbonos[$i]["rsocial_cliente"] != ''){
                    $cliente = $listaAbonos[$i]["rsocial_cliente"];
                } else {
                    $cliente = $listaAbonos[$i]["nombres_cliente"].' '.$listaAbonos[$i]["apellidos_cliente"];
                }
                echo '<td>' . $cliente . '</td>';
                echo '<td>' . $listaAbonos[$i]["descripcion_ingreso"] . '</td>';
                echo '<td>' . $listaAbonos[$i]["valor_abono"] . '</td>';
                echo '</tr>';

                $total_valor = $total_valor + $listaAbonos[$i]["valor_abono"] ;

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
                    <td scope="col" colspan="5"><p class="text-right"><b>Total</b></p></td>
                    <td class="text-right">
                      <span><b><?php echo number_format($total_valor,0,'.','.'); ?></b></span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>