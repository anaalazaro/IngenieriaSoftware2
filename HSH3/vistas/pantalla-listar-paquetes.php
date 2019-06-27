<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listar Paquetes</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
 <script type="text/javascript" src="../controladores/validar_eli.js"></script>
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
	include('../modelos/get_format.php');

    $conexion=conectar();
    $consulta= "SELECT * FROM paquete";
    $result=mysqli_query($conexion,$consulta);

    mysqli_close($conexion);?>

    <div class="uk-padding uk-margin-left">
      <div class="uk-tile uk-tile-default uk-width-1-1 uk-child-width-1-2 uk-padding-remove" uk-grid>
        <div class="uk-child-width-1-4" uk-grid>
          <div class="">ID</div>
          <div class="">Nombre</div>
          <div class="">Semana</div>
          <div class="">Usuario</div>
        </div>
        <div class="uk-child-width-1-2 uk-margin-remove-top" uk-grid>
          <div class="">Estado</div>
          <div class="">Entra en subasta</div>
        </div>
      </div>
      <?php
      while ($row = mysqli_fetch_array($result)) {
        $id_paquete=$row['id'];
        ?>
        <div class="uk-tile uk-tile-default uk-width-1-1 uk-child-width-1-2 uk-padding-remove uk-margin-small-top" uk-grid>
          <div class="uk-child-width-1-4" uk-grid>
            <div class=""><?php echo $row['id']; ?></div>
            <div class=""><?php echo $row['nombre_res']; ?></div>
            <div class=""><?php echo $row['semana']; ?></div>
            <div class=""><?php echo $row['id_usuario']; ?></div>
          </div>
          <div class="uk-child-width-1-2 uk-margin-remove-top" uk-grid>
            <div class=""><?php echo $row['estado']; ?></div>
            <div class="">
              <?php
              if ($row['estado']=='ACTIVO'){
                $date1 = new DateTime("now");
                $dt=$row['semana'];
                $dt_subasta=date("Y-m-d", strtotime("$dt -6 month"));
                $date2 = new DateTime($dt_subasta);
                $diff = $date1->diff($date2);
                $tiempo_restante=get_format($diff);
              }else {
                $tiempo_restante = "no aplica";
              }
              ?>
              <?php echo $tiempo_restante;?>
            </div>
          </div>

        </div>
        <?php
      }
       ?>
    </div>



  </body>
</html>
