<?php
session_start();
$id_usuario=$_SESSION['id'];


if (isset($_GET['id'])) {
  $id_paquete = $_GET['id'];

    include_once('../modelos/funciones-paquetes.php');
    include_once('../modelos/funciones-usuarios.php');

    $paquete = mysqli_fetch_array(getPaquetePorId($id_paquete));
    if ($paquete['estado']=="RESERVA") {
      if (getCreditos($id_usuario)>0) {
        ponerEnReserva($id_paquete,$id_usuario);
        restarUnCredito($id_usuario);
        echo'<script type="text/javascript">
          alert("Usted ha reservado el paquete");
          window.history.back();
          </script>';
      }else {
        echo'<script type="text/javascript">
          alert("Usted no tiene creditos restantes. No se puede hacer la reserva.");
          window.history.back();
          </script>';
      }
    }else {
      echo'<script type="text/javascript">
      alert("Hubo un error, vuelva a intentarlo.");
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
