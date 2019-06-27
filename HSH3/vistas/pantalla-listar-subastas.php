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
      <div class="uk-navbar-left">
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
                <li><a href="..\vistas\pantalla-perfil-usuario.php">Mi Perfil</a></li>
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
    include('../modelos/conexion.php');

    $conexion=conectar();
    $consulta= "SELECT * FROM paquete WHERE estado='SUBASTA' ";
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
          <th>Precio</th><!--falta x para que termine la subasta-->
      <th>Usuario</th>
      <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)){
      $dt=$row['semana'];
      $id=$row['id']?>
      
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $row['nombre_res']; ?></td>
          <td><?php $dt_subasta_inicio=date("Y-m-d", strtotime("$dt -6 month"));
      echo $dt_subasta_inicio; ?></td>
          <td><?php $dt_subasta_fin=date("Y-m-d", strtotime("$dt_subasta_inicio +3 days"));
      echo $dt_subasta_inicio; ?></td>
         
        <?php } ?>
        </tr>
      </tbody>
    </table>
      <div class="uk-padding-small">
        <a href="home-admin.php" class="uk-button uk-button-primary">Volver</a>
        
      </div>
    </div>
  </body>
</html>
