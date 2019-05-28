<?php
include('../modelos/conexion.php');
$conexion= conectar();
$nombre= $_POST['nombre'];
$descripcion=$_POST['descripcion'];
$pais=$_POST['pais'];

$provincia=$_POST['provincia'];
$ciudad=$_POST['direccion'];
$nombre_imagen=$_FILES['foto']['name'];
$tip_imagen=$_FILES['foto']['type'];
$size_imagen=$_FILES['foto']['size'];
$imagen=$_FILES['foto']['tmp_name'];


/*if((isset($nombre)) && !empty($nombre) &&  (isset($descripcion)) && !empty($descripcion) && (isset($provincia)) && !empty($provincia) && (isset($ciudad)) && !empty($ciudad) && (isset($nombre_imagen)) && ($size_imagen>0) ){
		$exp_String="/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/";//ruta de archivo en forma de string*/

		$tipo= addslashes($tip_imagen);
		if ($tipo=="image/png" || $tipo=="image/jpg" || $tipo=="image/jpeg"  || $tipo=="image/bmp" || $tipo=="image/tif"){
		$archivo= fopen($imagen, "r");
		$contenido=fread($archivo, $size_imagen);//archivo en bytes
		$contenido=addslashes($contenido);
		/*$destino="files/".$nombre_imagen;
		$copiar= copy( $imagen, $destino);*/
		//$mover=move_uploaded_file($imagen, $. $nombre_imagen);
		fclose($archivo);
		$consulta="UPDATE residencia SET imagen='$contenido',tipoimagen='$tipo' WHERE nombre='$nombre'";
		$resultado=mysqli_query($conexion,$consulta);
		}
		$consulta="UPDATE residencia SET pais='$pais',provincia='$provincia',ciudad='$ciudad',descripcion='$descripcion'
		WHERE nombre='$nombre'";

		$resultado=mysqli_query($conexion,$consulta);

		if($resultado){
			echo "<script language='javascript'>
				alert('Se modifico correctamente!..');
				location.href= 'modificarResidencia.php' ;
				</script>";
		}else{
				echo "<script language='javascript'>
				alert('No se modifico correctamente!..');
				location.href= 'modificarResidencia.php' ;
				</script>";
		}




mysqli_close($conexion);




/*$imagen=addslashes(file_get_contents($imagen)); levantar imagen*/



?>
