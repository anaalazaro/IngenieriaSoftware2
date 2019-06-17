<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Agregar Paquete</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/personal.css" />
  <script src="../js/uikit.min.js"></script>
  <script src="../js/uikit-icons.min.js"></script>
  
</head>
  <body class="uk-height-viewport my-background-color">

    <div class="uk-position-center my-form-box">
        <form action="../controladores/registrarPaquete.php" method="post" enctype="multipart/form-data" class="uk-form uk-padding-small" >
          <div class="">
            <p class="uk-text-lead">Agregando nuevo paquete</p>
          </div>

         
          <!--agregar nombre-->
          
		  <div class="uk-width-1-1 uk-padding-small">
              <div class="">
				<label>Residencia:</label>
                <select class="uk-button uk-button-default" name="nombre" required>
                  
                  <option></option>
				  <?php
				  include('../modelos/conexion.php');
                    $conexion=conectar();
                    $consulta="SELECT * FROM residencia";
                    $res=mysqli_query($conexion,$consulta);
                    mysqli_close($conexion);
                    while ($row = mysqli_fetch_array($res)){
                  ?>
                    <option >
                      <?php
                      echo $row['nombre'];
                      
                      ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
	
         <!-- calendario con seleccion desde el lunes siguiente-->
            <div class="uk-width-1-1 uk-padding-small">
              <label>Semana:
			  <?php $first = strtotime('last Monday +7 days'); ?>
			<input type="date" name="semana" step="7" min=<?php echo date('Y-m-d', $first);  ?> max="2021-12-31" value="<?php echo date("Y-m-d");?>">
			
			</label>
            </div>


			<div class="uk-width-1-1 uk-padding-small">
              <label>Precio base subasta:</label>
            <input id="precio_base" type="number" name="precio_base" min="0" class="uk-input" placeholder="precio_base" >
            </div>
           
          <!--boton de AGREGAR-->
          <div class="uk-width-1-1 uk-padding-small">
            <input  type="submit" value="agregar paquete" class="uk-width-1-1 uk-button uk-button-primary" input>
          </div>

          <!--boton de CANCELAR-->
          <div class="uk-width-1-1 uk-padding-small">
              <a class="uk-width-1-1 uk-button uk-button-primary" href="pantalla-listar-paquetes.php">Cancelar</a>

          </div>

        </form>
    </div>
  </body>
</html>
