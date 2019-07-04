<?php
include('../modelos/conexion.php');

function setPrecioPremium($precio)
{
  $conexion=conectar();
  $consulta= "UPDATE precios SET premium='$precio' ";
  $result=mysqli_query($conexion,$consulta);
  mysqli_close($conexion);
}

function setPrecioBasico($precio)
{
  $conexion=conectar();
  $consulta= "UPDATE precios SET basico='$precio' ";
  $result=mysqli_query($conexion,$consulta);
  mysqli_close($conexion);
}

function getPrecioPremium()
{
  $conexion=conectar();
  $consulta= "SELECT premium FROM precios";
  $result=mysqli_fetch_array(mysqli_query($conexion,$consulta));
  return $result['premium'];
}

function getPrecioBasico()
{
  $conexion=conectar();
  $consulta= "SELECT basico FROM precios";
  $result=mysqli_fetch_array(mysqli_query($conexion,$consulta));
  mysqli_close($conexion);
  return $result['basico'];
}
 ?>
