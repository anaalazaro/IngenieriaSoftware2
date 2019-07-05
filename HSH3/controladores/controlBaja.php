<?php

$id = $_GET['id'];
include('../modelos/conexion.php');
include('../modelos/funciones-paquetes.php');
include('../modelos/funciones-usuarios.php');

$paquetes = getPaquetesPorIdUsuario($id);
$cantidad = $paquetes->num_rows;

if ($cantidad>0) {
  echo "tiene paquetes";
} else {
  echo "no tiene paquetes";
  setSolicitudDeBaja($id);
  echo '<script language="javascript">alert("Se envio una solicitud de baja. Ahora el administrador debe confirmarlo.");history.go(-2)</script>';
}


 ?>
