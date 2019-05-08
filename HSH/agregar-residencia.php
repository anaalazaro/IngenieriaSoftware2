<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Agregar Residencia</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/uikit.min.css" />
  <link rel="stylesheet" type="text/css" href="css/personal.css" />
  <script src="js/uikit.min.js"></script>
  <script src="js/uikit-icons.min.js"></script>
</head>
  <body class="uk-height-viewport my-background-color">

    <div class="uk-position-center my-form-box">
        <form action="utils/agregarResidencia.php" class="uk-form uk-padding-small">
          <div class="">
            <p class="uk-text-lead">Agregando nueva residencia</p>
          </div>
          <div uk-form-custom class="">
            <input type="file" multiple="true">
            <button class="uk-width-1-1 uk-button uk-button-default" type="button" tabindex="-1">Seleccionar Fotos</button>
          </div>
          <div class="uk-width-1-1 uk-padding-small">
            <input type="text" class="uk-input" placeholder="Nombre de la Residencia" required>
          </div>
          <div class="uk-width-1-1 uk-padding-small">
            <input type="text" class="uk-input" placeholder="Breve Descripcion" required>
          </div>
          <div class="uk-width-1-1 uk-padding-small">
            <input type="submit" value="agregar residencia" class="uk-width-1-1 uk-button uk-button-primary"></input>
          </div>
        </form>
    </div>

  </body>
</html>
