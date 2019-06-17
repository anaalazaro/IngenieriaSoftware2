<?php
include('../modelos/conexion.php');
include('../modelos/funciones-usuarios.php');
$conexion=conectar();
session_start();
$mail=$_SESSION['mail'];
$consulta= "SELECT * FROM usuario WHERE mail='$mail'";
$result=mysqli_query($conexion,$consulta);
$row=mysqli_fetch_array($result);
echo $_SESSION['mail'];
if($row['premium']==0){
	$mail= $_SESSION['mail'];
	/*$file=file('../files/archivo.txt');
	foreach ($file as $key) {
	if(strstr($key, $mail)){
			echo "<script language='javascript'>
			alert('Usted tiene pendiente su solicitud!..');
			location.href= '../vistas/pantalla-perfil-usuario.php' ;
			</script>";
			$encuentra=TRUE;
	}if ($encuentra!=TRUE ){
			$files=fopen('../files/archivo.txt', 'a');
			fwrite($files, $mail. PHP_EOL);
			fclose($files);
			echo "<script language='javascript'>
			alert('Usted no es usuario premium, ya se envio su solicitud!..');
			location.href= '../vistas/pantalla-perfil-usuario.php' ;
			</script>";
		}
	
	}*/
	$consulta= "UPDATE usuario SET premium='2' WHERE mail='$mail'";// 2 siginifica 	que esta es espera
	$resultado=mysqli_query($conexion,$consulta);
	echo "<script language='javascript'>
			alert('Usted no es usuario premium, ya se envio su solicitud!..');
			location.href= '../vistas/pantalla-perfil-usuario.php' ;
			</script>";


}else {
		if($_SESSION['premium']==1){
			echo "<script language='javascript'>
			alert('Usted ya es usuario premium!..');
			location.href= '../vistas/pantalla-perfil-usuario.php' ;
			</script>";  
		}
		if ($_SESSION['premium']==2) {
			echo "<script language='javascript'>
			alert('Usted tiene pendiente su solicitud!..');
			location.href= '../vistas/pantalla-perfil-usuario.php' ;
			</script>";
		}
 	}


?>