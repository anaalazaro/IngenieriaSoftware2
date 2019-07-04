<?php
include('../controladores/controlBusqueda.php');
include('../controladores/controlPaquetes.php');
?>

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
    if (isset($_GET['id'])) {
      $resultado = buscarResidenciaPorId($_GET['id']);
      $residencia = mysqli_fetch_array($resultado);

      $contenido=$residencia["imagen"]
      ?>

      <div class="uk-padding-large uk-padding-remove-bottom">
        <div class="uk-card uk-card-default uk-border-rounded" uk-grid>
          <div class="uk-card-media-left uk-width-1-4">
            <img src='data:image/jpeg; base64, <?php echo base64_encode($contenido); ?>' alt="Aca va una imagen" />
          </div>
          <div class="uk-width-expand">
            <div class="uk-card-header">
              <h3><?php echo ucwords($residencia['nombre']); ?></h3>
            </div>
            <div class="uk-card-body">
              <?php echo "Descripción: ".$residencia['descripcion']; ?>
            </div>
            <div class="uk-card-footer">
              <?php  echo "Ubicación: ".ucwords($residencia['ciudad']).", ".ucwords($residencia['provincia']).", ".ucwords($residencia['pais']); ?>
            </div>
          </div>
        </div>
      </div>

      <!-- LISTA DE PAQUETES DE ESTA RESIDENCIA -->
      <div class="uk-padding">
    <?php
    }

    $paquetes = getPaquetesPorIdDeResidencia($residencia['id']);
    if ($paquetes) {
      ?>
      <div class="uk-tile uk-tile-default uk-tile-small uk-border-rounded">
        <h4 class="uk-position-center">Paquetes de esta residencia</h4>
      </div>
      <div class="uk-child-width-1-4 uk-padding" uk-grid>
        <?php
        while ($paquete = mysqli_fetch_array($paquetes)) {
          ?>
          <div class="uk-card uk-card-default uk-padding uk-border-rounded">
            <div class="uk-card-title">
              <?php echo $paquete['semana']; ?>
            </div>
            <div class="uk-card-badge">
              <span class="uk-badge">
                <?php echo $paquete['estado']; ?>
              </span>
            </div>
            <div class="uk-card-footer">
              <a href="detalle-paquete-user.php?id=<?php echo $paquete['id']; ?>">ver detalle</a>
            </div>
          </div>
          <?php
        }?>
      </div>
      <?php
    }else {
      ?>
      <div class="uk-tile uk-tile-default uk-tile-small uk-border-rounded">
        <p class="uk-position-center">Por el momento esta residencia no tiene paquetes disponibles</p>
      </div>
      <?php
    }
    ?>
    </div>

  </body>
</html>
