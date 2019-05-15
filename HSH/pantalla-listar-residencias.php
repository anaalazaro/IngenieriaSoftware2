<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="css/personal.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Listar Residenciaa</title>
    <?php
    include('conexion.php');
    $conexion=conectar();
    $consulta= "SELECT * FROM residencia WHERE Nombre='$nombre'";
    $resul=mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_array($result)



    ?>
  </head>
  <body class="uk-height-viewport my-background-color">
    
  </body>
</html>
