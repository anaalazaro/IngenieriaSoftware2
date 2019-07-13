<?php
session_start();
include_once("../controladores/controlPaquetes.php");
if ((isset($_SESSION['id']))&&(isset($_GET['id_paquete']))) {
  $id_usuario=$_SESSION['id'];
  $id_paquete=$_GET['id_paquete'];
  $paquete=mysqli_fetch_array(getPaquetePorID($id_paquete));
  if (empty($paquete['id_usuario'])==1) {
    //validarTarjeta();
    asignarPaquete($id_paquete,$id_usuario,"HOTSALE");
    echo'<script type="text/javascript">
        alert("El paquete es tuyo!");
        window.location.href = "../vistas/listas-paquetes-user.php";
        </script>';
  }else {
    echo'<script type="text/javascript">
        alert("El paquete ya tiene dueño.");
        window.location = document.referrer;
        </script>';
  }
}else {
  echo'<script type="text/javascript">
      alert("Ocurrio un error, vuelva a intentarlo.");
      window.location = document.referrer;
      </script>';
}

 ?>
