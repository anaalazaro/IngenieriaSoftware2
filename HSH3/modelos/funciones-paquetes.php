<?php

function asignarPaquete($id_paquete,$id_usuario,$estado_anterior)
{
	include_once('../modelos/conexion.php');
	if ($estado_anterior) {
		$consulta="UPDATE paquete SET id_usuario='$id_usuario' WHERE id='$id_paquete'";
	}
	$conexion = conectar();
	$resultado = mysqli_query($conexion,$consulta);
}

function ponerEnHotsale($id,$precio)
{
	include_once('../modelos/conexion.php');
	$conexion = conectar();
	$consulta = "UPDATE paquete SET estado='HOTSALE',precio_base='$precio' WHERE id='$id'";
	$resultado = mysqli_query($conexion,$consulta);
	mysqli_close($conexion);
}

function ponerEnReserva($id,$id_user){
	include_once('../modelos/conexion.php');
	$conexion = conectar();
	$consulta = "UPDATE paquete SET estado='RESERVADO',id_usuario='$id_user' WHERE id='$id'";
	$resultado = mysqli_query($conexion,$consulta);
	mysqli_close($conexion);

}

function hayDatosPaquete($nombre, $semana){
	if((isset($nombre)) && !empty($nombre) &&  (isset($semana)) && !empty($semana)  ){
		return true;
	}else {
		return false;
	}
}

function existePaquete($id_paquete,$semana,$conexion){
	$existe= "SELECT * FROM paquete WHERE id_res='$id_paquete' AND semana='$semana'";
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
	include_once("conexion.php");
	$conexion = conectar();
	$consulta = "SELECT * FROM paquete WHERE estado = '$estado'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}

function getPaquetePorId($id)
{
	include_once("conexion.php");
	$conexion = conectar();
	$consulta = "SELECT * FROM paquete WHERE id = '$id'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}

function getPaquetesPorIdDeResidencia($id_res)
{
	$conexion = conectar();
	$consulta = "SELECT * FROM paquete WHERE id_res = '$id_res'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}

function getPaquetesPorIdUsuario($id_usuario)
{
	include_once('../modelos/conexion.php');
	$conexion = conectar();
	$consulta = "SELECT * FROM paquete WHERE id_usuario = '$id_usuario'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}

function modificarPrecio($precio, $conexion, $id){
	$consulta="UPDATE paquete SET precio_base='$precio' WHERE id='$id'";
	$resultado=mysqli_query($conexion,$consulta);
}

function modificarPaquete($id, $precio)
{
	include_once('../modelos/conexion.php');
	$conexion = conectar();
	$consulta = "UPDATE paquete SET precio_base='$precio' WHERE id='$id'";
	mysqli_query($conexion,$consulta);
	mysqli_close($conexion);
}

function getPaquetePorId2($id,$conexion)
{
	$consulta = "SELECT * FROM paquete WHERE id = '$id'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}


?>
