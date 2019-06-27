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
$nombre_imagen=$_FILES['foto']['name'];
$size_imagen=$_FILES['foto']['size'];
$fechaN=$_POST['edad'];
$tip_imagen=$_FILES['foto']['type'];
$imagen=$_FILES['foto']['tmp_name'];


$tipo= addslashes($tip_imagen);
if ($tipo=="image/png" || $tipo=="image/jpg" || $tipo=="image/jpeg"  || $tipo=="image/bmp" || $tipo=="image/tif"){
$archivo= fopen($imagen, "r");
$contenido=fread($archivo, $size_imagen);//archivo en bytes
$contenido=addslashes($contenido);
fclose($archivo);
}		
$consulta="UPDATE usuario SET nombre_usuario='$nombre',apellido_usuario='$apellido',fecha_nacimiento='$fechaN',mail='$mail',contrasenia='$contrasenia',localidad='$localidad',direccion='$direccion',telefono='$telefono',tarjeta_numero='$tarjeta_numero', tarjeta_codigo='$tarjeta_codigo', tarjeta_vencimiento='$tarjeta_ven',imagen='$contenido',tipoimagen='$tip_imagen' WHERE mail='$mail'";

$resultado=mysqli_query($conexion,$consulta);
if($resultado){
	echo "<script language='javascript'>
		alert('Se han guardado los cambios!..');
		location.href= '../vistas/pantalla-perfil-usuario.php' ;
		</script>";
}

mysqli_close($conexion);
?>