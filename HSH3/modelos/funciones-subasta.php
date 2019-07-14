<?php
function getSubastaPorId($id,$conexion){
	$consulta= "SELECT * FROM subastas WHERE id_paquete='$id' ORDER BY hora_puja";
	$ret=mysqli_query($conexion,$consulta);
	return $ret;

}
function reegistrarPuja($id,$conexion,$puja,$usuario){
	$nueva_puja="INSERT INTO subastas(id_paquete, hora_puja, usuario, monto_oferta) VALUES('$id',NOW(),'$usuario','$puja')";
	$resultado=mysqli_query($conexion,$nueva_puja);


}
?>
