<?php
include("../modelos/funciones-fotos.php");
include("../modelos/funciones-residencias.php");
include('../modelos/conexion.php');
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

/*
function existe($nombre,$conexion){
	$existe= "SELECT * FROM residencia WHERE nombre='$nombre'";
	$resultado1= mysqli_query($conexion,$existe);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}
*/


if(hayDatos($nombre, $descripcion, $provincia, $ciudad, $nombre_imagen, $size_imagen)){

	$tipo= addslashes($tip_imagen);
	$exp_String="/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/";

	if ($tipo=="image/png" || $tipo=="image/jpg" || $tipo=="image/jpeg"  || $tipo=="image/bmp" || $tipo=="image/tif"){
		$archivo= fopen($imagen, "r");
		$contenido=fread($archivo, $size_imagen);//archivo en bytes
		$contenido=addslashes($contenido);
		$destino="../files/".$nombre_imagen;
		$copiar= copy( $imagen, $destino);
		//$mover=move_uploaded_file($imagen, $. $nombre_imagen);
		fclose($archivo);
	}
	if (!preg_match($exp_String,$nombre)) {
		echo '<script>window.location="../vistas/pantalla-agregar-residencia.php";</script>';
	}
	if (strlen($nombre) > "35") {
		echo '<script>window.location="../vistas/pantalla-agregar-residencia.php";</script>';
	}



		/*verifica que no exista el mismo nombre en la bd*/
		if(existe($nombre,$conexion)==0){
			$insertar= "INSERT INTO residencia(nombre,pais,provincia,ciudad,descripcion,imagen, tipoimagen) VALUES ('$nombre','$pais','$provincia','$ciudad','$descripcion','$contenido','$tipo')";

			//Ejecutar consulta
			$resultado = guardarResidencia($conexion,$insertar);

			$resultado2 = guardarFoto($conexion, 1, $_FILES);

			echo "$resultado";
			echo "-------------";
			echo "$resultado2";

			echo "<script language='javascript'>
				alert('Se registro residencia correctamente!..');
				location.href= '../vistas/pantalla-agregar-residencia.php' ;
				</script>";
		}else{/* $_SESSION['mensaje']="Usted ya esta registrado";
			 header("Location:pantalla-agregar-residencia.php")*/
			 echo "<script language='javascript'>
				alert('La residencia ya existe!..');
				location.href= '../vistas/pantalla-agregar-residencia.php' ;
				</script>";}
	}else{
		echo '<script>window.location="../vistas/pantalla-agregar-residencia.php";</script>';
	}


mysqli_close($conexion);



?>
