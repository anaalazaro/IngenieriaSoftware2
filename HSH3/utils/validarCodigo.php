<?php
  if (htmlspecialchars($_GET['codigo'])=="hola") {
    echo "el codigo es correcto. debe redireccionar al home del admin";
    header('Location: ../home.php');
  } else {
    echo "el codigo es incorrecto. debe volver a la pantalla de ingresar codigo";
    header('Location: ../index.php?fallo=true');
  }
?>
