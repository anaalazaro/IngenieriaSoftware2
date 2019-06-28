
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Reservas</title>
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
    <div class="uk-padding uk-child-width-1-2" uk-grid>
      <?php
        include("../modelos/funciones-paquetes.php");
        $paquetes_en_reserva = getPaquetesPorEstado("RESERVA");
        while ($row = mysqli_fetch_array($paquetes_en_reserva)) {
          ?>

          <div class="uk-card uk-card-default uk-card-body uk-width-1-2 " uk-card>
            <div class="uk-card-title">
              <?php echo $row["nombre_res"]; ?>
            </div>
            <div class="uk-card-body">
              <?php echo $row["semana"]; ?>
              <div class="uk-float-right">
                <?php echo "$".$row["precio_base"]; ?>
              </div>
              <div class="uk-card-footer">
                <a href="../vistas/detalle-paquete-user.php?id=<?php echo $row['id']; ?>">click aquí para mas info</a>
              </div>
            </div>
          </div>


          <?php
        }
      ?>
    </div>
</html>
