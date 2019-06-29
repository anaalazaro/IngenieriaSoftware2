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
