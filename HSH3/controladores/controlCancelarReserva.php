<?php
session_start();
include_once('../modelos/funciones-usuarios.php');
include_once('../modelos/funciones-paquetes.php');

if (isset($_GET['id-paquete'])) {
  $id_paquete = $_GET['id-paquete'];
  $paquete = getPaquetePorId($id_paquete);
  $id_usuario = $_SESSION['id'];
  if (true) {
    // ACA DESPUES VA LA VALIDACION DE CUANTO ANTES PIDIO CANCELAR
    sumarUnCredito($id_usuario);
  }
  cancelarPaquete($id_paquete);
  echo'<script type="text/javascript">
    alert("Se ha cancelado su reserva correctamente.");
    window.location.replace("../vistas/listar-paquetes-user.php");
    </script>';
}else {
  echo "hubo un error";
}

?>
