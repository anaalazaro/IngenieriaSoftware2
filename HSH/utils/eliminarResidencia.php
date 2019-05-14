<?php
if (htmlspecialchars($_POST['id-residencia'])=="1234"){  //validar con la BD

  //codigo si se encontro la residencia

  header('Location: ../pantalla-eliminar-residencia.php?found=true');
}else {

  //codigo si no se encontro la residencia

  header('Location: ../pantalla-eliminar-residencia.php?found=false');
}
?>
