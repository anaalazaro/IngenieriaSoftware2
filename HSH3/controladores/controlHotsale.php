<?php

if (isset($_GET['id'])) {
  $paquete = $_GET['id'];
  if (isset($_POST['precio'])) {
    $precio = $_POST['precio']
    echo "se va a poner en hotsale";
  }else {
    echo "ingrese precio ";
  }
}else {
  echo "hubo un error";
}


 ?>
