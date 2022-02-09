<?php include "../../controlador/abonos_controller.php";?>
<?php
session_start();
$idUsuario = $_SESSION['id_usuario'];
$abonos  = new Abonos();
$permisos  = $abonos->getPermisos($idUsuario, 14);
?>
 <?php $abono = new abonosController();?>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalAbono" data-toggle="modal" id="btn_crear_abono" type="button">
            Crear abono
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table display" id="tablaAbonos" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Numero
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Numero ingreso
                    </th>
                    <th>
                        Cliente
                    </th>
                    <th>
                        Descripcion
                    </th>
                    <th>
                        Valor
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
                <?php $abono->getTablaAbonos($permisos);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_abono.php";?>
<?php include "scripts.php";?>