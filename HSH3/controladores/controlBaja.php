<?php

$id = $_GET['id'];
include('../modelos/funciones-paquetes.php');
include('../modelos/funciones-usuarios.php');

$paquetes = getPaquetesPorIdUsuario($id);
$cantidad = $paquetes->num_rows;
$usuario = getUsuarioPorId($id);

if ($cantidad>0) {
  echo "tiene paquetes";
  echo '<script language="javascript">alert("Usted tiene paquetes adquiridos. Para solicitar la baja primero debe dar de baja sus paquetes activos.");history.go(-2)</script>';
} else {
  echo "no tiene paquetes";
  if ($usuario['premium']==1) {
    echo '<script language="javascript">alert("Usted es usuario premium. Para darse de baja del sistema primero debe cancelar su subscripcion de premium.");history.go(-2)</script>';
  }else {
    setSolicitudDeBaja($id);
    echo '<script language="javascript">alert("Se envio una solicitud de baja. Ahora el administrador debe confirmarlo.");history.go(-2)</script>';
  }
}


 ?>
