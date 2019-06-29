<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Detalle de Paquete</title>
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
            <li><a href="../vistas/home-admin.php"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
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
      include("../controladores/controlPaquetes.php");
      include("../controladores/controlResidencias.php");


      $id = $_GET['id_paquete'];
      $paquete = mysqli_fetch_array(getPaquetePorId($id));

      //include("../modelos/funciones-residencias.php");
      $residencia = getResidenciaPorID($paquete['id_res']);
     ?>

    <div class="uk-card uk-card-body uk-card-default">
      <h2 class="uk-card-title">
        <?php echo $residencia["nombre"]; ?>
      </h2>
      <?php echo $paquete["estado"]; ?>
      <?php echo $paquete["semana"]; ?>
      <?php echo $paquete["precio_base"]; ?>
    </div>

  </body>
</html>
