<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Mi Plan</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="../controladores/botonPremium.js"></script>
  </head>

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
              <li><a href="miPlan.php">Mi Plan</a></li>
              <li class="uk-nav-divider"></li>
              <li class="uk-nav-header">Sesión</li>
              <li><a href="../modelos/cerrar-sesion.php">Cerrar Sesión</a></li>
            </ul>
          </div>
      </ul>
    </div>
  </nav>

 <?php
 session_start();
  include('../modelos/conexion.php');

  $conexion=conectar();
  $id = $_SESSION['id'];
  $consulta= "SELECT * FROM usuario WHERE id=$id";
  $result=mysqli_query($conexion,$consulta);
  $row = mysqli_fetch_array($result);

  if ($row['premium']==1 or $row['premium']==3) {
    $subscripcion = "Usuario Premium";
  }
  else{
    $subscripcion = "Usuario Básico";
  }
  $consulta1="SELECT * FROM precios";
  $enviar= mysqli_query($conexion,$consulta1);
  $row1=mysqli_fetch_array($enviar);
  ?>

 <body class="uk-height-viewport my-background-color">
    <div class="uk-padding-large uk-padding-remove-bottom">
      <div class=" uk-border-rounded" uk-grid>
        <div class=" uk-card-default uk-position-center uk-padding">
          <div class="uk-card-header">
            <h3><?php echo "PLAN DE USUARIO";?></h3>
           
          </div>
          <div class="uk-align-left">
             <p><label>Usuario: </label><?php echo $mail=$row['mail']; ?></p>
            <p><label>Tipo de Usuario: </label><?php echo $subscripcion; ?></p>
            <p><label>Precio: $</label><?php echo $row1['basico']; ?></p>
          </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
