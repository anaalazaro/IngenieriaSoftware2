<?php

function guardarResidencia($conexion, $consulta){
	return mysqli_query($conexion, $consulta);
}

function existe($nombre,$conexion){
	$existe= "SELECT * FROM residencia WHERE nombre='$nombre'";
	$resultado1= mysqli_query($conexion,$existe);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}

function hayDatos($nombre, $descripcion, $provincia, $ciudad, $nombre_imagen, $size_imagen){
	if((isset($nombre)) && !empty($nombre) &&  (isset($descripcion)) && !empty($descripcion) && (isset($provincia)) && !empty($provincia) && (isset($ciudad)) && !empty($ciudad) && (isset($nombre_imagen)) && ($size_imagen>0) ){
		return true;
	}else {
		return false;
	}
}

?>
