<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="css/personal.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Eliminar Residencia</title>
  </head>
  <body class="uk-height-viewport my-background-color">
    <div class="uk-position-center my-form-box">

        <?php
          if(isset($_GET["found"]))
          {
            if ($_GET["found"] == "false") {
              echo '<form action="utils/eliminarResidencia.php" method="post">
                <h3 class="uk-padding">Eliminar residencia</h3>
                <div class="uk-width-1-1 uk-padding-small">
                  <input id="id-residencia"  name="id-residencia" type="text" class="uk-input" placeholder="ID de la Residencia" required>
                </div>
                <div style="color:red">ese ID no existe</div>
                <div class="uk-width-1-1 uk-padding-small">
                  <input  type="submit" value="buscar" class="uk-width-1-1 uk-button uk-button-primary"></input>
                </div>
              </form>';
            }
            if ($_GET["found"] == "true") {
              //codigo en html a devolver si se encontro la residencia (mostrar carta con foto e informacion de la residencia)
              //preguntar si esta seguro de eliminar la residencia
              echo '<form action="utils/eliminarResidencia.php" method="post">
                <h3 class="uk-padding">Esta seguro que desea eliminar esta residencia?</h3>
                <h4>Nombre de la residencia</h2>
                <h5>Ubicacion, Ubicacion</h5>
                <img src="" alt="">
                <input  type="submit" value="eliminar" class="uk-width-1-1 uk-button uk-button-primary"></input>
                <input  type="submit" value="cancelar" class="uk-width-1-1 uk-button uk-button-primary"></input>
              </form>';
            }
          } else {
            echo '<form action="utils/eliminarResidencia.php" method="post">
              <h3 class="uk-padding">Eliminar residencia</h3>
              <div class="uk-width-1-1 uk-padding-small">
                <input id="id-residencia"  name="id-residencia" type="text" class="uk-input" placeholder="ID de la Residencia" required>
              </div>
              <div class="uk-width-1-1 uk-padding-small">
                <input  type="submit" value="buscar" class="uk-width-1-1 uk-button uk-button-primary"></input>
              </div>
            </form>';
          }
        ?>

      </form>
    </div>

  </body>
</html>
