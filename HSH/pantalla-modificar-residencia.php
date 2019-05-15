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

      <h3 class="uk-padding">Modificar residencia</h3>

      <form action="utils/buscarPorId.php" method="post">

        <div class="uk-width-1-1 uk-padding-small">
          <input id="id-residencia"  name="id-residencia" type="text" class="uk-input" placeholder="ID de la Residencia" required>
        </div>

        <?php
          if(isset($_GET["found"]))
          {
            if ($_GET["found"] == "false") {
              echo "<div style='color:red'>ese ID no existe</div>";
            }
            if ($_GET["found"] == "true") {
              //codigo en html a devolver si se encontro la residencia (mostrar carta con foto e informacion de la residencia)
            }
          }
        ?>

        <div class="uk-width-1-1 uk-padding-small">
          <input  name="buscar-para-modificar" type="submit" value="buscar" class="uk-width-1-1 uk-button uk-button-primary"></input>
        </div>
      </form>
    </div>

  </body>
</html>
