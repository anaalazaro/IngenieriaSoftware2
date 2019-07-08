<?php
include('conexion.php');

function existe($mail,$conexion){
	$existe= "SELECT * FROM usuario WHERE mail='$mail'";
	$resultado1= mysqli_query($conexion,$existe);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}

function getUsuario($conexion,$usuario)
{
	$consulta = "SELECT * FROM usuario WHERE mail='$usuario'";
	$ret = mysqli_fetch_array(mysqli_query($conexion, $consulta));
	return $ret;
}

function getUsuarioPorId($id)
{
	$conexion = conectar();
	$consulta = "SELECT * FROM usuario WHERE id = '$id'";
	$ret = mysqli_fetch_array(mysqli_query($conexion,$consulta));
	return $ret;
}

function setSolicitudDeBaja($id_usuario)
{
	$conexion = conectar();
	$consulta = "INSERT INTO solicitudes(id_usuario, tipo_solicitud) VALUES ('$id_usuario','BAJA')";
	$ret = mysqli_query($conexion,$consulta);
	mysqli_close($conexion);
	return $ret;
}

?>
