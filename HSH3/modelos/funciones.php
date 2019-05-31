<?php

function existe($nombre,$conexion){
	$existe= "SELECT * FROM residencia WHERE nombre='$nombre'";
	$resultado1= mysqli_query($conexion,$existe);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}

function subir_fichero($directorio_destino, $nombre_fichero)
{
    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
    //si hemos enviado un directorio que existe realmente y hemos subido el archivo
    if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
    {
        $img_file = $_FILES[$nombre_fichero]['name'];
        $img_type = $_FILES[$nombre_fichero]['type'];
        echo 1;
        // Si se trata de una imagen
        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type, "jpg")) || strpos($img_type, "png")))
        {
            //¿Tenemos permisos para subir la imágen?
            echo 2;
            if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
            {
                return true;
            }
        }
    }
    //Si llegamos hasta aquí es que algo ha fallado
    return false;
}

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
