<?php
include('conexion.php');
$conexion=conectar();
$nombre= $_POST['nombre'];
$descripcion=$_POST['descripcion'];
$pais=$_POST['pais'];
$provincia=$_POST['provincia'];
$ciudad=$_POST['direccion'];
$nombre_imagen=$_FILES['foto']['name'];
$tip_imagen=$_FILES['foto']['type'];
$size_imagen=$_FILES['foto']['size'];
$imagen=$_FILES['foto']['tmp_name'];


$tipo= addslashes($tip_imagen);
	$exp_String="/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/";

	if ($tipo=="image/png" || $tipo=="image/jpg" || $tipo=="image/jpeg"  || $tipo=="image/bmp" || $tipo=="image/tif"){
		$archivo= fopen($imagen, "r");
		$contenido=fread($archivo, $size_imagen);//archivo en bytes
		$contenido=addslashes($contenido);
		fclose($archivo);


		$insertar= "INSERT INTO residencia(nombre,pais,provincia,ciudad,descripcion,imagen, tipoimagen) VALUES ('$nombre','$pais','$provincia','$ciudad','$descripcion','$contenido','$tipo')";

			//Ejecutar consulta
			$resultado= mysqli_query($conexion,$insertar);

	}

mysqli_close($conexion);
?>