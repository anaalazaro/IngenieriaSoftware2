<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <link rel="stylesheet" type="text/css" href="../css/subasta.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <script src="../controladores/habilitarPujar.js"></script>
    <script src="../controladores/confirmar.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">
    <nav class="uk-navbar-container" style="background-color:white" uk-navbar>
      <div class="uk-navbar-left uk-padding-small">
        <a href="../vistas/listar-paquetes-user.php" class="uk-button uk-button-primary uk-border-rounded">Volver atras</a>
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

    <?php

    /*  ESTADOS DE UN PAQUETE

          RESERVA     -> un paquete que se encuentra disponible para ser reservado
          RESERVADO   -> un paquete que fue adquirido en tiempo de reserva
          SUBASTA     -> un paquete que paso el tiempo de reserva y nadie lo adquirio
          SUBASTADO   -> un paquete que paso el tiempo de subasta y alguien lo adquirio
          ESPERA      -> un paquete que paso el tiempo de subasta y nadie lo adquirio
          HOTSALE     -> un paquete que estaba en espera y fue seleccionado para hotsale
          LIQUIDADO   -> un paquete en hotsale que fue adquirido por alguien
          CADUCADO    -> cualquier paquete cuando pasa su fecha de uso

    */
      include("../modelos/conexion.php");
      include("../modelos/funciones-paquetes.php");
      include("../modelos/funciones-residencias.php");
      $id = $_GET['id'];
      $conexion=conectar();
      $paquete = mysqli_fetch_array(getPaquetePorId2($id,$conexion));
      $residencia = getResidenciaPorId($paquete['id_res']);
      session_start();
      $id=$_SESSION['id'];
      $consulta= "SELECT * FROM usuario WHERE id='$id'";
      $result=mysqli_query($conexion,$consulta);
      $row = mysqli_fetch_array($result);
     ?>

     <div class="uk-child-width-1-3 uk-padding" align="" uk-grid>
       <div class="uk-card uk-card-default uk-width-2-3">
         <div class="uk-card-media-left">
           <img src='data:image/jpeg; base64, <?php echo base64_encode($residencia['imagen']); ?>' alt="Aca va una imagen" />
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

       <div class="uk-card uk-card-body uk-card-default">
         <h2 class="uk-card-title">
           <?php echo "Semana: ".$paquete["semana"]; ?>
         </h2>
         <div class="uk-badge uk-card-badge uk-border-rounded uk-label-danger" >
           <?php echo $paquete["estado"]."!"; ?>
         </div>
         <div class="uk-card-body">
           <h1 class="uk-align-right">
             <?php echo "$".$paquete["precio_base"]; ?>
           </h1>

           <?php
           $color_boton="light-blue";
           if($paquete['estado']=='HOTSALE'){
             ?>
           <button uk-toggle="target: #confirmacion" type="button" class="uk-button uk-button-danger uk-border-rounded uk-width-expand" style="background-color:<?php echo $color_boton; ?>">
             Adquirir Hotsale
           </button>
           <div id="confirmacion" uk-modal>
               <div class="uk-modal-dialog uk-modal-body">
                   <h2 class="uk-modal-title">Esta seguro que desea adquirir este paquete?</h2>
                   <div class="uk-width-auto uk-padding">
                     <img  class="uk-comment-avatar uk-border-rounded" width="" height="" src='data:image/jpeg; base64, <?php echo base64_encode($residencia['imagen']); ?>' alt="Aca va una imagen" />
                   </div>
                   <div class="uk-width-auto" uk-grid>
                     <h3><?php echo $residencia['nombre']; ?></h3>
                     <h3><?php echo $paquete['semana']; ?></h3>
                   </div>
                   <div class="" align="right">
                     <h2 align="right"><?php echo "$".$paquete['precio_base']; ?></h2>
                   </div>


                   <p class="uk-text-right">
                     <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
                     <a href="../controladores/confirmarHotsale.php?id_paquete=<?php echo $paquete['id'] ?>" class="uk-button uk-button-danger" type="button">Confirmar</a>
                   </p>
               </div>
           </div>

            <?php }?>
         </div>
         <div class="uk-card-footer">
           <h4>
             Esta publicacion no consume creditos! <br>
             Al pagar el total, el paquete es tuyo.
           </h4>
         </div>
       </div>

       <div id="escondido">
	        <input name="id" value="<?php echo $paquete['id']; ?>">
	     </div>
      </div>
	  </form>
  </body>
</html>
