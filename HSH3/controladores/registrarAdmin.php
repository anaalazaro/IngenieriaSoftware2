<?php
/*echo "aca va la logica para registrar el usuario, deberia ser creado otro archivo en la carpeta modelos para usar funciones que ayuden a registrar el usuario"*/
include('../modelos/conexion.php');
include("../modelos/funciones-usuarios.php");
include('../modelos/funciones-admin.php');
$conexion=conectar();

$mail= $_POST['mail'];
$contrasenia=$_POST['contrasenia'];

if (!empty($mail) && !empty($contrasenia)){
	if (existe($mail,$conexion)==0){
		if (existeAdmin($mail,$conexion)==0) {
			$consulta= "INSERT INTO admin(mail,contrasenia) VALUES  ('$mail','$contrasenia')";
			$resultado= mysqli_query($conexion,$consulta);
			echo  "<script language='javascript'>
					alert('Se registro administrador correctamente!..');
					location.href= '../vistas/pantalla-listar-administradores.php' ;
					</script>";
		}else {
			echo "<script language='javascript'>
			 alert('el admin ya existe..');
			 location.href= '../vistas/pantalla-listar-administradores.php' ;
			 </script>";
		}
		
	}
	else{/* $_SESSION['mensaje']="Usted ya esta registrado";
			 header("Location:pantalla-agregar-residencia.php")*/
			 echo "<script language='javascript'>
				alert('El usuario ya existe!..');
				location.href= '../vistas/pantalla-listar-administradores.php' ;
				</script>";}

}
mysqli_close($conexion);

?>
