<?php
include("../modelos/funciones-residencias.php");
include('../modelos/conexion.php');
$conexion=conectar();

$nombre= ($_GET['nom_residencia']);
/*if(empty($elem)){
	echo "mal";
	/*echo '<script>window.location="../eliminarResidencia.php";</script>';*/

	$verificar=existeResidencia($nombre,$conexion);
    if($verificar==0){

       echo "<script language='javascript'>
        alert('La residencia a modificar no existe..');
        location.href= '../vistas/modificarResidencia.php' ;
        </script>";}
    else{
   $mostrar= getResidencia($conexion,$nombre);
  $contenido=$mostrar["imagen"];}




?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <title>Modificar Residencia</title>
  </head>  <body class="uk-height-viewport my-background-color">

    <div class="uk-position-center my-form-box">
        <form action="../controladores/validarModificar.php" method="post" enctype="multipart/form-data" class="uk-form uk-padding-small" >
          <div class="">
            <p class="uk-text-lead">Modificar residencia</p>
          </div>

          <!--Agregar una foto -->
          <div class="uk-width-1-1 uk-padding-small">
             <label for="foto">
              Imagen:</label>
              <img src='data:image/jpeg; base64, <?php echo base64_encode($contenido); ?>' alt="Aca va una imagen" width="25%"/>

            <input id="foto" name="foto" type="file" size="20" accept="image/*" class="uk-input" >
          <!--<button  class="uk-width-1-1 uk-button uk-button-default" type="button" tabindex="-1">Seleccionar Fotos</button>-->
           </div>

          <!--agregar nombre-->
          <div class="uk-width-1-1 uk-padding-small">
            <label>Nombre:</label>
            <input id="nombre"  name="nombre" type="text" class="uk-input" placeholder="Nombre de la Residencia"  value="<?php echo $mostrar['nombre']; ?>"  >
          </div> <!--necesito que no se pueda modificar el dato-->

          <!--agregar ubicacion-->
          <div class="uk-child-width-expand@s uk-padding-small" uk-grid>

            <!--
              <div class="uk-width-1-3">
              <input id="pais" type="text" name="pais" class="uk-input" placeholder="Pais"  required>
            </div>-->
            <div class="uk-width-1-3">
              <label>Pais:</label>
              <select id="pais"  class="uk-input" name="pais">
                <option value="<?php echo $mostrar['pais']; ?>"><?php echo $mostrar['pais']; ?></option>
                <!--<option value="argentina" >Argentina</option>
                <option value="brasil">Brasil</option>
                <option value="chile">Chile</option>
                <option value="mexico">Mexico</option>-->
              </select>
            </div>

            <!-- agregar provincia--->
             <div class="uk-width-1-3">
              <label>Provincia:</label>
              <input id="provincia" type="text" name="provincia" class="uk-input" placeholder="Provincia" value="<?php echo $mostrar['provincia']; ?>">
            </div>

          <!-- agregar direccion-->
            <div class="uk-width-1-3">
              <label>Dirección:</label>
              <input id="direccion" type="text" name="direccion" class="uk-input" placeholder="Direccion" value="<?php echo $mostrar['ciudad']; ?>" >
            </div>


          </div>
          <!--agregar descripcion-->
          <div class="uk-width-1-1 uk-padding-small">
            <label>Descripción:</label>
            <input id="descripcion" name="descripcion" type="text" class="uk-input" placeholder="Breve Descripcion"   value="<?php echo $mostrar['descripcion']; ?>" >
          </div>

          <!--boton de AGREGAR-->
          <div class="uk-width-1-1 uk-padding-small">
            <input  type="submit" value="Modificar residencia" class="uk-width-1-1 uk-button uk-button-primary" onclick="modificarResidencia();"></input>
          </div>

          <!--boton de CANCELAR-->
          <div class="uk-width-1-1 uk-padding-small">
              <a class="uk-width-1-1 uk-button uk-button-primary" href="../vistas/pantalla-listar-residencias.php">Cancelar</a>

          </div>

        </form>
         <script type="text/javascript" src="validar_mod.js"></script>
    </div>


  </body>
</html>
