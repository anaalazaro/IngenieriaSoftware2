<?php
include('../modelos/conexion.php');
include('../modelos/funciones-usuarios.php');
$conexion=conectar();
session_start();
$mail=$_SESSION["mail"];
$consulta= "SELECT * FROM usuario WHERE mail='$mail'";
$result=mysqli_query($conexion,$consulta);
$row=mysqli_fetch_array($result);
if($row['premium']=='1'){
			$consulta1="UPDATE usuario SET premium='0' WHERE mail='$mail'";
	 		$resultado1=mysqli_query($conexion,$consulta1);
	
			echo "<script language='javascript'>
			alert('Ya no eres usuario Premium!..');
			location.href= '../vistas/pantalla-perfil-usuario.php' ;
			</script>";
	
}/*else {
		if($row['premium']==1){
			echo "<script language='javascript'>
			alert('El usuario ya es premium!..');
			location.href= '../vistas/pantalla-listar-usuarios.php' ;
			</script>";
		}
		if ($row['premium']==0) {
			echo "<script language='javascript'>
			alert('El usuario no solicito ser premium!..');
			location.href= '../vistas/pantalla-listar-usuarios.php' ;
			</script>";
		}
 	}*/

?>