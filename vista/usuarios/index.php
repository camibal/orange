<?php 
include "../../controlador/usuario_controller.php";
session_start();
$idUsuario       = $_SESSION['id_usuario'];
$permisos        = $usuario->getPermisos($idUsuario, 1);
$permisoconsulta = $usuario->getPermisosconsulta($idUsuario);
?>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalUsuario" data-toggle="modal" id="btn_crear_usuario" type="button">
            Crear usuario
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed table-bordered display" id="tablaUsuarios" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>
                        Usuario
                    </th>
                    <th>
                        Correo
                    </th>
                    <th>
                        Celular
                    </th>
                    <?php if ($permisos[0]["editar"] == 1) {
    ?>
                    <th>
                        Editar
                    </th>
                    <?php }?>
                    <?php if ($permisos[0]["eliminar"] == 1) {
    ?>
                    <th>
                        Eliminar
                    </th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php getTablaUsuario($permisos, $permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_usuario.php";?>
<?php include "scripts.php";?>