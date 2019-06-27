<?php
include('../modelos/conexion.php');
 $conexion=conectar();?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Agregar Residencia</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/personal.css" />
  <script src="../js/uikit.min.js"></script>
  <script src="../js/uikit-icons.min.js"></script>
  <script type="text/javascript" src="validar_agregar.js"></script>
</head>
  <body class="uk-height-viewport my-background-color">
<form action='pantalla-configurar-precios.php' method='post'>
  <div class="uk-width-1-1 uk-padding-small">
             <label>Nombre:</label>
            <input id="nombre"  name="nombre" type="text" class="uk-input" placeholder="Precio nuevo"  >
          </div>
</form>
<?php $precio=$_POST['nombre'];
    $consulta= "UPDATE precios SET basico='$precio' ";
    $result=mysqli_query($conexion,$consulta);



?>
