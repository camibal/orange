<?php
header("Pragma: public");
header("Expires: 0");
$filename = "Informe de clientes.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

include dirname(__file__, 2) . '../../modelo/informes.php';
?>
		<div id="tablaClientes">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th scope="col">Nombres</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Documento</th>
                  <th scope="col">Razón social</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Celular</th>
                </tr>
                </thead>
                <tbody id="contenidoClientes">
                	<?php
$tipo = $_GET['tipo'];
if ($tipo == 'informe_clientes') {
    //Instancia del informes
    $informes = new Informes();
    //Lista del menu Nivel 1
    $listaClientes = $informes->getClientes();
    //Se recorre array de nivel 1
    if (isset($listaClientes)) {
        for ($i = 0; $i < sizeof($listaClientes); $i++) {
          echo '<tr>';
          echo '<td>' . $listaClientes[$i]["nombres_cliente"] . '</td>';
          echo '<td >' . $listaClientes[$i]["apellidos_cliente"] . '</td>';
          echo '<td >' . $listaClientes[$i]["documento_cliente"] . '</td>';
          echo '<td >' . $listaClientes[$i]["rsocial_cliente"] . '</td>';
          echo '<td >' . $listaClientes[$i]["email_cliente"] . '</td>';
          echo '<td >' . $listaClientes[$i]["celular_cliente"] . '</td>';
          echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10">No existen equipos</td>';
        echo '</tr>';
    }
}
?>
                </tbody>
              </table>
            </div>