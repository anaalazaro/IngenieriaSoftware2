<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listar Residenciaa</title>
   
  </head>
  <body >
    <?php
    include('conexion.php');

    $conexion=conectar();
    $consulta= "SELECT * FROM residencia ";
    $result=mysqli_query($conexion,$consulta);
   
    mysqli_close($conexion);?>
    <table class="table table-striped" border="1" align="center" >
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
        <?php while ($row = mysqli_fetch_array($result)){?>
        <tr>
        <td></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['pais']; ?></td>
        <td><?php echo $row['provincia']; ?></td>
        <td><?php echo $row['ciudad']; ?></td>
        <td><?php echo $row['descripcion']; ?></td>
        <?php } ?>
      </tr>
     </tbody>
    </table>
    <a href="home.php">Volver</a>
  </body>
</html>
