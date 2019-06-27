<?php include('../controladores/controlBusqueda.php') ?>

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
                <li><a href="#">Mi Perfil</a></li>
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
    if (isset($_GET['id'])) {
      $resultado = buscarResidenciaPorId($_GET['id']);
      $residencia = mysqli_fetch_array($resultado);

      $contenido=$residencia["imagen"]
      ?>

      <div class="uk-padding-large uk-padding-remove-bottom">
        <div class="uk-card uk-card-default uk-border-rounded" uk-grid>
          <div class="uk-card-media-left uk-width-1-4">
            <img src='data:image/jpeg; base64, <?php echo base64_encode($contenido); ?>' alt="Aca va una imagen" />
          </div>
          <div class="uk-width-expand">
            <div class="uk-card-header">
              <h3><?php echo ucwords($residencia['nombre']); ?></h3>
            </div>
            <div class="uk-card-body">
              <?php echo "Descripción: ".$residencia['descripcion']; ?>
            </div>
            <div class="uk-card-footer">
              <?php  echo "Ubicación: ".ucwords($residencia['ciudad']).", ".ucwords($residencia['provincia']).", ".ucwords($residencia['pais']); ?>
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <a class="uk-width-1-1 uk-button " href="listar-residencias-user.php">Volver</a>

          </div>
          </div>
        </div>
        
      </div>

    <?php
    }
    ?>


  </body>
</html>
