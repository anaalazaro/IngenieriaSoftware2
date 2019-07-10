<?php
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
	include("conexion.php");
	$conexion = conectar();
	$consulta = "SELECT * FROM paquete WHERE estado = '$estado'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}

function getPaquetePorId($id)
{
	include("conexion.php");
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
	include('../modelos/conexion.php');
	$conexion = conectar();
	$consulta = "SELECT * FROM paquete WHERE id_usuario = '$id_usuario'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}

function modificarPrecio($precio, $conexion, $id){
	$consulta="UPDATE paquete SET precio_base='$precio' WHERE id='$id'";
	$resultado=mysqli_query($conexion,$consulta);
	
}
function getPaquetePorId2($id,$conexion)
{
	$consulta = "SELECT * FROM paquete WHERE id = '$id'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}


?>
