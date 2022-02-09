<?php
include "../../controlador/cuentas_cobro_controller.php";
session_start();
$idUsuario       = $_SESSION['id_usuario'];
$cuentasCobro        = new cuentasCobro();
$permisos        = $cuentasCobro->getPermisos($idUsuario, 2);
$permisoconsulta = $cuentasCobro->getPermisosconsulta($idUsuario);
$cuentasCobro        = new cuentasCobroController();
?>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
        ?>
            <button class="btn btn-success" data-target="#modalCliente" data-toggle="modal" id="btn_crear_cliente" type="button">
                Crear cuenta de cobro
            </button>
        <?php } ?>
        <hr>
        </hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table display" id="tablaCuentas" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Ciudad
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Cédula
                    </th>
                    <th>
                        Valor
                    </th>
                    <th>
                        Concepto
                    </th>
                    <th>
                        Celular
                    </th>
                    <th>
                        Formas de pago
                    </th>
                    <?php if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                    ?>
                        <th>
                            Opciones
                        </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php $cuentasCobro->getTablaCuentasCobro($permisos, $permisoconsulta); ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "scripts.php"; ?>
<?php include "modal_cuentas_cobro.php"; ?>
<?php include "modal_detalle.php"; ?>