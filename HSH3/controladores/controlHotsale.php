<?php

if (isset($_GET['id'])) {
  $id_paquete = $_GET['id'];
  if ((isset($_POST['precio']))AND($_POST['precio']>=0)) {
    $precio = $_POST['precio'];
    include('../modelos/funciones-paquetes.php');
    $paquete = mysqli_fetch_array(getPaquetePorId($id_paquete));
    if ($paquete['estado']=="ESPERA") {
      ponerEnHotsale($id_paquete,$precio);
      echo'<script type="text/javascript">
        alert("El paquete '.$id_paquete.', se puso en Hotsale! Con un precio de $'.$precio.'");
        window.location.href = "../vistas/detalle-paquete-admin.php?id_paquete='.$id_paquete.'";
        </script>';
    }else {
      echo'<script type="text/javascript">
      alert("El paquete '.$id_paquete.', no se encuentra disponible para poner en Hotsale.\n(Solo se pueden poner en Hotsale los paquetes que estan en espera).\nEstado de este paquete: '.$paquete['estado'].'");
      window.history.back();
      </script>';
    }

  }else {
    echo'<script type="text/javascript">
    alert("No se ingreso un precio correcto, vuelva a intentarlo.");
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
