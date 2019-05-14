<?php
include('conexion.php');
$conexion=conectar();
$nombre= $_POST['nombre'];
$descripcion=$_POST['descripcion'];
$ubicacion=$_POST['ubicacion'];
$nombre_imagen=$_FILES['foto']['name'];
$tip_imagen=$_FILES['foto']['type'];
$size_imagen=$_FILES['foto']['size'];



if((isset($nombre)) && !empty($nombre) &&  (isset($descripcion)) && !empty($descripcion) && (isset($ubicacion)) && !empty($ubicacion) && (isset($nombre_imagen)) && ($size_imagen>0) ){

	$tipo= addcslashes($tip_imagen);
	if ($tipo=="image/png" || $tipo=="image/jpg" || $tipo=="image/jpeg"  || $tipo=="image/bmp" || $tipo=="image/tif"){
		$imagen= addcslashes(file_get_contents($_FILES['foto']['tmp_name']));
		$archivo= fopen(($_FILES['foto']['tmp_name']), "r");
		$contenido=fread($archivo, $size_imagen);//archivo en bytes
		$contenido=addcslashes($contenido);
		fclose($archivo);

		$insertar= "INSERT INTO residencia(Nombre,Ubicacion,Descripcion,imagen, tipoimagen) VALUES ('$nombre','$descripcion', '$ubicacion','$contenido','$tipo')";

		//Ejecutar consulta
		$resultado= mysqli_query($conexion,$insertar);

	} else {
		echo "Elarchivo no es imagen";
		}
}else{
	echo "Complete los campos";

}
/*if (mysqli_affected_rows($conexion)>0) {
	echo "se realizo registro";

}else{
	echo "no se realizo registro";
}*/
if(!$resultado){
		echo 'Error ';
	}else{
		echo 'bien hecho';}


mysqli_close($conexion);







?>
