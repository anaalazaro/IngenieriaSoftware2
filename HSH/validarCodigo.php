<?php
  if (htmlspecialchars($_GET['codigo'])=="hola") {
    echo "el codigo es correcto. debe redireccionar al home del admin";
  } else {
    echo "el codigo es incorrecto. debe volver a la pantalla de ingresar codigo";
  }
?>
