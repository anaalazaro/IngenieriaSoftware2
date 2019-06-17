<?php
include('../modelos/conexion.php');
include("../modelos/funciones-paquetes.php");
$conexion=conectar();
$nombre= $_POST['nombre'];
$semana=$_POST['semana'];
$p_base=$_POST['precio_base'];

if(hayDatos($nombre,$semana)){
	
	/*verifica que no exista el mismo nombre en la bd*/
	if(existe($nombre,$semana,$conexion)==0){
		
		$insertar= "INSERT INTO paquete(nombre_res,semana,estado,precio_base) VALUES ('$nombre','$semana','ACTIVO','$p_base')";
		
		//Ejecutar consulta
		$resultado = guardarPaquete($conexion,$insertar);
		
		echo "<script language='javascript'>
				alert('Se registro paquete correctamente!..');
				location.href= '../vistas/pantalla-crear-paquete.php' ;
				</script>";

		
	}else{
		echo "<script language='javascript'>
				alert('El paquete ya existe!..');
				location.href= '../vistas/pantalla-crear-paquete.php' ;
				</script>";
	}
}else{
		echo '<script>window.location="../vistas/pantalla-crear-paquete.php";</script>';
	}



mysqli_close($conexion);



?>