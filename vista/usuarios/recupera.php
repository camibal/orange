<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Se ingluye el header
include '../head.php';
//Se incluye el modelo
include '../../modelo/usuario.php';
//Se crea una nueva instancia
$usuario = new Usuario();
?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <div class="form-group text-center">
      <?php if (isset($_GET['enviado'])) {?>
        <div class="alert alert-success">
          Verificado el correo electronico para la nueva clave.
        </div>
      <?php }?>
    </div>

    <div class="form-group text-center">
      <?php if (isset($_GET['pass'])) {;?>
        <div class="alert alert-danger">
          Clave digitada invalida.
        </div>
      <?php }?>
    </div>

    <div class="form-group text-center">
      <?php if (isset($_GET['sesion'])) {?>
        <div class="alert alert-danger">
          Inicie sesion.
        </div>
      <?php }?>
    </div>

    <div class="form-group text-center">
      <?php if (isset($_GET['logout'])) {?>
        <div class="alert alert-success">
          Logout exitoso.
        </div>
      <?php }?>
    </div>

    <!-- Login Form -->
    <form action="../../controlador/usuario_controller.php" method="POST">
      <div class="form-group row text-center">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electronico" required>
        </div>
        <div class="col-md-3">
        </div>
      </div>
      <button type="submit" class="btn btn-success" value="Recuperar" name="Recuperar">Enviar</button>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="../login/index.php">Iniciar sesion</a>
    </div>

  </div>
</div>
<?php
//Se ingluye el header
include '../footer.php';
?>