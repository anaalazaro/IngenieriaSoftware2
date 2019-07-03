<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">
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
                <li class="uk-nav-divider"></li>
                <li class="uk-nav-header">Sesión</li>
                <li><a href="../modelos/cerrar-sesion.php">Cerrar Sesión</a></li>
              </ul>
            </div>
        </ul>
      </div>
    </nav>

    <?php

    /*  ESTADOS DE UN PAQUETE

          RESERVA     -> un paquete que se encuentra disponible para ser reservado
          RESERVADO   -> un paquete que fue adquirido en tiempo de reserva
          SUBASTA     -> un paquete que paso el tiempo de reserva y nadie lo adquirio
          SUBASTADO   -> un paquete que paso el tiempo de subasta y alguien lo adquirio
          ESPERA      -> un paquete que paso el tiempo de subasta y nadie lo adquirio
          HOTSALE     -> un paquete que estaba en espera y fue seleccionado para hotsale
          LIQUIDADO   -> un paquete en hotsale que fue adquirido por alguien
          CADUCADO    -> cualquier paquete cuando pasa su fecha de uso

    */

      include("../modelos/funciones-paquetes.php");
      $id = $_GET['id'];
      $paquete = mysqli_fetch_array(getPaquetePorId($id));
     ?>

    <div class="uk-card uk-card-body uk-card-default">
      <h2 class="uk-card-title">
        <?php echo $paquete["id_res"]; ?>
      </h2>
      <?php echo $paquete["estado"]; ?>
      <?php echo $paquete["semana"]; ?>
      <?php echo $paquete["precio_base"]; ?>
    </div>

  </body>
</html>
