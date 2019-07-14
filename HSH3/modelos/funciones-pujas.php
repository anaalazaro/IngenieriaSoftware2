<?php



function registrarPuja($id_paquete,$id_usuario,$monto)
{
  $conexion = conectar();
  $fecha_obj = new DateTime('now');
  $fecha_str = $fecha_obj->format('Y-m-d H:i:s');
  $consulta = "INSERT INTO pujas (id_paquete,id_usuario,monto,fecha) VALUES ('$id_paquete','$id_usuario','$monto','$fecha_str')";
  $result = mysqli_query($conexion,$consulta);
}

function existenPujasDe($id_paquete)
{
  $conexion = conectar();
  $consulta = "SELECT COUNT(*) AS cantidad FROM pujas WHERE id_paquete='$id_paquete'";
  $result = mysqli_query($conexion,$consulta);
  $pujas = $result->fetch_assoc();
  return $pujas['cantidad'];
}

function getPujasPorIdDePaquete($id_paquete)
{
  include_once('../modelos/conexion.php');
  $conexion = conectar();
  $consulta = "SELECT * FROM pujas WHERE id_paquete='$id_paquete' ORDER BY monto DESC";
  $result = mysqli_query($conexion,$consulta);
  mysqli_close($conexion);
  return $result;
}

function getMejorPuja($id_paquete)
{
  include_once('../modelos/conexion.php');
  $conexion = conectar();
  $consulta = "SELECT MAX(monto) AS puja FROM pujas WHERE id_paquete='$id_paquete'";
  $result = mysqli_fetch_assoc(mysqli_query($conexion,$consulta));
  mysqli_close($conexion);
  return $result['puja'];
}
 ?>
