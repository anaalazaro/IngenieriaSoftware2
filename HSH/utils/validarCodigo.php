<?php
  if (htmlspecialchars($_GET['codigo'])=="hola") {
    echo "el codigo es correcto. debe redireccionar al home del admin";
    echo "<a href=../home.php></a>";
  } else {
    echo "el codigo es incorrecto. debe volver a la pantalla de ingresar codigo";
    include("../index.php");
  }
?>
