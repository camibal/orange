<?php include "../../controlador/ingresos_controller.php";?>
<?php
session_start();
$idUsuario = $_SESSION['id_usuario'];
$ingresos  = new Ingresos();
$permisos  = $ingresos->getPermisos($idUsuario, 14);
?>
 <?php $ingreso = new ingresosController();?>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalIngreso" data-toggle="modal" id="btn_crear_ingreso" type="button">
            Crear ingreso
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table display" id="tablaIngresos" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Numero
                    </th>
                    <th>
                        Fecha
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
                <?php $ingreso->getTablaIngresos($permisos);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_ingreso.php";?>
<?php include "modal_cliente.php";?>
<?php include "modal_categoria.php";?>
<?php include "scripts.php";?>