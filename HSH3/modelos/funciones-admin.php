<?php
function existeAdmin($mail,$conexion){
	$existe2= "SELECT * FROM admin WHERE mail='$mail'";
	$resultado2= mysqli_query($conexion,$existe2);
	
	if(mysqli_num_rows($resultado2)==0){
	
		return 0;
	}else{
	return 1;
	
	
}}
?>