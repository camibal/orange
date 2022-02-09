<?php include "../../controlador/egresos_controller.php";?>
<?php
session_start();
$idUsuario = $_SESSION['id_usuario'];
$egresos  = new Egresos();
$permisos  = $egresos->getPermisos($idUsuario, 14);
?>
 <?php $egreso = new egresosController();?>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalEgreso" data-toggle="modal" id="btn_crear_egreso" type="button">
            Crear egreso
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table display" id="tablaEgresos" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Numero
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Proveedor
                    </th>
                    <th>
                        Descripcion
                    </th>
                    <th>
                        Valor
                    </th>
                    <th>
                        Abono
                    </th>
                    <th>
                        Saldo
                    </th>
                    <?php if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
    ?>
                    <th>
                        Opciones
                    </th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php $egreso->getTablaEgresos($permisos);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_egreso.php";?>
<?php include "modal_proveedor.php";?>
<?php include "modal_concepto.php";?>
<?php include "scripts.php";?>