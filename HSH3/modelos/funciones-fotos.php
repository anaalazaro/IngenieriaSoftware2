<?php

//EL SIGUIENTE CODIGO NO ANDA

function guardarFoto($conexion, $res_id, $files){
  if (is_uploaded_file($files["foto"]["tmp_name"])) {
    $info=getimagesize($_FILES["foto"]["tmp_name"]);
    $tipo = $files["foto"]["type"];
    $imagen = file_get_contents($files["foto"]["tmp_name"]);
    $consulta = "INSERT INTO foto(id_residencia, imagen, tipoimagen) VALUES ($res_id, $imagen, $tipo)";
    $res = mysqli_query($conexion, $consulta);
    return $res;
  }
}
?>
