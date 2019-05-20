<?php

// archivo conexion.php
function conectar(){
//localhost , usuario , contraseña , BD
	$conexion= mysqli_connect('localhost', 'root', '', 'hsh');
	return $conexion;

}
/*print_r($resultado->fetch_assoc());die;*/

/*$con=conectar();
if(!$con){
	echo "error";	
}
else{
	echo "bien";
}
*/
