<?php
function hayDatos($nombre, $semana){
	if((isset($nombre)) && !empty($nombre) &&  (isset($semana)) && !empty($semana)  ){
		return true;
	}else {
		return false;
	}
}

function existe($nombre,$semana,$conexion){
	$existe= "SELECT * FROM paquete WHERE nombre_res='$nombre' AND semana='$semana'";
	$resultado1= mysqli_query($conexion,$existe);

	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}


function guardarPaquete($conexion, $consulta){
	return mysqli_query($conexion, $consulta);
}

function getPaquetesPorEstado($estado)
{
	include("conexion.php");
	$conexion = conectar();
	$consulta = "SELECT * FROM paquete WHERE estado = '$estado'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}



?>
