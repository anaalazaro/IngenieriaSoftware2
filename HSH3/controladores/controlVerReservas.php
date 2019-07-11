<?php

  include("../modelos/conexion.php");
  $conexion = conectar();
  $id = $_GET['id'];
  echo "$id";

  $consulta = "SELECT premium FROM usuario WHERE id='$id'";
  $resultado = mysqli_query($conexion,$consulta);
  $row = mysqli_fetch_array($resultado);
  echo $row["premium"];
  if ($row["premium"]) {
    header("location: ../vistas/reservar-paquetes-user.php");
  }else {
    header("location: ../vistas/reservar-paquetes-user.php");
  }
 ?>
