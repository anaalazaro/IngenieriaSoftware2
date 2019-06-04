<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listar Residenciaa</title>
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
    $consulta= "SELECT * FROM residencia ";
    $result=mysqli_query($conexion,$consulta);

    mysqli_close($conexion);?>
    <div class="uk-position-center my-form-box">
    <table class="table table-striped uk-table uk-table-divider uk-align-center">
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
        <?php while ($row = mysqli_fetch_array($result)){
        $contenido=$row["imagen"]?>
        <tr>
          <td><img src='data:image/jpeg; base64, <?php echo base64_encode($contenido); ?>' alt="Aca va una imagen" width="60px"/></td>
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['pais']; ?></td>
          <td><?php echo $row['provincia']; ?></td>
          <td><?php echo $row['ciudad']; ?></td>
          <td><?php echo $row['descripcion']; ?></td>
        <?php } ?>
        </tr>
      </tbody>
    </table>
      <div class="uk-padding-small">
        <a href="home-admin.php" class="uk-button uk-button-primary">Volver</a>

        <a href="pantalla-agregar-residencia.php" class="uk-button uk-button-primary">Agregar</a>
      </div>
    </div>
  </body>
</html>
