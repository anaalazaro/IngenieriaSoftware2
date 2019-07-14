<?php

include_once('../modelos/funciones-paquetes.php');

if ((isset($_GET['id-paquete']))&&(isset($_POST['nuevo-precio']))) {
  $id = $_GET['id-paquete'];
  $precio = $_POST['nuevo-precio'];
  if ($precio>=0) {
    $paquete = mysqli_fetch_array(getPaquetePorId($_GET['id-paquete']));
    if (($paquete['estado']=='RESERVA')||($paquete['estado']=='ESPERA')||($paquete['estado']=='HOTSALE')) {
      modificarPaquete($id,$precio);
      echo'<script type="text/javascript">
            alert("Se modifico el paquete con ID: '.$paquete['id'].', ahora el precio es de $'.$precio.'");
            window.location.replace("../vistas/detalle-paquete-admin.php?id_paquete='.$paquete['id'].'");
            </script>';
    } else {
      echo'<script type="text/javascript">
            alert("Ocurrio un error! El precio del paquete no se puede modificar porque se encuentra: '.$paquete['estado'].', actual dueño:'.$paquete['id_usuario'].'");
            window.history.back();
            </script>';
    }
  }else {
    echo'<script type="text/javascript">
          alert("Ocurrio un error! El precio del paquete no puede ser menor que 0.");
          window.history.back();
          </script>';
  }

}else {
  echo'<script type="text/javascript">
        alert("Ocurrio un error!");
        window.history.back();
        </script>';
}


 ?>
