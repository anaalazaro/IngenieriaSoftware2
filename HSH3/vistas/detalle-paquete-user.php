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
<form action="../controladores/agregarPuja.php" method="POST">
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

      include("../modelos/funciones-paquetes.php");
      include("../modelos/funciones-residencias.php");
      $id = $_GET['id'];
      $paquete = mysqli_fetch_array(getPaquetePorId($id));
      $residencia = getResidenciaPorId($paquete['id_res']);
     ?>

     <div class="uk-child-width-1-3 uk-padding" align="" uk-grid>
       <div class="uk-card uk-card-default uk-width-2-3" uk-grid>
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
         <div class="uk-badge uk-card-badge uk-border-rounded">
           <?php echo $paquete["estado"]; ?>
         </div>
         <div class="uk-card-body">
           <h1 class="uk-align-right"><?php echo "$".$paquete["precio_base"]; ?></h1>

           <?php $color_boton="light-blue" ?>
           <button type="button" name="subasta" class="uk-button uk-button-primary uk-border-rounded uk-width-expand" style="background-color:<?php echo $color_boton; ?>">
             Reservar
           </button>
           <button type="button" name="subasta" class="uk-button uk-button-primary uk-border-rounded uk-width-expand" style="background-color:<?php echo $color_boton; ?>" onclick="habilitar_pujar('puja')">
             Pujar
           </button>
           <button type="button" name="subasta" class="uk-button uk-button-primary uk-border-rounded uk-width-expand" style="background-color:<?php echo $color_boton; ?>">
             Adquirir
           </button>
           <button type="button" name="subasta" class="uk-button uk-button-muted uk-border-rounded uk-width-expand" style="background-color:<?php echo $color_boton; ?>">
             No disponible
           </button>
         </div>
         <div id="puja" class="uk-width-1-1 uk-padding-small">
			<label>Ingrese subasta:</label>
			 <input type="number" name="puja" class="uk-input " >
			 <button type="submit" class="uk-button uk-button-primary uk-border-rounded uk-width-expand" style="background-color:<?php echo $color_boton; ?>">
             Aceptar
           </button>
		
       </div>
	   <div id="escondido">
	   <input name="id" value="<?php echo $paquete['id']; ?>">
	   </div>
       </div>
       
     </div>
	  </form>
  </body>
</html>
