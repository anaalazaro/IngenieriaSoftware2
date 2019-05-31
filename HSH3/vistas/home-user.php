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
            <li><a href="#"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
        </ul>
      </div>
      <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li><a href="#">cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

    <?php
    include("../modelos/conexion.php");
    $conexion=conectar();
    $consulta= "SELECT * FROM residencia";
    ?>
    <div class="uk-position-center my-form-box uk-padding">
      <ul class="uk-thumbnav uk-thumbnav-vertical" uk-margin>
        <li class="uk-active"><a href="#"><img src="" alt="img" width="100" alt=""></a></li>
      </ul>
    </div>

  </body>
</html>
