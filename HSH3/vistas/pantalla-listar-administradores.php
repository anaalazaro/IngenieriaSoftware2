<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listar Administradores</title>
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


    <div class="uk-padding uk-padding-remove-bottom">
      <form class="" action="pantalla-listar-paquetes.php" >
            <div class="uk-width-expand"></div>
            <button type="button" name="nuevo-admnistrador" onclick="window.location='../vistas/pantalla-crear-administrador.php'" class="uk-button uk-button-primary" style="background-color:green;">
              agregar administrador
            </button>
        
      </form>
    </div>

    <?php
	session_start();
     include('../modelos/conexion.php');
	 include('../modelos/funciones-admin.php');
	 $id=$_SESSION['id'];

    $conexion=conectar();
    $consulta= "SELECT * FROM admin WHERE id<>'$id'";
    $result=mysqli_query($conexion,$consulta);
    mysqli_close($conexion);?>

    <div class="uk-padding uk-margin-left">
      <div class="uk-tile uk-tile-default uk-width-1-1 uk-child-width-1-2 uk-padding-remove" uk-grid>
        <div class="uk-child-width-1-6" uk-grid>
     
          <div class="">Mail</div>
          
        </div>
        
      </div>
      <?php
	  $numrows=mysqli_num_rows($result);
	 if($numrows==0){
		 echo "<label>no hay otros admin</label>";
	 }else{
      while ($row = mysqli_fetch_array($result)) {
		  $id_ad=$row['id'];
        ?>
        <div class="uk-tile uk-tile-default uk-width-1-1 uk-child-width-1-2 uk-padding-remove uk-margin-small-top uk-border-rounded" uk-grid>
          <div class="uk-child-width-1-6" uk-grid>
            
            <div class=""><td><?php echo $row['mail']; ?>
			<a href="../controladores/eliminar-admi.php?id=<?php echo $id_ad ?>">Eliminar<span uk-icon="trash" onclick="return eliminarAdmi();"></span></a></div>
           </td>
          </div>
          <div class="uk-child-width-1-4 uk-margin-remove-top" uk-grid>
            <div class="uk-width-3-4">
	  <?php }
             
              ?>
             
            </div>
            
          </div>

        </div>
        <?php
      }
       ?>
    </div>



  </body>
</html>
