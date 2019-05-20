<?php
    include('conexion.php');
	$conexion=conectar();

    $idimagen=$_POST['id'];
	//-----------------------
	 $consulta="SELECT imagen,tipoimagen
	 		FROM residencia
	 		WHERE id='$idimagen'";
	

	$resultado = mysqli_query($conexion, $consulta);
	$row = mysqli_fetch_array($resultado);
	mysqli_close($conexion);

	header("Content-type: ". $row['tipoimagen']);
	echo $row['contenidoimagen'];

?>
