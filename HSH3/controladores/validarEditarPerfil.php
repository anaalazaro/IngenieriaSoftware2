<?php
include('../modelos/conexion.php');
$conexion= conectar();
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$localidad=$_POST['localidad'];
$direccion=$_POST['direccion'];
$tarjeta_numero=$_POST['tarjeta_numero'];
$tarjeta_codigo=$_POST['tarjeta_codigo'];
$tarjeta_ven=$_POST['tarjeta_vencimiento'];
$mail=$_POST['mail'];
$contrasenia=$_POST['contrasenia'];
		
$consulta="UPDATE usuario SET nombre_usuario='$nombre',apellido_usuario='$apellido',mail='$mail',contrasenia='$contrasenia',localidad='$localidad',direccion='$direccion',telefono='$telefono',tarjeta_numero='$tarjeta_numero', tarjeta_codigo='$tarjeta_codigo', tarjeta_vencimiento='$tarjeta_ven' WHERE mail='$mail'";
$resultado=mysqli_query($conexion,$consulta);
if($resultado){
	echo "<script language='javascript'>
		alert('Se han guardado los cambios!..');
		location.href= '../vistas/editar-perfil.php' ;
		</script>";
}


mysqli_close($conexion);




/*$imagen=addslashes(file_get_contents($imagen)); levantar imagen*/



?>
