<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Confirmar Hotsale?</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">
    <nav class="uk-navbar-container" style="background-color:white" uk-navbar>
      <div class="uk-navbar-left uk-padding-small">
        <a href="javascript:history.back()" class="uk-button uk-button-primary uk-border-rounded">Volver atras</a>
      </div>
      <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">
            <li><a href="../vistas/home-admin.php"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
        </ul>
      </div>
    </nav>

    <?php

    include('../modelos/funciones-paquetes.php');
    include('../modelos/funciones-residencias.php');
    $paquete = mysqli_fetch_array(getPaquetePorId($_GET['id']));
    $residencia = getResidenciaPorID($paquete['id_res']);
     ?>

    <div class="uk-position-center">
      <div class="uk-tile uk-tile-default uk-border-rounded">
        <div class="uk-width-1-1">
          <h2>Esta seguro que quiere poner el siguiente paquete en hotsale?</h2>
        </div>
        <div class="uk-child-width-1-2" uk-grid>
          <div class="">
            <h3><?php echo "ID del paquete: ".$paquete['id']; ?></h3>
            <h3><?php echo "Semana: ".$paquete['semana']; ?></h3>
            <h3><?php echo "Residencia: ".$residencia['nombre']; ?></h3>
          </div>
          <div class="">
            <h3>Ingrese un precio de Hotsale</h3>
            <form id="form-precio" action="../controladores/controlHotsale.php?id=<?php echo $paquete['id']; ?>" method="post">
              <input type="number" name="precio" value="precio" class="uk-input" required>
            </form>
          </div>
        </div>
        <div class="uk-child-width-1-2 uk-margin" uk-grid>
          <a href="javascript: window.history.back()" class="uk-button uk-button-primary" style="background-color:grey;">
            Cancelar y volver atras
          </a>
          <?php $ruta="../controladores/controlHotsale.php?id=".$paquete['id'];?>
          <button type="submit" name="" form="form-precio" class="uk-button uk-button-danger" style="background-color:red">
            Confirmar hotsale
          </button>
        </div>

      </div>
    </div>

  </body>
</html>
