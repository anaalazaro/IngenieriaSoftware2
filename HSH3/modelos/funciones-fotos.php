<?php

//EL SIGUIENTE CODIGO NO ANDA

function guardarFoto($conexion, $id_residencia, $imagen, $tipo){
  $insertar = "INSERT into foto (id_residencia, imagen, tipoimagen) VALUES ('$id_residencia, $imagen, $tipo')";

  $resultado = mysqli_query($conexion, $insertar);

  if($resultado){
    echo "Archivo Subido Correctamente.";
  }else{
    echo "Ha fallado la subida, reintente nuevamente.";
  }
}
?>
