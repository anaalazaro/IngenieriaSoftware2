<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="css/personal.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Cerrar Subasta</title>
  </head>
  <body class="uk-height-viewport my-background-color">
	<title>Crear Subasta</title>
	<div class="uk-position-center my-form-box">
	<form action="buscarSub.php" method="post" >
			<div class="">
            <p class="uk-text-lead">Cerrar Subasta</p>
			
          </div>
              <div class="uk-width-1-1 uk-padding-small">
                <input id="id"  name="id" type="number" min="1" class="uk-input" placeholder="id de subasta" required>
              </div>
			  <?php
              if(isset($_GET["fallo"]) && $_GET["fallo"] == "true")
              {
                echo "<div style='color:red'>No existe una subasta con ese nombre </div>";
              }
            ?>
			 <div class="uk-width-1-1 uk-padding-small">
                <input  name="listar" type="submit" value="buscar por id" onclick= "return confirmacion();"class="uk-width-1-1 uk-button uk-button-primary"></input>
              </div>
			  <div class="uk-width-1-1 uk-padding-small">
              <a class="uk-width-1-1 uk-button uk-button-primary" href="home.php">Cancelar</a>

          </div>
			
			 
			  
			  
          <!--  </form>
			<label>o</label
			<form action="listarDisp.php" method="post" >
			 <div class="uk-width-1-1 uk-padding-small">
                <input  name="listar" type="submit" value="listar subastas" onclick= "return confirmacion();"class="uk-width-1-1 uk-button uk-button-primary"></input>
              </div>-->
			  
			  
		
			</div>

  </body>
</html>
