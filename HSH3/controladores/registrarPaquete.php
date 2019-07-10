<?php
include('../modelos/conexion.php');
include("../modelos/funciones-paquetes.php");
include("../modelos/funciones-residencias.php");
include('../modelos/fEstado.php');

$conexion=conectar();
$nombre= $_POST['nombre'];
$semana=$_POST['semana'];
$p_base=$_POST['precio_base'];


if(hayDatosPaquete($nombre,$semana)){
	 $res=getResidencia($conexion,$nombre);
	 $id_paquete=$res['id'];
	
	/*verifica que no exista el mismo nombre en la bd*/
	if(existePaquete($id_paquete,$semana,$conexion)==0){
		
		$insertar= "INSERT INTO paquete(id_res,nombre_res,semana,estado,precio_base) VALUES ('$id_paquete','$nombre','$semana','RESERVA','$p_base')";
		
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


modificarEstado($conexion);
mysqli_close($conexion);



?>
