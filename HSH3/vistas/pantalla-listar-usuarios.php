<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listar Usuarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>

  </head>
  <body class="uk-height-viewport my-background-color  uk-padding">
    <?php
    include('../modelos/conexion.php');
    $conexion=conectar();
    $consulta= "SELECT * FROM usuario";
    $result=mysqli_query($conexion,$consulta);
    mysqli_close($conexion);
    ?>

    <div class="uk-padding-small">
      <a href="../vistas/home-admin.php" class="uk-button uk-button-primary">Volver</a>
    </div>

    <div class="uk-child-width-1-3 uk-padding" uk-grid>
      <?php while ($row = mysqli_fetch_array($result)) {
        if($row['mail']!== 'admin@hsh.com'){
        if ($row['premium']==1) {
          $tipo = '<div class="uk-card-badge uk-label">premium</div>';

        }else { if($row['premium']==0){
              $tipo = '<div class="uk-card-badge uk-label uk-" style="background-color:lightgrey;">basico</div>';
              }
              if ($row['premium']==2) {
                $tipo = '<div class="uk-card-badge uk-label uk-" style="background-color:lightgrey;"></div>es espera'; 
              }
        }

      
      ?>

      <div class="uk-card uk-card-small uk-card-default uk-border-rounded uk-padding">
        <?php echo $tipo; ?>

        <div class="uk-card-body">
          <h3 class="uk-card-title"><?php echo $row['apellido_usuario'].", ".$row['nombre_usuario']; ?></h3>
        </div>
        <div class="uk-card-footer">
          <?php echo $mail=$row['mail']; ?>
          <a href="<?php echo "../vistas/pantalla-detalle-usuario.php?id_usuario=".$row['id'];?>">
            <span class="uk-float-right" uk-icon="info"></span>
          </a>
        </div>
        
      </div>
    <?php }?>
      <?php } ?>
    </div>
  </body>
</html>
