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
      include("../controladores/controlPaquetes.php");
      include("../controladores/controlResidencias.php");


      $id = $_GET['id_paquete'];
      $paquete = mysqli_fetch_array(getPaquetePorId($id));

      //include("../modelos/funciones-residencias.php");
      $residencia = getResidenciaPorID($paquete['id_res']);
      $color = "grey";
      $ocultar_boton_hotsale = "hidden";
      switch ($paquete['estado']) {
        case 'FINALIZADO':
          if(($paquete['id_usuario'])>0) {
            $ocultar_boton_hotsale="hidden";
          }else {
            $ocultar_boton_hotsale="";
          }
          $color = "red";
          break;
        case 'SUBASTA':
          $color = "orange";
          break;
        case 'ACTIVO':
          $color = "green";
          break;
        case 'ADQUIRIDO':
          $color = "black";
          break;
      }
     ?>

    <div class="uk-card uk-card-body uk-card-default">
      <div class="uk-card-title" uk-grid>
        <img class="uk-border-rounded uk-width-1-4" data-src="data:image/jpeg; base64, <?php echo base64_encode($residencia['imagen']); ?>" width="180" height="120" alt="" uk-img>
        <div class="uk-width-1-2">
          <h1 class="">
            <?php echo $residencia["nombre"]; ?>
          </h1>
          <h4>
            <?php echo "Semana del paquete: ".$paquete["semana"]; ?>
          </h4>
        </div>
        <div class="uk-float-right">
          <h1 class=""><?php echo "$".$paquete["precio_base"]; ?></h1>

        </div>
      </div>
      <div class="uk-card-badge">
        <span class="uk-badge uk-border-rounded" style="background-color:<?php echo $color; ?>"><?php echo $paquete['estado'];?></span>
      </div>
      <div class="uk-card-footer uk-float-right">
        <button type="button" name="button" class="uk-button uk-button-primary uk-border-rounded">editar</button>
        <button type="button" name="button" class="uk-button uk-border-rounded" <?php echo $ocultar_boton_hotsale;?>>poner en hotsale</button>
      </div>
    </div>

  </body>
</html>
