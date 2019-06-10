<?php

include('../modelos/conexion.php');
include("../modelos/funciones-usuarios.php");
$conexion=conectar();
session_start();
include('../modelos/autenticacion.php');

	if (!empty($_POST['mail']) && !empty($_POST['contrasenia']) ){
		    $usuario=$_POST['mail'];
		    $clave=$_POST['contrasenia'];
		    $verificar = new Autenticacion();
		    try{
		    	$verificar->autenticar($usuario,$clave,$conexion);
		    	//header("Location:index.php");
		    	echo'<script>window.location="../vistas/home-user.php";</script>';
		    } catch(Exception $e) {
		    	//echo "error";
		    	echo  '<script>alert("No ingreso correctamente a su cuenta")</script>';
		    }
		} 
		else{
			echo'<script>window.location="../vistas/pantalla-login.php";</script>';
		}
 mysqli_close($conexion);

 ?>
