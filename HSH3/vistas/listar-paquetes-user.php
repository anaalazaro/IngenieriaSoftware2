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
        <a href="../vistas/home-admin.php" class="uk-button uk-button-primary uk-border-rounded">Volver al home</a>
      </div>
      <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">
            <li><a href="../vistas/home-admin.php"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
        </ul>
      </div>
    </nav>

    <?php
    $opcion="";
    if (isset($_GET['filtro'])) {
      $opcion = $_GET['filtro'];
    } ?>

    <div class="uk-padding uk-padding-remove-bottom">
      <form class="" action="pantalla-listar-paquetes.php" method="get">
        <div class="uk-padding-small uk-padding-remove-bottom" uk-grid>
            <select name="filtro" class="uk-select uk-width-1-3" onchange="submit" >
              <option value="todos" <?php if ($opcion=="todos") {echo "selected";} ?>>Todos los Paquetes</option>
              <option value="finalizados" <?php if ($opcion=="finalizados") {echo "selected";} ?>>Paquetes Finalizados</option>
              <option value="hotsale" <?php if($opcion=="hotsale"){echo "selected";} ?>>Paquetes en Hotsale</option>
            </select>
            <button type="submit" name="aplicar-filtro" class="uk-button uk-button-primary">
              aplicar filtro
            </button>
            <div class="uk-width-expand"></div>
            <button type="button" name="nuevo-paquete" onclick="window.location='../vistas/pantalla-crear-paquete.php'" class="uk-button uk-button-primary" style="background-color:green;">
              agregar paquete
            </button>
        </div>
      </form>
    </div>

    <?php
     include('../modelos/conexion.php');
	 include('../modelos/get_format.php');
	 include('../modelos/fEstado.php');

    $conexion=conectar();
	modificarEstado($conexion);
    $consulta= "SELECT * FROM paquete";
    if (isset($_GET['filtro'])) {
      $opcion=$_GET['filtro'];
      switch ($opcion) {
        case 'finalizados':
          $consulta= "SELECT * FROM paquete WHERE estado='CADUCADO'";
          break;
        case 'todos':
          $consulta= "SELECT * FROM paquete";
          break;
        case 'hotsale':
          $consulta= "SELECT * FROM paquete WHERE estado='HOTSALE'";
          break;
      }
    }

    $result=mysqli_query($conexion,$consulta);
    mysqli_close($conexion);?>

    <div class="uk-padding uk-margin-left">
      <div class="uk-tile uk-tile-default uk-width-1-1 uk-child-width-1-2 uk-padding-remove" uk-grid>
        <div class="uk-child-width-1-6" uk-grid>
          <div class="">ID</div>
          <div class="">Nombre</div>
          <div class="">Semana</div>
          <div class="">Usuario</div>
          <div class="">Estado</div>
        </div>
        <div class="uk-child-width-1-4 uk-margin-remove-top" uk-grid>
          <div class="uk-width-3-4">Entra en subasta</div>
        </div>
      </div>
      <?php
      while ($row = mysqli_fetch_array($result)) {
        $id_paquete=$row['id'];
        $id_residencia = $row['id_res'];
        $conexion = conectar();
        $consulta = "SELECT * FROM residencia WHERE id = '$id_residencia'";
        $residencia = mysqli_fetch_array(mysqli_query($conexion,$consulta));
        mysqli_close($conexion);
        ?>
        <div class="uk-tile uk-tile-default uk-width-1-1 uk-child-width-1-2 uk-padding-remove uk-margin-small-top uk-border-rounded" uk-grid>
          <div class="uk-child-width-1-6" uk-grid>
            <div class=""><?php echo $row['id']; ?></div>
            <div class=""><?php echo $residencia['nombre']; ?></div>
            <div class=""><?php echo $row['semana']; ?></div>
            <div class=""><?php if (($row['id_usuario'])>0) {echo $row['id_usuario'];}else {echo "sin dueño";} ?></div>
            <div class=""><?php echo $row['estado']; ?></div>
          </div>
          <div class="uk-child-width-1-4 uk-margin-remove-top" uk-grid>
            <div class="uk-width-3-4">
              <?php
              if ($row['estado']=='RESERVA'){
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
            <div class="uk-width-1-4">
                <a href="detalle-paquete-admin.php?id_paquete=<?php echo $row['id']; ?>">
                  <button type="button" name="button" class="uk-button uk-button-small uk-border-rounded uk-button-primary">ver</button>
                </a>
            </div>
          </div>

        </div>
        <?php
      }
       ?>
    </div>



  </body>
</html>
