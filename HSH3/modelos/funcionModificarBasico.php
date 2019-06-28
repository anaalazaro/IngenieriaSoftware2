<?php
  include('../modelos/conexion.php');
  $conexion=conectar();
  $precio=$_POST['nuevo-precio'];
  $consulta= "UPDATE precios SET basico='$precio' ";
  $result=mysqli_query($conexion,$consulta);
  header("location: ../vistas/pantalla-configurar-precios.php");
?>
