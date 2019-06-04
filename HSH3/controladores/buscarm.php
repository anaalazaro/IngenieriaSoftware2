
<?php
include("../modelos/conexion.php");
$conexion=conectar();
$nombre= $_POST['nombre'];
$precio=$_POST['precio_piso'];
$semana=$_POST['semana'];

function existe($nombre,$semana,$conexion){
	$existe= "SELECT * FROM subasta WHERE NombreR='$nombre' AND fecha_inicio='$semana'";
	$resultado1= mysqli_query($conexion,$existe);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}



if(empty($nombre)){
echo '<script>window.location="pantalla-crear-subasta.php";</script>';}
else{
	$buscar="SELECT * FROM residencia WHERE Nombre='$nombre'";
	$enviar= mysqli_query($conexion,$buscar);
	$rows=mysqli_num_rows($enviar);
	if($rows==0){
			header('../vistas/location:pantalla-crear-subasta.php?fallo=true');

	}else{

		/*verifica que no exista el mismo nombre en la bd*/
		$verificar=existe($nombre,$semana,$conexion);
		if($verificar==0){
			$insertar= "INSERT INTO subasta(NombreR,fecha_inicio,precio) VALUES ('$nombre','$semana', '$precio')";

			//Ejecutar consulta
			$resultado= mysqli_query($conexion,$insertar);
			echo "<script language='javascript'>
				alert('Se registro subasta correctamente!..');
				location.href= '../vistas/home-admin.php' ;
				</script>";
		}else{/* $_SESSION['mensaje']="Esa subasta ya existe";
			 header("Location:pantalla-agregar-residencia.php")*/
			 echo "<script language='javascript'>
				alert('Ya existe la subasta, pruebe una fecha distinta..');
				location.href= '../vistas/pantalla-crear-subasta.php' ;
				</script>";}


}



/*if (mysqli_affected_rows($conexion)>0) {
	echo "se realizo registro";

}else{
	echo "no se realizo registro";
}*/
mysqli_close($conexion);



}

/* echo "existe";


			 $fila=mysqli_fetch_row($enviar);
			 echo $fila[0]." ";
			 echo $fila[1]." ";
			 echo $fila[2]." ";
		     echo $fila[3]." ";
			echo $precio . "  " . $semana;
			$consultarSemana="SELECT WEEK('$semana',3)";
			$enviars=mysqli_query($conexion,$consultarSemana);
			print_r($enviars->fetch_assoc());die;
	}<?php
  if (htmlspecialchars($_GET['codigo'])=="hola") {
    echo "el codigo es correcto. debe redireccionar al home del admin";
    header('Location: ../home.php');
  } else {
    echo "el codigo es incorrecto. debe volver a la pantalla de ingresar codigo";
    header('Location: ../index.php?fallo=true');
  }
?>
function existe($nombre,$conexion,$consulta){

	$resultado1= mysqli_query($conexion,$consulta);
	if(mysqli_num_rows($resultado1)==0){
		return 0;
	}else {
		return 1;
	}
}

	verifica que exista el mismo nombre en la bd
		$consulta= "SELECT * FROM residencia WHERE Nombre='$nombre'";
		$verificar=existe($nombre,$conexion,$consulta);
		if($verificar==1){
			$resultado1= mysqli_query($conexion,$consulta);
			echo "existe";

			 $fila=mysqli_fetch_row($resultado1);
			 echo $fila[0]." ";
			 echo $fila[1]." ";
			 echo $fila[2]." ";
			 echo $fila[3]." ";
		}


			//Ejecutar consulta
			$resultado= mysqli_query($conexion,$insertar);
			echo "<script language='javascript'>
				alert('Se registro residencia correctamente!..');
				location.href= 'home.php' ;
				</script>";
		}else{/* $_SESSION['mensaje']="No existe la residencia";
			 header("Location:pantalla-crear-subasta.php")
			 echo "<script language='javascript'>
				alert('No existe la residencia!..');
				location.href= 'home.php' ;
				</script>";}
				echo "no existe";

}}*/
?>
