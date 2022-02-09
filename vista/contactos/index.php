<?php
include "../../controlador/contacto_controller.php";
session_start();
$idUsuario       = $_SESSION['id_usuario'];
$contacto        = new contacto();
$permisos        = $contacto->getPermisos($idUsuario, 2);
$permisoconsulta = $contacto->getPermisosconsulta($idUsuario);
$contacto        = new contactoController();
?>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalContacto" data-toggle="modal" id="btn_crear_contacto" type="button">
            Crear cuenta de cobro
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <table class="table display" id="tablaContactos" style="width:100%">
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
                <?php $contacto->getTablaContactos($permisos, $permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "scripts.php";?>
<?php include "modal_contacto.php";?>
<?php include "modal_cargo.php";?>
<?php include "modal_cliente.php";?>