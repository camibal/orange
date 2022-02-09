<?php
include "../../controlador/cliente_controller.php";
session_start();
$idUsuario       = $_SESSION['id_usuario'];
$cliente         = new cliente();
$permisos        = $cliente->getPermisos($idUsuario, 2);
$permisoconsulta = $cliente->getPermisosconsulta($idUsuario);
$cliente         = new clienteController();
?>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalCliente" data-toggle="modal" id="btn_crear_cliente" type="button">
            Crear cliente
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table display" id="tablaClientes" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Nombres
                    </th>
                    <th>
                        Apellidos
                    </th>
                    <th>
                        Documento
                    </th>
                    <th>
                        Razon social
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
                <?php $cliente->getTablaClientes($permisos, $permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "scripts.php";?>
<?php include "modal_cliente.php";?>