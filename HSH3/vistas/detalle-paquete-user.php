<?php

if (isset($_GET['id'])) {
  include_once('../controladores/controlPaquetes.php');
  $id_de_paquete = $_GET['id'];
  $paquete = mysqli_fetch_array(getPaquetePorID($id_de_paquete));
  switch ($paquete['estado']) {
    case 'SUBASTA':
      header("location: ../vistas/detalle-subasta-user.php?id=".$id_de_paquete);
      break;
    case 'RESERVA':
      header("location: ../vistas/detalle-reserva-user.php?id=".$id_de_paquete);
      break;
    case 'HOTSALE':
      header("location: ../vistas/detalle-hotsale-user.php?id=".$id_de_paquete);
      break;
  }
  echo $paquete['estado'];
}


 ?>
