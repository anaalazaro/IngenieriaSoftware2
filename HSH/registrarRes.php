<?php
session_start();
include('conexion.php');
$conexion=conectar();
$nombre= $_POST['nombre'];
$descripcion=$_POST['descripcion'];
$ubicacion=$_POST['ubicacion'];
$nombre_imagen=$_FILES['foto']['name'];
$tip_imagen=$_FILES['foto']['type'];
$size_imagen=$_FILES['foto']['size'];
$imagen=$_FILES['foto']['tmp_name'];

function existe($nombre,$conexion){
	$existe= "SELECT * FROM residencia WHERE Nombre='$nombre'";
	$resultado1= mysqli_query($conexion,$existe);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}



if((isset($nombre)) && !empty($nombre) &&  (isset($descripcion)) && !empty($descripcion) && (isset($ubicacion)) && !empty($ubicacion) && (isset($nombre_imagen)) && ($size_imagen>0) ){

	$tipo= addslashes($tip_imagen);
	$exp_String="/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/";

	if ($tipo=="image/png" || $tipo=="image/jpg" || $tipo=="image/jpeg"  || $tipo=="image/bmp" || $tipo=="image/tif"){
		$archivo= fopen($imagen, "r");
		$contenido=fread($archivo, $size_imagen);//archivo en bytes
		$contenido=addslashes($contenido);
		fclose($archivo);
	}
	if (!preg_match($exp_String,$nombre)) { 
		echo '<script>window.location="pantalla-agregar-residencia.php";</script>';
	}
	if (strlen($nombre) > "35") {
		echo '<script>window.location="pantalla-agregar-residencia.php";</script>';
		}


		
		/*verifica que no exista el mismo nombre en la bd*/
		$verificar=existe($nombre,$conexion);
		if($verificar==0){
			$insertar= "INSERT INTO residencia(Nombre,Ubicacion,Descripcion,imagen, tipoimagen) VALUES ('$nombre','$descripcion', '$ubicacion','$contenido','$tipo')";

			//Ejecutar consulta
			$resultado= mysqli_query($conexion,$insertar);
			echo "<script language='javascript'>
				alert('Se registro residencia correctamente!..');
				location.href= 'home.php' ;
				</script>";
		}else{/* $_SESSION['mensaje']="Usted ya esta registrado";
			 header("Location:pantalla-agregar-residencia.php")*/
			 echo "<script language='javascript'>
				alert('No se registro residencia correctamente!..');
				location.href= 'home.php' ;
				</script>";}


}
else{
	echo '<script>window.location="pantalla-agregar-residencia.php";</script>';}
	


/*if (mysqli_affected_rows($conexion)>0) {
	echo "se realizo registro";

}else{
	echo "no se realizo registro";
}*/
mysqli_close($conexion);



?>
