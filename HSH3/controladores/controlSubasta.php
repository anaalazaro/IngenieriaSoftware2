<?php

include_once('../controladores/controlPaquetes.php');
include_once('../controladores/controlPaquetes.php');
include_once('../modelos/conexion.php');
include_once('../modelos/funciones-pujas.php');
include_once('../modelos/funciones-usuarios.php');

session_start();

$id_usuario = $_SESSION['id'];
$nuevo_precio = $_POST['nuevo-precio'];
$id_paquete = $_GET['id_paquete'];

$puja_valida = true;

if (!tieneTarjetaValida($id_usuario)) {
  $puja_valida = false;
  $error = "Su tarjeta es invalida! \nPor favor modifique su informacion de cobro. \nLo vamos a redirigir a su perfil.";
  $redireccion = 'window.location.href="../vistas/pantalla-perfil-usuario.php"';
}

if (existenPujasDe($id_paquete)) {
  $mejor_puja = getMejorPuja($id_paquete);
  if ($nuevo_precio<=$mejor_puja) {
    $puja_valida = false;
    $error = "Ocurrio un error! La puja que ingreso no es suficiente, puede ser que otro usuario hay hecho una mejor oferta. Por favor vuelva a intentarlo.";
    $redireccion = "window.location = document.referrer";
  }
}

if (getCreditos($id_usuario<1)) {
  $puja_valida = false;
  $error = "Ocurrio un error! \nUsted no cuenta con los creditos minimos necesarios (1) para participar de esta subasta.";
  $redireccion = "window.location = document.referrer";
}

if ($puja_valida) {
  registrarPuja($id_paquete,$id_usuario,$nuevo_precio);
  echo'<script type="text/javascript">
    alert("Se ha registrado su puja!");
    window.location.href="../vistas/pantalla-perfil-usuario.php";
    </script>';
}else {
  echo'<script type="text/javascript">
    alert("'.$error.'");
    '.$redireccion.';
    </script>';
}




/*
if (existenPujasDe($id_paquete)) {
  echo "hay";
}else {
  echo "no hay";
}
*/

 ?>
