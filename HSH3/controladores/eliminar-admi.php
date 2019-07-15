<?php
include('../modelos/conexion.php');
$conexion=conectar();

$elem= $_GET['id'];
if(empty($elem)){
	echo '<script>window.location="../vistas/pantalla-listar-administradores.php";</script>';}
else{
		$eliminar="DELETE FROM admin WHERE id='$elem'";
		$enviar2=mysqli_query($conexion,$eliminar);
		echo "<script language='javascript'>
				alert('El administrador se elimino!..');
				location.href= '../vistas/pantalla-listar-administradores.php' ;
				</script>";
		/*echo '<script>alert("La residencia ". $elem ." se ha eliminado correctamente")</script>';
		echo '<script>window.location="../eliminarResidencia.php";</script>';*/
	}





?>