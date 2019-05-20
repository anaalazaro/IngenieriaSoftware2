<?php
include('../conexion.php');
$conexion=conectar();




$elem= $_GET['nom_residencia'];
if($elem==""){
	echo "mal";
	/*echo '<script>window.location="../eliminarResidencia.php";</script>';*/}
else{
	$buscar= "SELECT * FROM residencia WHERE Nombre=$nombre";
	$enviar=mysqli_query($conexion,$buscar);
	$rows= mysqli_num_rows($enviar);
	if($rows==0){
		echo '<div align="center" >No se encontro un resultado con </div>'; 
		echo $elem;
	}
	else{
		$eliminar="DELETE FROM residencia WHERE Nombre=$elem";
		$enviar2=mysqli_query($conexion,$eliminar);
		/*echo '<script>window.location="../eliminarResidencia.php";</script>';*/
	}


}


?>