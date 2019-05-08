<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Inicio con codigo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="css/personal.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">

    <!--COMIENZO box de login con codigo-->
    <div class="">
      <div class="uk-position-center my-form-box">
          <form action="utils/validarCodigo.php" method="get" class="uk-form uk-padding-small"> <!--comienzo de formulario-->
            <div class="">
              <p class="uk-text-lead">Ingrese su codigo de acceso</p>
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="text" name="codigo" class="uk-input uk-form-large" required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="submit" value="ingresar" class="uk-width-1-1 uk-button uk-button-default"></input>
            </div>
          </form> <!--fin de formulario-->
      </div>
      <!--FIN box de login con codigo-->
    </div>

  </body>
</html>
