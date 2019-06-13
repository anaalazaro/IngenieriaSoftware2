<?php
include('../modelos/conexion.php');

function existe($mail,$conexion){
	$existe= "SELECT * FROM usuario WHERE mail='$mail'";
	$resultado1= mysqli_query($conexion,$existe);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}

function getUsuarioPorId($id)
{
	$conexion = conectar();
	$consulta = "SELECT * FROM usuario WHERE id = '$id'";
	$ret = mysqli_fetch_array(mysqli_query($conexion,$consulta));
	return $ret;
}

?>
