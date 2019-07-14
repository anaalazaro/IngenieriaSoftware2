<?php

function setEstadoDePaquete($id_paquete,$estado)
{
	include_once('../modelos/conexion.php');
	$conexion = conectar();
	$consulta = "UPDATE paquete SET estado='$estado' WHERE id='$id_paquete'";
	$resultado = mysqli_query($conexion,$consulta);
	return $resultado;
}

function cancelarPaquete($id_paquete)
{
	include_once('../modelos/conexion.php');
	$consulta = "UPDATE paquete SET id_usuario='' WHERE id='$id_paquete'";
	$conexion = conectar();
	$resultado = mysqli_query($conexion,$consulta);
	$consulta2 = "UPDATE paquete SET estado='CADUCADO' WHERE id='$id_paquete'"; //lo pongo caducado para que los usuarios no puedan verlo hasta que se actualize su estado.
	$resultado2 = mysqli_query($conexion,$consulta2);
	return 1;
}

function asignarPaquete($id_paquete,$id_usuario,$estado_anterior)
{
	include_once('../modelos/conexion.php');
	$consulta = "UPDATE paquete SET id_usuario='$id_usuario' WHERE id='$id_paquete'";
	$conexion = conectar();
	$resultado = mysqli_query($conexion,$consulta);
	switch ($estado_anterior) {
		case 'HOTSALE':
			$consulta = "UPDATE paquete SET estado='LIQUIDADO' WHERE id='$id_paquete'";
			$resultado2 = mysqli_query($conexion,$consulta);
			break;
	}
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

function cerrarSubasta($id_paquete)
{
	include_once('../modelos/conexion.php');
	include_once('../modelos/funciones-usuarios.php');
	include_once('../modelos/funciones-pujas.php');
	$conexion = conectar();

	$pujas = getPujasPorIdDePaquete($id_paquete);
	$se_encontro_dueño = false;
	while ((!$se_encontro_dueño) AND ($puja=mysqli_fetch_array($pujas))) {
		$id_usuario_puja = $puja['id_usuario'];
		$id_paquete_puja = $puja['id_paquete'];
		if (getCreditos($id_usuario_puja)>0) {
			$query_subasta = "UPDATE paquete SET estado='SUBASTADO',id_usuario=$id_usuario_puja WHERE id=$id_paquete_puja";
			mysqli_query($conexion,$query_subasta);
			restarUnCredito($id_usuario_puja);
			$se_encontro_dueño = true;
		}
	}
	return $se_encontro_dueño;
}

function getPaquetePorId2($id,$conexion)
{
	$consulta = "SELECT * FROM paquete WHERE id = '$id'";
	$resultado = mysqli_query($conexion, $consulta);
	return $resultado;
}


?>
