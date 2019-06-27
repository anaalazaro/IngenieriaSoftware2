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
                <li class="uk-nav-header">UsuarioAdmin</li>
                <li class="uk-nav-header">Sesión</li>
                <li><a href="../modelos/cerrar-sesion.php">Cerrar Sesión</a></li>
              </ul>
            </div>
        </ul>
      </div>
    </nav>

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
          if($usuario['premium']==3){
           $estado = "<span class='uk-badge uk-label' style='background-color:lightgrey;'>Premium</span>"; //premium esperando a que le den de baja
          }
    }
    }
     ?>
     <?php $contenido=$usuario['imagen']?>

    <div class="uk-child-width-1-1 uk-padding" uk-grid>
      <div class="uk-card-large uk-card-default uk-padding uk-border-rounded" uk-card>
        <div class="uk-card-body">
          <ul class="uk-list uk-list-divider">
            <li><img src='data:image/jpeg; base64, <?php echo base64_encode($contenido); ?>'class="uk-card-media-left " alt="Aca va una imagen" with='20%' /></li> 
            <li><?php echo $usuario['id']; ?></li>
            <li><?php echo $usuario['nombre_usuario']; ?></li>
            <li><?php echo $usuario['apellido_usuario']; ?></li>
            <li><?php echo $usuario['localidad']. ",".$usuario['direccion']?></li>
            <li><?php echo $mail= $usuario['mail']; ?></li>
            <li><?php echo $estado; ?></li>
            <?php if($usuario['premium']==2){?>
            <li><?php echo "<a href='../controladores/aceptarPremium.php?mail=$mail' class=' uk-button-primary' > Aceptar Premium</a>";?></li>
            <?php }?>
            <?php if ($usuario['premium']==3) {?>
            <li><?php echo "<a href='../controladores/aceptarPremium.php?mail=$mail' class=' uk-button-primary' > Deshabilitar Premium</a>";?></li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>

  </body>
</html>
