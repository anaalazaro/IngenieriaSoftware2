<?php
if (isset($_POST['eliminar-definitivamente'])) {
  // codigo para eliminar definitivamente de la BD

}elseif (isset($_POST['cancelar-eliminacion'])) {
  // codigo para volver atras
  header('Location: ../pantalla-eliminar-residencia.php');
}
?>
