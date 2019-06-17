<?php include('../modelos/funciones-usuarios.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detalle Usuario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>

  </head>
  <body class="uk-height-viewport my-background-color">

    <div class="uk-padding-small">
      <a href="../vistas/pantalla-listar-usuarios.php" class="uk-button uk-button-primary">Volver</a>
    </div>

    <?php
    if (isset($_GET['id_usuario'])) {
      $usuario = getUsuarioPorId($_GET['id_usuario']);
      if($usuario['premium']==1){
        $estado = "<span class='uk-badge uk-label'>Premium</span>";
      }else {
          if ($usuario['premium']==0) {
          $estado = "<span class='uk-badge uk-label' style='background-color:lightgrey;'>basico</span>";
           }
          if ($usuario['premium']==2) {
            $estado = "<span class='uk-badge uk-label' style='background-color:lightgrey;'>en espera</span>";
          }
    }
    }
     ?>

    <div class="uk-child-width-1-1 uk-padding" uk-grid>
      <div class="uk-card-large uk-card-default uk-padding uk-border-rounded" uk-card>
        <div class="uk-card-body">
          <ul class="uk-list uk-list-divider">
            <li><?php echo $usuario['id']; ?></li>
            <li><?php echo $usuario['nombre_usuario']; ?></li>
            <li><?php echo $usuario['apellido_usuario']; ?></li>
            <li><?php echo $mail= $usuario['mail']; ?></li>
            <li><?php echo $estado ?></li>
            <li><?php echo "<a href='../controladores/aceptarPremium.php?mail=$mail'> Aceptar Premium</a>";?></li>
          </ul>

        </div>
      </div>
    </div>

  </body>
</html>
