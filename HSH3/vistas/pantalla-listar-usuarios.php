<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listar Usuarios</title>
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
    $consulta= "SELECT * FROM usuario";
    $result=mysqli_query($conexion,$consulta);
    mysqli_close($conexion);
    ?>

    <div class="uk-position-center my-form-box">
    <table class="table table-striped uk-table uk-table-divider uk-align-center">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Mail</th>
          <th>Tipo</th>
        </tr>
      </thead>

      <?php while ($row = mysqli_fetch_array($result)) {
        if ($row['premium']) {
          $tipo = "Premium";
        }else {
          $tipo = "Básico";
        }
        ?>
      <tbody>
        <tr>
          <td><?php echo $row['nombre_usuario']; ?></td>
          <td><?php echo $row['apellido_usuario']; ?></td>
          <td><?php echo $row['mail']; ?></td>
          <td><?php echo $tipo; ?></td>
        </tr>
      </tbody>
    <?php } ?>


      <table>
        <div class="uk-padding-small">
          <a href="../vistas/home-admin.php" class="uk-button uk-button-primary">Volver</a>
        </div>
      </table>
    </div>
  </body>
</html>
