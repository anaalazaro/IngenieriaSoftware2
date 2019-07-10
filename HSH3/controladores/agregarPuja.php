<?php
session_start(); 
include('../modelos/conexion.php');
include('../modelos/funciones-subasta.php');
include('../modelos/funciones-paquetes.php');


$id=$_POST['id'];
$puja=$_POST['puja'];
$usuario=$_SESSION['mail'];



$conexion=conectar();

$subasta=mysqli_fetch_array(getPaquetePorId2($id,$conexion));
$subasta_base=$subasta['precio_base'];

if($subasta_base<$puja){
    registrarPuja($id,$conexion,$puja,$usuario);
	modificarPrecio($puja,$conexion,$id);
	echo "<script language='javascript'>
				alert('Se registro PUJA correctamente!..');
				location.href= '../vistas/pantalla-detalle-subasta.php?id=$id' ;
				</script>";
}else{
	echo "<script language='javascript'>
				alert('La puja no puedo registrarse');
				location.href= '../vistas/home-user.php' ;
				</script>";}

	
?>