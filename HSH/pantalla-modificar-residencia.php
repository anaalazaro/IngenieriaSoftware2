<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="css/personal.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Modificar Residencia</title>
  </head>
  <body class="uk-height-viewport my-background-color">
    <div class="uk-position-center my-form-box">


      <?php
        if(isset($_GET["found"]))
        {
          if ($_GET["found"] == "false") {
            echo '<h3 class="uk-padding">Modificar residencia</h3>
            <form action="utils/buscarPorId.php" method="post">
              <div class="uk-width-1-1 uk-padding-small">
                <input id="id-residencia"  name="id-residencia" type="text" class="uk-input" placeholder="ID de la Residencia" required>
              </div>
              <div style="color:red">ese ID no existe</div>
              <div class="uk-width-1-1 uk-padding-small">
                <input  name="buscar-para-modificar" type="submit" value="buscar" class="uk-width-1-1 uk-button uk-button-primary"></input>
              </div>
            </form>';
          }
          if ($_GET["found"] == "true") {
            echo '<form action="utils/modificarResidencia.php" method="post">
              <h3 class="uk-padding">Esta seguro que desea eliminar esta residencia?</h3>
              <h4>Nombre de la residencia</h2>
              <h5>Ubicacion, Ubicacion</h5>
              <img rc="" alt="">
              <div class="uk-width-1-1 uk-padding-small">
                <input  name="modificar-definitivamente" type="submit" value="modificar" class="uk-width-1-1 uk-button uk-button-primary"></input>
              </div>
              <div class="uk-width-1-1 uk-padding-small">
                <input  name="cancelar-modificacion" type="submit" value="cancelar" class="uk-width-1-1 uk-button uk-button-primary"></input>
              </div>
            </form>';
          }
        } elseif (isset($_GET["modificacion-confirmada"])) {
          //html para campos de modificacion de residencia
          echo '<form action="utils/guardarModificacionResidencia.php" method="post">
            <h3 class="uk-padding">Modificando residencia</h3>
            <h4>Nombre de la residencia</h2>
            <h5>Ubicacion, Ubicacion</h5>
            <img rc="" alt="">
            <div class="uk-width-1-1 uk-padding-small">
              <input  name="modificacion-finalizada" type="submit" value="listo" class="uk-width-1-1 uk-button uk-button-primary"></input>
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input  name="cancelar-modificacion" type="submit" value="cancelar" class="uk-width-1-1 uk-button uk-button-primary"></input>
            </div>
          </form>';
        }else {
          echo '<h3 class="uk-padding">Modificar residencia</h3>
          <form action="utils/buscarPorId.php" method="post">
            <div class="uk-width-1-1 uk-padding-small">
              <input id="id-residencia"  name="id-residencia" type="text" class="uk-input" placeholder="ID de la Residencia" required>
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input  name="buscar-para-modificar" type="submit" value="buscar" class="uk-width-1-1 uk-button uk-button-primary"></input>
            </div>
          </form>';
        }
      ?>
  </body>
</html>
