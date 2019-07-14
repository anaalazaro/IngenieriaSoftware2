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
        <a href="../vistas/home-user.php" class="uk-button uk-button-primary uk-border-rounded">Volver al home</a>
      </div>
      <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">
            <li><a href="../vistas/home-user.php"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
        </ul>
      </div>
    </nav>

    <?php
    $opcion="";
    if (isset($_GET['filtro'])) {
      $opcion = $_GET['filtro'];
    } ?>

    <div class="uk-padding uk-padding-remove-bottom">
      <form class="" action="listar-paquetes-user.php" method="get">
        <div class="uk-padding-small uk-padding-remove-bottom" uk-grid>
            <select name="filtro" class="uk-select uk-width-1-3" onchange="submit" >
              <option value="todos" <?php if ($opcion=="todos") {echo "selected";} ?>>Todos los Paquetes</option>
              <option value="disponibles" <?php if ($opcion=="disponibles") {echo "selected";} ?>>Paquetes Disponible o Activos</option>
              <option value="subasta" <?php if ($opcion=="subasta") {echo "selected";} ?>>Paquetes En Subasta</option>
              <option value="hotsale" <?php if($opcion=="hotsale"){echo "selected";} ?>>Paquetes en Hotsale</option>
              <option value="reserva" <?php if($opcion=="reserva"){echo "selected";} ?>>Paquetes en Reserva</option>
            </select>
            <button type="submit" name="aplicar-filtro" class="uk-button uk-button-primary">
              aplicar filtro
            </button>
            <div class="uk-width-expand"></div>
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
        case 'subasta':
          $consulta= "SELECT * FROM paquete WHERE estado='SUBASTA'";
          break;
        case 'todos':
          $consulta= "SELECT * FROM paquete";
          break;
        case 'hotsale':
          $consulta= "SELECT * FROM paquete WHERE estado='HOTSALE'";
          break;
        case 'reserva':
          $consulta= "SELECT * FROM paquete WHERE estado='RESERVA'";
          break;
        case 'disponibles':
          $consulta= "SELECT * FROM paquete WHERE estado='RESERVA' OR estado='HOTSALE' OR estado='SUBASTA'";
          break;
      }
    }

    $result=mysqli_query($conexion,$consulta);
    mysqli_close($conexion);?>

    <div class="uk-panel uk-padding uk-margin-left">
      <div class="">
        <table class="uk-table uk-table-divider uk-border-rounded" style="background-color:white">
          <thead>
              <tr>
                  <th>RESIDENCIA</th>
                  <th>SEMANA</th>
                  <th></th>
                  <th>ESTADO</th>
              </tr>
          </thead>
          <tbody>

            <?php
            while ($row = mysqli_fetch_array($result)) {
              $id_paquete=$row['id'];
              $id_residencia = $row['id_res'];
              $conexion = conectar();
              $consulta = "SELECT * FROM residencia WHERE id = '$id_residencia'";
              $residencia = mysqli_fetch_array(mysqli_query($conexion,$consulta));
              mysqli_close($conexion);
            ?>
              <tr>
                <td uk-grid>
                  <div class="uk-width-auto">
                      <img src='data:image/jpeg; base64, <?php echo base64_encode($residencia['imagen']); ?>' class="uk-comment-avatar uk-border-rounded" width="80" height="80" alt="">
                  </div>
                  <h4><?php echo $residencia['nombre']; ?></h4>
                </td>
                <td>
                  <h4><?php echo $row['semana']; ?></h4>
                </td>
                <td>
                  <a href="detalle-paquete-user.php?id=<?php echo $row['id']; ?>">
                    <button type="button" name="button" class="uk-button uk-button-small uk-border-rounded uk-button-primary">ver</button>
                  </a>
                </td>
                <td><?php echo $row['estado']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>

              <?php
              /*
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
               echo $tiempo_restante;
               */
               ?>
