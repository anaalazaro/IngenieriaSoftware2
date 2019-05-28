<?php
include('../modelos/conexion.php');
$conexion=conectar();

$elem= $_POST['nom_residencia'];
if(empty($elem)){
	echo '<script>window.location="../vistas/pantalla-eliminar-residencia.php";</script>';}
else{
	$buscar= "SELECT * FROM residencia WHERE Nombre='$elem'";
	$enviar=mysqli_query($conexion,$buscar);
	$rows=mysqli_num_rows($enviar);
	if($rows==0){
	echo "<script language='javascript'>
				alert('La residencia  no existe!..');
				location.href= '../vistas/pantalla-eliminar-residencia.php' ;
				</script>";
		/*echo '<script>alert("La residencia ".$elem ."no existe")</script>';
		echo '<script> window.location="eliminarResidencia.php";</script>';*/
	}
	else{
		$eliminar="DELETE FROM residencia WHERE Nombre='$elem'";
		$enviar2=mysqli_query($conexion,$eliminar);
		echo "<script language='javascript'>
				alert('La residencia  se elimino!..');
				location.href= '../vistas/pantalla-eliminar-residencia.php' ;
				</script>";
		/*echo '<script>alert("La residencia ". $elem ." se ha eliminado correctamente")</script>';
		echo '<script>window.location="../eliminarResidencia.php";</script>';*/
	}


}


?>
