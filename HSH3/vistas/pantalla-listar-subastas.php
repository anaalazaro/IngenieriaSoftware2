<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listar Subastas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>

  </head>
  <body class="uk-height-viewport my-background-color">
    <?php
    include('../modelos/conexion.php');

    $conexion=conectar();
    $consulta= "SELECT * FROM subasta ";
    $result=mysqli_query($conexion,$consulta);

    mysqli_close($conexion);?>
    <div class="uk-position-center my-form-box">
    <table class="table table-striped uk-table uk-table-divider uk-align-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Residencia</th>
          <th>Desde</th>
          <th>Hasta</th>
          <th>Precio</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)){?>
        <tr>
          <td><?php echo $row['id_subasta']; ?></td>
          <td><?php echo $row['NombreR']; ?></td>
          <td><?php echo $row['fecha_inicio']; ?></td>
          <td><?php echo $row['fecha_fin']; ?></td>
          <td><?php echo '$',$row['precio']; ?></td>
        <?php } ?>
        </tr>
      </tbody>
    </table>
      <div class="uk-padding-small">
        <a href="home.php" class="uk-button uk-button-primary">Volver</a>
      </div>
    </div>
  </body>
</html>
