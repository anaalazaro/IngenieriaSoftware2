<?php $id = $_GET['id_usuario']; ?>

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Mi Perfil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="../controladores/botonPremium.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">
    <nav class="uk-navbar-container" style="background-color:white" uk-navbar>
      <div class="uk-navbar-left uk-padding-remove-vertical uk-padding">
      <a href="../vistas/home-user.php" class="uk-button uk-button-primary uk-border-rounded">Volver al Home</a>
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
                <li><a href="..\vistas\pantalla-perfil-usuario.php">Mi Perfil</a></li>
                <li><a href="#">Mis Subastas</a></li>
                <li><a href="#">Mi Plan</a></li>
                <li class="uk-nav-divider"></li>
                <li class="uk-nav-header">Sesión</li>
                <li><a href="../modelos/cerrar-sesion.php">Cerrar Sesión</a></li>
              </ul>
            </div>
        </ul>
      </div>
    </nav>

    <div class="uk-position-center">
      <div class="uk-tile uk-tile-default uk-border-rounded">
        <div class="uk-width-1-1">
          <h2>Esta a punto de solicitar la baja de su cuenta</h2>
          <h3>
            Si hace click en confirmar, se enviara una solicitud al administrador para que le otorgue la baja.
            Ademas, debe ser un usuario basico y no tener paquetes ganados.
          </h3>
          <h3>(Esta accion no se puede deshacer)</h3>
        </div>
        <div class="uk-child-width-1-2 uk-margin" uk-grid>
          <a href="../controladores/controlBaja.php?id=<?php echo $id; ?>" class="uk-button uk-button-danger" style="background-color:red">Confirmar eliminacion</a>
          <a href="javascript: window.history.back()" class="uk-button uk-button-primary" style="background-color:green;">Cancelar y volver atras</a>
        </div>
      </div>
    </div>


  </body>
</html>
