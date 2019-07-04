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
        <a href="../vistas/home-admin.php" class="uk-button uk-button-primary uk-border-rounded">Volver al home</a>
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

    <?php
    while ($row = mysqli_fetch_array($result)){
      $premium = $row['premium'];
      $basico = $row['basico'];
    }
    ?>

    <div class="uk-child-width-1-2 uk-grid-match uk-padding uk-margin" uk-grid>
      <div class="uk-card-small uk-card-default uk-card-body" uk-card>
        <div class="uk-card-title">
          <p>Precio del basico</p>
        </div>
        <div class="uk-card-body">
          <h2><?php echo "$".$basico ?></h2>
        </div>
        <div class="uk-card-footer">
          <button class="toggle-basico uk-button uk-button-primary" type="button" uk-toggle="target: .toggle-basico">Cambiar precio</button>
          <div class="toggle-basico" hidden>
            <form class="" action="../controladores/controlPrecios.php" method="post">
              <input class="uk-input uk-form-width-medium" name="nuevo-precio-basico" type="number" placeholder="Ingrese nuevo precio" required>
              <button type="submit" name="button" class="uk-button" style="background-color: green; color:white;">confirmar</button>
              <button type="reset" name="button" class="uk-button" uk-toggle="target: .toggle-basico" style="background-color: red; color:white;">cancelar</button>
            </form>
          </div>

        </div>
      </div>
      <div class="uk-card-small uk-card-default uk-card-body" uk-card>
        <div class="uk-card-title">
          <p>Precio del premium</p>
        </div>
        <div class="uk-card-body">
          <h2><?php echo "$".$premium ?></h2>
        </div>
        <div class="uk-card-footer">
          <button class="toggle-premium uk-button uk-button-primary" type="button" uk-toggle="target: .toggle-premium">Cambiar precio</button>
          <div class="toggle-premium" hidden>
            <form class="" action="../controladores/controlPrecios.php" method="post">
              <input class="uk-input uk-form-width-medium" name="nuevo-precio-premium" type="number" placeholder="Ingrese nuevo precio" required>
              <button type="submit" name="button" class="uk-button" style="background-color: green; color:white;">confirmar</button>
              <button type="reset" name="button" class="uk-button" uk-toggle="target: .toggle-premium" style="background-color: red; color:white;">cancelar</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    </div>
  </body>
</html>
