<?php
if (isset($_GET['id'])) {
  $id_paquete = $_GET['id'];
  
    include('../modelos/funciones-paquetes.php');
    $paquete = mysqli_fetch_array(getPaquetePorId($id_paquete));
    if ($paquete['estado']=="RESERVA") {
      ponerEnReserva($id_paquete);
      echo'<script type="text/javascript">
        alert("Usted ha reservado el paquete");
        window.history.back();
        </script>';
    }
}else {
  echo'<script type="text/javascript">
  alert("Hubo un error, vuelva a intentarlo.");
  window.history.back();
  </script>';
}
 ?>