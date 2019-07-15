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
		$consulta1="SELECT * FROM admin WHERE mail='$usuario' AND contrasenia='$contrasenia'";
		$result = mysqli_query($conexion,$consulta);
		$result1= mysqli_query($conexion,$consulta1);
		$numrows=mysqli_num_rows($result);
		$numrows1=mysqli_num_rows($result1);
		if($numrows!=0){
			$row=mysqli_fetch_array($result);
			$_SESSION['id']=$row['id'];
			$_SESSION["mail"] = $usuario;
			
				echo"<script language='javascript'>
				alert('Ingreso a su cuenta!..');
				location.href= '../vistas/home-user.php' ;
				</script>";
			//return true;
		}elseif ($numrows1!=0){
			$row=mysqli_fetch_array($result1);
			$_SESSION['id']=$row['id'];
			$_SESSION["mail"] = $usuario;
			
				echo"<script language='javascript'>
				alert('Ingreso a su cuenta!..');
				location.href= '../vistas/home-admin.php' ;
				</script>";
			
		}
	
		else{
			throw new Exception('error');
			//return false;
		}
	}
}
