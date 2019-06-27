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

    <nav class="uk-navbar-container" style="background-color:white" uk-navbar>
      <div class="uk-navbar-left uk-padding-small">
        <a href="../vistas/home-admin.php" class="uk-button uk-button-primary">Volver al home</a>
      </div>
      <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">
            <li><a href="../vistas/home-admin.php"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
        </ul>
      </div>
    </nav>

    <?php
    include('../modelos/conexion.php');

    $conexion=conectar();
    $consulta= "SELECT * FROM precios ";
    $result=mysqli_query($conexion,$consulta);

    mysqli_close($conexion);?>
    <div class="uk-position-center my-form-box">
    <table class="table table-striped uk-table uk-table-divider uk-align-center">
      <thead>
        <tr>
          <th>Basico</th>
          <th>Premium</th>

        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)){ ?>

        <tr>
          <td><?php echo $row['basico']; ?></td>

          <td><?php echo $row['premium']; ?></td>

        <?php } ?>
        </tr>
      </tbody>
    </table>

      <div class="uk-padding-small">
        <a href="../modelos/funcionModificarBasico.php" class="uk-button uk-button-primary">Modificar Basico</a>
        <a href="funcionModificarPremium.php" class="uk-button uk-button-primary">Modificar Premium</a>
        <a href="home-admin.php" class="uk-button uk-button-primary">Volver</a>

      </div>
    </div>
  </body>
</html>
