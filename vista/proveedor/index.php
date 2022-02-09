<?php
include "../../controlador/proveedor_controller.php";
session_start();
$idUsuario       = $_SESSION['id_usuario'];
$proveedor         = new proveedor();
$permisos        = $proveedor->getPermisos($idUsuario, 2);
$permisoconsulta = $proveedor->getPermisosconsulta($idUsuario);
$proveedor         = new proveedorController();
?>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalProveedor" data-toggle="modal" id="btn_crear_proveedor" type="button">
            Crear proveedor
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table display" id="tablaProveedores" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Proveedor
                    </th>
                    <th>
                        Documento
                    </th>
                    <th>
                        Correo
                    </th>
                    <th>
                        Celular
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
                <?php $proveedor->getTablaProveedores($permisos, $permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "scripts.php";?>
<?php include "modal_proveedor.php";?>