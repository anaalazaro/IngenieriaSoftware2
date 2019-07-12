<?php
include('../modelos/conexion.php');
$conexion=conectar();

$elem= $_GET['nom_residencia'];
if(empty($elem)){
	echo '<script>window.location="../vistas/pantalla-eliminar-residencia.php";</script>';}
else{
	$buscar= "SELECT * FROM paquete WHERE id_res='$elem'";
	$enviar=mysqli_query($conexion,$buscar);
	$rows=mysqli_num_rows($enviar);
	$row = mysqli_fetch_array($enviar);
	if($row['estado']=='RESERVA' or $row['estado']=='ESPERA' $row['estado']=='SUBASTA'or $row['estado']=='RESERVADO'or$row['estado']=='SUBASTADO'or $row['estado']=='HOTSALE' or$row['estado']=='LIQUIDADO'){
	echo "<script language='javascript'>
				alert('La residencia  no puede ser eliminada porque esta en reserva o subasta!..');
				location.href= '../vistas/pantalla-listar-residencias.php' ;
				</script>";
		/*echo '<script>alert("La residencia ".$elem ."no existe")</script>';
		echo '<script> window.location="eliminarResidencia.php";</script>';*/
	}
	else{
		$eliminar="DELETE FROM residencia WHERE id='$elem'";
		$enviar2=mysqli_query($conexion,$eliminar);
		echo "<script language='javascript'>
				alert('La residencia  se elimino!..');
				location.href= '../vistas/pantalla-listar-residencias.php' ;
				</script>";
		/*echo '<script>alert("La residencia ". $elem ." se ha eliminado correctamente")</script>';
		echo '<script>window.location="../eliminarResidencia.php";</script>';*/
	}


}


?>
