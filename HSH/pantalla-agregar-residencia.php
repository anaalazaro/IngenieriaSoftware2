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
        <form action="registarRes.php" method="post" enctype="multipart/form-data" class="uk-form uk-padding-small" >
          <div class="">
            <p class="uk-text-lead">Agregando nueva residencia</p>
          </div>
          <div class="uk-width-1-1 uk-padding-small">
            <label for="foto">
              Imagenes:
            <input id="foto" name="foto" type="file" size="20" accept="image/*" class="uk-input" >
          <!--<button  class="uk-width-1-1 uk-button uk-button-default" type="button" tabindex="-1">Seleccionar Fotos</button>-->
            </label>
          </div>
          <div class="uk-width-1-1 uk-padding-small">
            <input id="nombre"  name="nombre" type="text" class="uk-input" placeholder="Nombre de la Residencia" >
          </div>
          <div class="uk-width-1-1 uk-padding-small">
            <input id="ubicacion"type="text" name="ubicacion" class="uk-input" placeholder="Ubicacion" >
          </div>
          <div class="uk-width-1-1 uk-padding-small">
            <input id="descripcion" name="descripcion" type="text" class="uk-input" placeholder="Breve Descripcion"  >
          </div>
          <div class="uk-width-1-1 uk-padding-small">
            <input  type="submit" value="agregar residencia" class="uk-width-1-1 uk-button uk-button-primary"></input>
          </div>
          <div class="uk-width-1-1 uk-padding-small">
            <input type="submit" value="cancelar" class="uk-width-1-1 uk-button uk-button-primary" > 
          </div>
        </form>
    </div>
  <script type="text/javascript" src="validar_agregar.js"></script>

  </body>
</html>
