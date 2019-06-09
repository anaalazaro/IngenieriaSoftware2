<?php
function existe($mail,$conexion){
	$existe= "SELECT * FROM usuario WHERE mail='$mail'";
	$resultado1= mysqli_query($conexion,$existe);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}

?>
