<?php

class Autenticacion {
	function logueado()
	{
		if(!isset($_SESSION['id'])){
		echo"<script language='javascript'>
				alert('Usted no se encunetra logueado!..');
				location.href= '../vistas/pantalla-login.php' ;
				</script>";
		}
	}
	function Silogueado()
	{
		if(isset($_SESSION['id'])){
		return true;
		echo"<script language='javascript'>
				alert('Usted se encunetra logueado!..');
				location.href= '../vistas/home-user.php' ;
				</script>";
		}else{
			return false;
		}
	}
	function autenticar($usuario, $contrasenia, $conexion)
	{

		$consulta = "SELECT * FROM usuario WHERE mail='$usuario' AND contrasenia='$contrasenia'";
		$result = mysqli_query($conexion,$consulta);
		$numrows=mysqli_num_rows($result);
		if($numrows!=0){
			$row=mysqli_fetch_array($result);
			$_SESSION['id']=$row['id'];
			$_SESSION["mail"] = $usuario;
			if($usuario=='admin@hsh.com'){
				echo"<script language='javascript'>
				alert('Ingreso a su cuenta!..');
				location.href= '../vistas/home-admin.php' ;
				</script>";

				}else{
				echo"<script language='javascript'>
				alert('Ingreso a su cuenta!..');
				location.href= '../vistas/home-user.php' ;
				</script>";
			//return true;
		}
	}
		else{
			throw new Exception('error');
			//return false;
		}
	}
}
