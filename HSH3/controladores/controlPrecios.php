<?php
include('../modelos/funciones-precios.php');

if (isset($_POST['nuevo-precio-basico'])) {
  $precio_premium = getPrecioPremium();
  $precio_basico = $_POST['nuevo-precio-basico'];
  if ($precio_basico>=0) {
    if ($precio_premium > $precio_basico) {
      setPrecioBasico($precio_basico);
      header("location: ../vistas/pantalla-configurar-precios.php");
    }else {
      echo '<script language="javascript">alert("El precio del servicio basico no puede ser mayor que el precio del premium!Por favor ingrese un precio menor que $'.$precio_premium.'");window.location.href="../vistas/pantalla-configurar-precios.php";</script>';
    }
  } else {
    echo '<script language="javascript">alert("El precio del servicio basico no puede ser menor que 0. Por favor ingrese un numero mayor que 0");window.location.href="../vistas/pantalla-configurar-precios.php";</script>';
  }

}elseif (isset($_POST['nuevo-precio-premium'])) {
  $precio_premium = $_POST['nuevo-precio-premium'];
  $precio_basico = getPrecioBasico();
  if ($precio_premium>0) {
    if ($precio_basico<$precio_premium) {
      setPrecioPremium($precio_premium);
      header("location: ../vistas/pantalla-configurar-precios.php");
    }else {
      echo '<script language="javascript">alert("el precio del servicio premium no puede ser menor al precio del basico! Por favor ingrese un precio mayor que $'.$precio_basico.'");window.location.href="../vistas/pantalla-configurar-precios.php";</script>';
    }
  }else {
    echo '<script language="javascript">alert("El precio del servicio premium no puede ser menor que 0. Por favor ingrese un numero mayor que 0");window.location.href="../vistas/pantalla-configurar-precios.php";</script>';
  }
}


 ?>
