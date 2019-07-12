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
      $puja_minima=$paquete['precio_base'];
     ?>

     <div class="uk-child-width-1-3 uk-padding" align="" uk-grid>
       <div class="uk-card uk-card-default uk-width-2-3">
         <div class="uk-card-media-left">
           <img src='data:image/jpeg; base64, <?php echo base64_encode($residencia['imagen']); ?>' alt="Aca va una imagen"/>
         </div>
         <div class="uk-width-expand">
           <div class="uk-card-header">
             <h3><?php echo $residencia['nombre']; ?></h3>
           </div>
           <div class="uk-card-body">
             <?php echo "Descripción: ".$residencia['descripcion']; ?>
           </div>
           <div class="uk-card-footer">
             <?php
             $ubicacion="Ubicación: ".$residencia['ciudad'].", ".$residencia['provincia'].", ".$residencia['pais'];
             echo $ubicacion; ?>
           </div>
         </div>
       </div>

       <div class="uk-card uk-card-body uk-card-default">
         <h2 class="uk-card-title">
           <?php echo "Semana: ".$paquete["semana"]; ?>
         </h2>
         <div class="uk-badge uk-card-badge uk-border-rounded">
           <?php echo $paquete["estado"]; ?>
         </div>

         <div class="">
           <h1 class="uk-align-right">
             <?php echo "$".$paquete["precio_base"]; ?>
           </h1>

           <?php $color_boton="light-blue";
           if($paquete['estado']=='SUBASTA') {?>
             <div class="">


             </div>
             <button type="button" class="uk-button uk-button-primary uk-border-rounded uk-width-expand toggle" uk-toggle="target: .toggle">
               Pujar
             </button>
             <div class="toggle uk-padding uk-padding-remove-horizontal" hidden>
               <div class="">
                 <h3>Ingrese su puja</h3>
               </div>

               <form class="" action="../controladores/controlSubasta.php" method="post">
                 <input type="number" name="nuevo-precio" value="" min="<?php echo $puja_minima+50 ?>" placeholder="Minima puja de $<?php echo $puja_minima+50; ?>" class="uk-input uk-width-1-1" required>
                 <div class="uk-child-width-1-2 uk-padding uk-padding-remove-horizontal uk-margin-left" uk-grid>
                   <input type="button" name="cancelar" value="cancelar" class="uk-button uk-button-primary" uk-toggle="target: .toggle" style="background-color:red;">
                   <input type="submit" name="pujar" value="pujar" class="uk-button uk-button-primary">
                 </div>
               </form>
             </div>
           <?php }?>
         </div>
         <br>
         <div class="uk-card-footer">
           <p>
             Recuerde que para pujar debe: <br>
             - Contar con al menos 1 credito. <br>
             - Pujar sobre el minimo de puja. <br>
             - Tener una tarjeta de credito valida.
           </p>
         </div>
         <div id="escondido">
          	   <input name="id" value="<?php echo $paquete['id']; ?>">
          	</div>
       </div>

     </div>
  </body>
</html>
