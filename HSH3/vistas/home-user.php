<?php session_start(); 
  include('../modelos/conexion.php');

  $conexion=conectar();
  $id = $_SESSION['id'];
  $consulta= "SELECT * FROM usuario WHERE id=$id";
  $result=mysqli_query($conexion,$consulta);
  $row = mysqli_fetch_array($result);
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
                <li class="uk-nav-divider"></li>
                <li class="uk-nav-header">Sesión</li>
                <li><a href="../modelos/cerrar-sesion.php">Cerrar Sesión</a></li>
              </ul>
            </div>
        </ul>
      </div>
    </nav>

    <div class="uk-child-width-expand@s uk-text-center uk-padding" uk-grid>
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-card-hover">
          <h3 class="uk-card-title">Ver  Residencias Disponibles</h3>
          <p><a href="../vistas/listar-residencias-user.php">click aquí</a></p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-card-hover">
          <h3 class="uk-card-title">Ver Subastas en curso</h3>
          <p><a href="pantalla-subastas-en-curso.php">click aquí</a></p>
        </div>
      </div>
     <?php  if ($row['premium']==1){
     ?>
      <div>
        <div class="uk-card uk-card-default uk-card-body uk-card-hover">
          <div class="uk-card-badge uk-label">premium</div>
          <h3 class="uk-card-title">Mis paquetes</h3>
          <p><a href="../controladores/controlVerReservas.php?id=<?php echo $_SESSION['id']; ?>">click aquí</a></p>
        </div>
      </div>
    <?php }?>
    </div>



<!--
    CUERPO
    <div class="uk-text-center" uk-grid>
      <div class="uk-width-1-5@m">
        <ul class="uk-nav uk-nav-default uk-padding">
          <li class="uk-active uk-padding"><a href="#">Active</a></li>
          <li><a href="#">Item</a></li>
          <li><a href="#">Item</a></li>
        </ul>
      </div>
      <div class="uk-width-expand">
        BARRA DE BUSQUEDA
        <div class=" uk-child-width-expand uk-text-center uk-padding-small" uk-grid>
          <form class="uk-search uk-search-large">
            <a href="" class="uk-search-icon-flip" uk-search-icon></a>
            <input class="uk-search-input uk-border-rounded" style="background-color:white;" type="search" placeholder="Buscar...">
          </form>
        </div>
        <div class="uk-card uk-card-default uk-card-body">Item</div>
      </div>
    </div>
-->

  </body>
</html>
