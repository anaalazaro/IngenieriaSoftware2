<?php
include_once('conexion.php');

function getCreditos($id_usuario)
{
	$conexion = conectar();
	$consulta = "SELECT creditos FROM usuario WHERE id = '$id_usuario'";
	$result = mysqli_fetch_assoc(mysqli_query($conexion,$consulta));
	mysqli_close($conexion);
	return $result['creditos'];
}

function tieneTarjetaValida($id_usuario)
{
	$conexion = conectar();
	$consulta = "SELECT tarjeta_numero,tarjeta_codigo,tarjeta_vencimiento FROM usuario WHERE id='$id_usuario'";
	$resultado = mysqli_fetch_assoc(mysqli_query($conexion,$consulta));
	mysqli_close($conexion);
	include_once('../modelos/get_format.php');
	$fecha_actual = new DateTime('now');
	$fecha_vencimiento = new DateTime($resultado['tarjeta_vencimiento']);
	if ($fecha_actual>$fecha_vencimiento) {
		return false;
	}else {
		return true;
	}
}

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
