<?php
include "../../controlador/categoria_controller.php";
session_start();
$idUsuario       = $_SESSION['id_usuario'];
$categoria         = new categoria();
$permisos        = $categoria->getPermisos($idUsuario, 2);
$permisoconsulta = $categoria->getPermisosconsulta($idUsuario);
$categoria         = new categoriaController();
?>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalCategoria" data-toggle="modal" id="btn_crear_categoria" type="button">
            Crear categoria
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table display" id="tablaCategorias" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Nombre
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
                <?php $categoria->getTablaCategorias($permisos, $permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "scripts.php";?>
<?php include "modal_categoria.php";?>