<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$id_usuario    = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : "";

$idUsuario    = isset($_SESSION["id_usuario"]) ? $_SESSION["id_usuario"] : "";
if($id_usuario == ""){
    if($idUsuario == ""){
        header("Location: login/index.php");
        exit;
    }
} else {
    $_SESSION["id_usuario"] = $id_usuario;
}

include 'head.php';

include '../modelo/usuario.php';
$usuario      = new Usuario();
$datosusuario = $usuario->getUsuariolog($idUsuario);
$vermodulo    = $usuario->getVermodulo($idUsuario, 1);
?>
    <body id="page-top">
        <!-- Page Wrapper -->
        <section id="menu">
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion toggled" id="accordionSidebar">
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home" style="cursor: pointer">
                            </i>
                            <span>
                                Inicio
                            </span>
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                        <!-- Heading -->
                        <div class="sidebar-heading">
                            Menú
                        </div>
                        <?php
$vermodulo = $usuario->getVermodulo($idUsuario, 2);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_clientes" style="cursor: pointer">
                                <i class="fas fa-user-tie"></i>
                                <span>
                                    Clientes
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <?php
$vermodulo = $usuario->getVermodulo($idUsuario, 3);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_contacto" style="cursor: pointer">
                                <i class="fas fa-address-book"></i>
                                <span>
                                    Contactos
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <?php
$vermodulo = $usuario->getVermodulo($idUsuario, 8);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_ingresos" style="cursor: pointer">
                                <i class="fas fa-comment-dollar"></i>
                                <span>
                                    Ingresos
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <?php
$vermodulo = $usuario->getVermodulo($idUsuario, 8);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_abonos" style="cursor: pointer">
                                <i class="fas fa-dollar-sign"></i>
                                <span>
                                    Abonos
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <?php
$vermodulo = $usuario->getVermodulo($idUsuario, 4);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_egresos" style="cursor: pointer">
                                <i class="fas fa-minus-square"></i>
                                <span>
                                    Egresos
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <?php
                            $vermodulo = $usuario->getVermodulo($idUsuario, 4);
                            if ($vermodulo[0]['ver'] == 1) {
                        ?>
                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_categoria" style="cursor: pointer">
                                <i class="fas fa-briefcase"></i>
                                <span>
                                    Categoria
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <?php
                            $vermodulo = $usuario->getVermodulo($idUsuario, 4);
                            if ($vermodulo[0]['ver'] == 1) {
                        ?>
                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_proveedor" style="cursor: pointer">
                                <i class="fas fa-user-tag"></i>
                                <span>
                                    Proveedor
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <?php
$vermodulo = $usuario->getVermodulo($idUsuario, 12);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_informes" style="cursor: pointer">
                                <i class="fas fa-chart-bar">
                                </i>
                                <span>
                                    Informes
                                </span>
                            </a>
                        </li>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_cuentas_cobro" style="cursor: pointer">
                                <i class="fas fa-chart-bar">
                                </i>
                                <span>
                                    Cuentas de cobro
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle">
                            </button>
                        </div>
                    </hr>
                </hr>
            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div class="d-flex flex-column" id="content-wrapper">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <div class="titulo" id="titulo">&nbsp;Inicio</div>
                        <!-- Sidebar Toggle (Topbar) -->
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
                            <i class="fa fa-bars">
                            </i>
                        </button>
                        <!-- Topbar Search -->

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                            <!-- Nav Item - Alerts -->

                            <!-- Nav Item - Messages -->

                            <div class="topbar-divider d-none d-sm-block">
                            </div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow" style="cursor: pointer">
                                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="userDropdown" role="button">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?php echo $datosusuario[0]["nombre_usuario"]; ?>
                                    </span>
                                    <img class="img-profile rounded-circle" src="../imagenes/alejo.png">
                                    </img>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        <?php echo $datosusuario[0]["nombre_usuario"]; ?>
                                    </a>
                                    <?php
$vermodulo = $usuario->getVermodulo($idUsuario, 1);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                                    <a class="dropdown-item" id="menu_usuarios">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        Usuarios
                                    </a>
                                    <?php }?>
                                    <div class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" data-target="#logoutModal" data-toggle="modal" href="#">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        Salir
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div id="tabla" class="panel-default" style="margin: 20px;">
                        <div class="row">
                            <div class="wrapper col-lg-4 col-md-6 col-sm-12"><canvas id="ventas"></canvas></div>
                            <div class="wrapper col-lg-4 col-md-6 col-sm-12"><canvas id="gastos"></canvas></div>
                            <div class="wrapper col-lg-4 col-md-6 col-sm-12"><canvas id="vyg"></canvas></div>
                            <div class="wrapper col-lg-4 col-md-6 col-sm-12"><canvas id="ventasMes"></canvas></div>
                            <div class="wrapper col-lg-4 col-md-6 col-sm-12"><canvas id="gastosMes"></canvas></div>
                            <div class="wrapper col-lg-4 col-md-6 col-sm-12"><canvas id="vygMes"></canvas></div>
                        </div>
                    </div>
                    <div class="container-fluid">

                    <!-- /.container-fluid -->
                </div>

                <!-- End of Main Content -->
                <!-- Footer -->

                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        </section>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up">
            </i>
        </a>
        <!-- Logout Modal-->
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="logoutModal" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Desea cerrar sesión?
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">
                            Cancelar
                        </button>
                        <button class="btn btn-primary" name="btn_cerrar_sesion" id="btn_cerrar_sesion">
                            Cerrar sesión
                        </button>
                    </div>
                </div>
            </div>
        </div>
  <?php include 'footer.php';?>