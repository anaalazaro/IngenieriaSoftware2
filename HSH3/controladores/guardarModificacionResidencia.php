<?php

  if (isset($_POST['cancelar-modificacion'])) {
    header('Location: ../pantalla-modificar-residencia.php');
  }elseif ((isset($_POST['modificacion-finalizada']))) {
    //codigo para guardar los cambios de modificacion en la bd
    
  }
?>
