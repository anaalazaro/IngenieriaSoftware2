<?php
include('../modelos/conexion.php');

function modificarEstado(){
	$conexion=conectar();
	$consulta="Select * from paquete ";
	$result=mysqli_query($conexion,$consulta);
	$fecha= date('Y-m-d');
	while ($row = mysqli_fetch_array($result)){
		$id=$row['id'];
		$dt=$row['semana'];
		//$dt_subasta = date('Y-m-d',$dt.'- 6 month') ;
		$dt_subasta_inicio=date("Y-m-d", strtotime("$dt -6 month"));
		
		
		
		
		$estado=$row['estado'];
		$dt_subasta_fin=date("Y-m-d", strtotime("$dt_subasta_inicio +3 days"));

		
		if ($estado=='ACTIVO' AND ($fecha>=$dt_subasta_inicio AND $fecha<=$dt_subasta_fin)){
			
			$consulta = "UPDATE paquete SET estado='SUBASTA' WHERE id='$id'";
			$result1 = mysqli_query($conexion,$consulta);
			
			
			
		}elseif(($estado=='ACTIVO' OR $estado=='SUBASTA') AND ($fecha>=$dt_subasta_fin)){
			
			$consulta1 = "UPDATE paquete SET estado='ESPERA' WHERE id='$id'";
			$result2 = mysqli_query($conexion,$consulta1);
			
			
		}elseif($dt<=$fecha ){
			$consulta2 = "UPDATE paquete SET estado='FINALIZADO' WHERE id='$id'";
			$result3 = mysqli_query($conexion,$consulta2);
			
		}
		
		
	}

	
}
?>