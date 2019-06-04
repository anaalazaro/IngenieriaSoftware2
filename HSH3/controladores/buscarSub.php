<?php

//2 botones: consultar por id(si se conoce) o consultar por subastas abiertas



?><?php
include("../modelos/conexion.php");
$conexion=conectar();
$id= $_POST['id'];


function existe($id,$conexion){
	$existe= "SELECT * FROM subasta WHERE id_subasta='$id' AND fecha_fin is null";
	$resultado1= mysqli_query($conexion,$existe);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}



if(empty($id)){
echo '<script>window.location="pantalla-cerrar-subasta.php";</script>';}
else{
	$buscar="SELECT * FROM subasta WHERE id_subasta='$id'";
	$enviar= mysqli_query($conexion,$buscar);
	$rows=mysqli_num_rows($enviar);
	if($rows==0){
			header('location:../vistas/pantalla-cerrar-subasta.php?fallo=true');

	}else{

		/*verifica que no este terminada la subasta con ese id*/
		$verificar=existe($id,$conexion);
		if($verificar==1){
			$insertar= "update subasta SET fecha_fin=current_date where id_subasta='$id'";

			//Ejecutar consulta
			$resultado= mysqli_query($conexion,$insertar);
			echo "<script language='javascript'>
				alert('Se cerro la subasta correctamente!..');
				location.href= '../vistas/home-admin.php' ;
				</script>";
		}else{
			 echo "<script language='javascript'>
				alert('Ya esta cerrada la subasta, consulte subastas disponibles..');
				location.href= '../vistas/pantalla-cerrar-subasta.php' ;
				</script>";}


}



/*if (mysqli_affected_rows($conexion)>0) {
	echo "se realizo registro";

}else{
	echo "no se realizo registro";
}*/
mysqli_close($conexion);



}
?>
