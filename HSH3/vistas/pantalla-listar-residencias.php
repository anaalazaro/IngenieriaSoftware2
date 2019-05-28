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
    $consulta= "SELECT * FROM residencia ";
    $result=mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_array($result);
    mysqli_close($conexion);



    ?>
  </head>
  <body >
    <table class="table table-striped">
      <thead>
        <tr>
         <th>Imagen</th>
          <th>Nombre</th>
          <th>Pais</th>
          <th>Provincia</th>
          <th>Direccion</th>
          <th>Descripcion</th>
         
        </tr>
      </thead>
      <tbody>

        <td><img src="data:image/jpg;base64"/>?php echo $row['imagen']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
      </tbody>
    </table>
    
  </body>
</html>
