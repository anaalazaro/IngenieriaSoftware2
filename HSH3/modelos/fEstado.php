<?php

include_once('../modelos/funciones-paquetes.php');
include_once('../modelos/funciones-pujas.php');

function modificarEstado($conexion){
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

		


		if (($estado=='SUBASTA' OR $estado=='ESPERA' OR $estado=='CADUCADO') AND ($fecha<=$dt_subasta_inicio)){
			setEstadoDePaquete($id,'RESERVA');

		}elseif(($estado=='RESERVA' OR $estado=='ESPERA' OR $estado=='CADUCADO') AND ($fecha>=$dt_subasta_inicio AND $fecha<=$dt_subasta_fin)){
			setEstadoDePaquete($id,'SUBASTA');

		}elseif(($estado=='RESERVA' OR $estado=='SUBASTA' OR $estado=='CADUCADO') AND ($fecha>$dt_subasta_fin AND $fecha<=$dt)){
			if (existenPujasDe($id) AND $estado=='SUBASTA') {
				$estado_de_cierre = cerrarSubasta($id);
				if (!$estado_de_cierre) {
					setEstadoDePaquete($id,'ESPERA');
				}
			}else {
				setEstadoDePaquete($id,'ESPERA');
			}


		}elseif($dt<=$fecha ){
			setEstadoDePaquete($id,'CADUCADO');

		}


	}


}
?>
