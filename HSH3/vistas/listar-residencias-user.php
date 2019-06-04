<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">

    <nav class="uk-navbar-container" style="background-color:white" uk-navbar>
      <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li><a href="../vistas/home-user.php"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
        </ul>
      </div>
      <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li><a href="#">cerrar sesion</a></li>
        </ul>
      </div>
    </nav>

    <?php
    include('../modelos/conexion.php');

    $conexion=conectar();
    $consulta= "SELECT * FROM residencia ";
    $result=mysqli_query($conexion,$consulta);

    mysqli_close($conexion);?>

    <?php while ($row = mysqli_fetch_array($result)){
      $contenido=$row["imagen"]?>

      <div class="uk-padding-large uk-padding-remove-bottom">
        <div class="uk-card uk-card-default uk-border-rounded" uk-grid>
          <div class="uk-card-media-left uk-width-1-4">
            <img src='data:image/jpeg; base64, <?php echo base64_encode($contenido); ?>' alt="Aca va una imagen" />
          </div>
          <div class="uk-width-expand">
            <div class="uk-card-header">
              <h3><?php echo $row['nombre']; ?></h3>
            </div>
            <div class="uk-card-body">
              <?php echo $row['pais'],",",$row['provincia'];  ?>
            </div>
            <div class="uk-card-footer">
              <a href="#">Conocé más</a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

  </body>
</html>
