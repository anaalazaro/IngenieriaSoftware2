<?php
  if (isset($_POST['cancelar-modificacion'])) {
    header('Location: ../pantalla-modificar-residencia.php');
  } elseif (isset($_POST['modificar-definitivamente'])) {
    //codigo para modificar la residencia
    header('Location: ../pantalla-modificar-residencia.php?modificacion-confirmada');
  }
?>
