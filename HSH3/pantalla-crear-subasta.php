<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="css/personal.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
   
  </head>
  <body class="uk-height-viewport my-background-color">
 <title>Crear Subasta</title>
	<div class="uk-position-center my-form-box">
	<form action="buscarm.php" method="post" onSubmit="return checkFrm(this);">
			<div class="">
            <p class="uk-text-lead">Nueva Subasta</p>
          </div>
              <div class="uk-width-1-1 uk-padding-small">
                <input id="nombre"  name="nombre" type="text" class="uk-input" placeholder="nombre de la residencia" required>
              </div>
			  <?php
              if(isset($_GET["fallo"]) && $_GET["fallo"] == "true")
              {
                echo "<div style='color:red'>No existe una residencia con ese nombre </div>";
              }
            ?>
			  
			  <!--muestra calendario, step cada cuantos dias puedo seleccionar fecha, el min es el valor minimo. no deja subir el from si es menor-->
			  
              <div class="uk-width-1-1 uk-padding-small">
            
              <input id="precio_piso" type="number" name="precio_piso" class="uk-input" placeholder="precio base" min="0" required>
            </div>
			<div class="uk-width-1-1 uk-padding-small">
			<label>Semana
			<input type="date" name="semana" step="7" min="2019-05-13" max="2019-12-31" value="<?php echo date("Y-m-d");?>">
			</label></div>
			
			  <div class="uk-width-1-1 uk-padding-small">
                <input  name="buscar" type="submit" value="agregar" onclick= "return confirmacion();"class="uk-width-1-1 uk-button uk-button-primary"></input>
              </div>
			  
			  <div class="uk-width-1-1 uk-padding-small">
              <a class="uk-width-1-1 uk-button uk-button-primary" href="home.php">Cancelar</a>

          </div>
            </form>';
			</div>

  </body>
</html>
