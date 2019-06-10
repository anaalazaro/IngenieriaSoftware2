<?php
/*echo "aca va la logica para registrar el usuario, deberia ser creado otro archivo en la carpeta modelos para usar funciones que ayuden a registrar el usuario"*/
include('../modelos/conexion.php');
include("../modelos/funciones-usuarios.php");
$conexion=conectar();
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$mail= $_POST['mail'];
$contrasenia=$_POST['contrasenia'];
$contrasenia_copia=$POST['contrasenia-copia'];
#$contraseniaC=$_POST['contraseña-copia'];

if (!empty($nombre)&& !empty($contrasenia)){
	if (existe($mail,$conexion)==0){
		if ($contrasenia==$contrasenia_copia) {
			$consulta= "INSERT INTO usuario(nombre_usuario,apellido_usuario,mail,contrasenia) VALUES  ('$nombre','$apellido','$mail','$contrasenia')";
			$resultado= mysqli_query($conexion,$consulta);
			echo  "<script language='javascript'>
					alert('Se registro usuario correctamente!..');
					location.href= '../vistas/pantalla-register.php' ;
					</script>";
		}else {
			echo "<script language='javascript'>
			 alert('las contraseñas no coinciden..');
			 location.href= '../vistas/pantalla-register?mail=hola.php' ;
			 </script>";
		}
	}
	else{/* $_SESSION['mensaje']="Usted ya esta registrado";
			 header("Location:pantalla-agregar-residencia.php")*/
			 echo "<script language='javascript'>
				alert('El usuario ya existe!..');
				location.href= '../vistas/pantalla-register.php' ;
				</script>";}

}
mysqli_close($conexion)

?>
