<?php
if (isset($_POST['buscar-para-modificar'])) {
  // codigo si se presiono buscar
  if (htmlspecialchars($_POST['id-residencia'])=="1234"){  //validar con la BD
    //codigo si se encontro la residencia
    header('Location: ../pantalla-modificar-residencia.php?found=true');
  }else {
    //codigo si no se encontro la residencia
    header('Location: ../pantalla-modificar-residencia.php?found=false');
  }

}elseif (isset($_POST['buscar-para-eliminar'])) {
  // codigo si se presiono buscar desde eliminar-residencia
  if (htmlspecialchars($_POST['id-residencia'])=="1234"){  //validar con la BD
    //codigo si se encontro la residencia
    header('Location: ../pantalla-eliminar-residencia.php?found=true');
  }else {
    //codigo si no se encontro la residencia
    header('Location: ../pantalla-eliminar-residencia.php?found=false');
  }
}
?>
