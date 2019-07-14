
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Reservas</title>
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
    <div class="uk-padding uk-child-width-1-2 uk-grid-small uk-grid-match" uk-grid>
       <?php
        session_start();
        include('../modelos/conexion.php');
        $conexion=conectar();
        $id_user=$_SESSION['id'];
        include("../modelos/funciones-paquetes.php");
       /* $a="SELECT * FROM paquete WHERE id_usuario = '$id_user'";
        $paquetes_del_usuario = mysqli_query($conexion,$a);*/
 
        $consulta= "SELECT * FROM residencia r INNER JOIN  paquete p ON r.id=p.id_res WHERE p.id_usuario = '$id_user'";
        $enviar= mysqli_query($conexion,$consulta);
         if(mysqli_num_rows($enviar)==0){ ?>
           <div class="uk-tile uk-tile-default uk-tile-small uk-border-rounded uk-position-center">
             <h1 >     No tienes paquetes adquiridos,obten tu paquete aquí...     </h1>
             <a href="../vistas/listar-residencias-user.php" style="font-size:30px;text-align: center;  " >Ver residencias </a>
         </div>
          <?php }
        while ($rows=mysqli_fetch_array($enviar)) {
          ?>

          <div class="uk-card uk-card-default uk-card-body uk-width-1-2 " uk-card>
            <div class="uk-card-title">
              <?php echo $rows["nombre"]; ?>
            </div>
            <div class="uk-card-body">
              <?php echo  'Semana: '.$rows["semana"]; ?>
              <div class="uk-float-right">
                <?php// echo "$".$rows["precio_base"]; ?>
              </div>
              <div class="uk-card-footer">
                <a href="../vistas/detalle-paquete-user.php?id=<?php echo $rows['id']; ?>">click aquí para mas información </a>
              </div>
            </div>
          </div>
           <?php
        }
      ?>
    </div>
</html>
