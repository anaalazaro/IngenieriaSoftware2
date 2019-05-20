<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="css/personal.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Modificar Residencia</title>
    <script type="text/javascript" src="validar_mod.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">
    <div class="uk-position-center my-form-box">

 '<form action="modificarRes.php" method="post" class="uk-form uk-padding-small">
     <h3 class="uk-padding">Modificar Residencia</h3>

      <div class="uk-width-1-1 uk-padding-small">
      <input id="nom_residencia"  name="nom_residencia" type="text" class="uk-input" placeholder="Nombre  de la Residencia" >
       </div>
      <!--- <div style="color:red">ese Nombre no existe</div>-->
       <div class="uk-width-1-1 uk-padding-small">
      <input  name="buscar-para-modificar" type="submit" value="buscar" class="uk-width-1-1 uk-button uk-button-primary" onclick="return validaMod()"></input>
        </div  >
      <div class="uk-width-1-1 uk-padding-small">
        <a class="uk-width-1-1 uk-button uk-button-primary" href="home.php">Cancelar</a>
      </div>
  </div>
  </form>
  </body>
</html>