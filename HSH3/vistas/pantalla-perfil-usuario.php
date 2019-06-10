<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Mi Perfil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
  </head>

  <nav class="uk-navbar-container" style="background-color:white" uk-navbar>
    <div class="uk-navbar-left">
      <ul class="uk-navbar-nav">
          <li><a href="../vistas/home-user.php"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
      </ul>
    </div>
    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav">
          <li><a href="#">OPCIONES</a></li>
          <div uk-dropdown>
            <ul class="uk-nav uk-dropdown-nav">
              <li class="uk-nav-header">Usuario</li>
              <li><a href="..\vistas\pantalla-perfil-usuario.php">Mi Perfil</a></li>
              <li><a href="#">Mis Subastas</a></li>
              <li><a href="#">Mi Plan</a></li>
              <li><a href="#">Mi Perfil</a></li>
              <li class="uk-nav-divider"></li>
              <li class="uk-nav-header">Sesión</li>
              <li><a href="../modelos/cerrar-sesion.php">Cerrar Sesión</a></li>
            </ul>
          </div>
      </ul>
    </div>
  </nav>

  <?php
  include('../modelos/conexion.php');

  $conexion=conectar();
  $id = $_SESSION['id'];
  $consulta= "SELECT * FROM usuario WHERE id=$id";
  $result=mysqli_query($conexion,$consulta);
  $row = mysqli_fetch_array($result);

  if ($row['premium']) {
    $subscripcion = "Usuario Premium";
  } else {
    $subscripcion = "Usuario Estándar";
  }
  ?>

  <body class="uk-height-viewport my-background-color">
    <div class="uk-padding-large uk-padding-remove-bottom">
      <div class="uk-card uk-card-default uk-border-rounded" uk-grid>
        <div class="uk-width-expand">
          <div class="uk-card-header">
            <h3><?php echo $row['nombre_usuario'].", ".$row['apellido_usuario'] ?></h3>
          </div>
          <div class="uk-card-body">
            <p><?php echo $row['mail']; ?></p>
            <p><?php echo $subscripcion ?></p>
          </div>
          <div class="uk-card-footer">
            <a href="#">modificar</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
