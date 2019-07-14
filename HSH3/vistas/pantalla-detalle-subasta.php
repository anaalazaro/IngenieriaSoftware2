<?php
 session_start();
    include('../modelos/conexion.php');
    include('../modelos/funciones-subasta.php');
    include('../modelos/funciones-paquetes.php');
    include('../modelos/funciones-residencias.php');
    $conexion=conectar();

?>
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
      <div class="uk-navbar-left uk-padding uk-padding-remove-vertical">
        <button type="button" name="volver-atras" onclick="javascript: history.back()" class="uk-button uk-button-primary uk-border-rounded">
          volver atras
        </button>
      </div>
      <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">
            <li><a href="../vistas/home-user.php"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
        </ul>
      </div>
      <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li><a href="#">OPCIONES</a></li>
            <div uk-dropdown>
              <ul class="uk-nav uk-dropdown-nav">
                <li class="uk-nav-header">Usuario</li>
                <li><a href="#">Mi Perfil</a></li>
                <li><a href="#">Mis Subastas</a></li>
                <li><a href="#">Mi Plan</a></li>
                <li><a href="#">Mi Perfil</a></li>
                <li class="uk-nav-divider"></li>
                <li class="uk-nav-header">Sesión</li>
                <li><a href="../modelos/cerrar-sesion.php">Cerrar Sesión</a></li>
              </ul>
            </div>
        </ul>
      </div>
    </nav>
   <?php
    $id=$_GET['id'];

    $subastas=getSubastaPorId($id,$conexion);
    $paquete=mysqli_fetch_array(getPaquetePorID($id));
    $residencia=getResidenciaPorId($paquete['id_res']);
    mysqli_close($conexion);
?>

    <div class="uk-panel uk-padding uk-margin uk-border-rounded uk-child-width-1-2" style="background-color:white;" uk-grid>
      <div class="">
        <div class="uk-card-media-left uk-child-width-1-2" uk-grid>
          <img src='data:image/jpeg; base64, <?php echo base64_encode($residencia["imagen"]); ?>' alt="Aca va una imagen" class="uk-border-rounded"/>
          <div class="">
            <h2>
              <?php echo $residencia['nombre']; ?>
            </h2>
            <h4>
              <?php echo $residencia['ciudad']; ?>
            </h4>
          </div>
        </div>
        <div class="uk-child-width-1-2" uk-grid>
          <div class="" align="right">
            <h5><?php echo "id del paquete: "?></h5>
            <h5><?php echo "Semana del paquete: "?></h5>
          </div>
          <div class="" align="left">
            <h5><?php echo $paquete['id']?></h5>
            <h5><?php echo $paquete['semana']; ?></h5>
          </div>
        </div>
      </div>

      <table class="table-striped uk-table uk-table-divider uk-table-condensed uk-text-nowrap uk-panel-scrollable">
        <thead>
          <tr>
            <th>Usuario</th>
            <th>fecha de puja</th>
            <th>monto de puja</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include_once('../modelos/funciones-pujas.php');
          include_once('../modelos/funciones-usuarios.php');
          $pujas = getPujasPorIdDePaquete($paquete['id']);
          while ($row=mysqli_fetch_array($pujas)) {
            $usuario = getUsuarioPorId($row['id_usuario']);
            ?>
            <tr>
              <th><?php echo $usuario['mail']; ?></th>
              <th><?php echo $row['fecha']; ?></th>
              <th><?php echo "$".$row['monto']; ?></th>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
  </html>
