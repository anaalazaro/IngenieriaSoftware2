<?php

class Autenticacion {	
	function logueado()
	{
		if(!isset($_SESSION['id'])){
		echo  '<script>alert("!Usted no esta logueado!")</script>';
		echo '<script>window.location="../vistas/pantalla-login.php";</script>';
		}
	}
	function Silogueado()
	{	
		if(isset($_SESSION['id'])){
		return true;
		echo  '<script>alert("!Usted esta logueado!")</script>';
		echo '<script>window.location="../vistas/home-user.php";</script>';
		}else{
			return false;
		}
	}
	public function autenticar($usuario, $contrasenia, $conexion)
	{		
	
		$consulta = "SELECT * FROM usuario WHERE mail='$usuario' AND contrasenia='$contrasenia'";		
		$result = mysqli_query($conexion,$consulta);
		$numrows=mysqli_num_rows($result);
		if($numrows!=0){
			$row=mysqli_fetch_array($result);
			$_SESSION['id']=$row['id'];
			echo  '<script>alert("!Ingreso a su cuenta!")</script>';
			echo '<script>window.location="../vistas/home-user.php";</script>';
			//return true;
		}
		else{
			throw new Exception('error');
			//return false;
		}			
	}
}