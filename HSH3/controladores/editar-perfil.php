<?php
include('../modelos/conexion.php');
include('../modelos/funciones-usuarios.php');
$conexion=conectar();
$mail=$_GET['mail'];
//echo $mail;
$mostrar= getUsuario($conexion,$mail);





?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <title>Registro Usuario</title>
  </head>
  <body class="uk-height-viewport my-background-color">
    <div class="">
      <div class="uk-panel uk-border-rounded" style="background-color:white;">
        <div class="uk-width-1-1">
          <h1 align="center">Editar informacion de perfil</h1>
        </div>
        <center>
          <img src="../files/hsh-logo.png"width="250" height="250" >
        </center>
      </div>
      <div class="uk-padding">
        <div class="uk-panel uk-padding-small uk-border-rounded" style="background-color:white;">
          <form action="../controladores/validarEditarPerfil.php" method="post" enctype="multipart/form-data" class="uk-form uk-padding-small uk-padding-remove-bottom"> <!--comienzo de formulario-->
            <!--Agregar una foto -->
             <div class="uk-width-1-1 uk-padding-small">
             <label for="foto">
              Imagen:</label>
              <input id="foto" name="foto" type="file" size="20" accept="image/*" class="uk-input" >
          <!--<button  class="uk-width-1-1 uk-button uk-button-default" type="button" tabindex="-1">Seleccionar Fotos</button>-->
              </div>

            <!-- Datos nombre-->
            <div class="uk-width-1-1 uk-padding-small">
              <label>Nombre:</label>
              <input type="nombre" name="nombre" class="uk-input " placeholder="Nombre" value="<?php echo($mostrar['nombre_usuario']);?>" required>
            </div>

            <!-- Datos apellido-->
            <div class="uk-width-1-1 uk-padding-small">
              <label>Apellido:</label>
              <input type="apellido" name="apellido" class="uk-input" placeholder="Apellido"   value="<?php echo $mostrar['apellido_usuario'] ;?>" required>
            </div>
            <!-- Datos nacimiento-->
            <div class="uk-width-1-1 uk-padding-small">
              <label>Fecha de nacimiento:</label>
              <input id="nac" type="date" name="edad" class="uk-input " placeholder="Fecha de nacimiento"  value="<?php echo $mostrar['fecha_nacimiento']; ?>" required>
            </div>


            <!-- Datos telefno-->
            <div class="uk-width-1-1 uk-padding-small">
               <label>Telefono:</label>
              <input type="telefono" name="telefono" class="uk-input " placeholder="Telefono"  value="<?php echo $mostrar['telefono']; ?>" required>
            </div>

            <!-- Datoslocalidad -->
             <div class="uk-child-width-expand@s uk-padding-small" uk-grid>
            <div class="uk-width-1-3 ">
               <label>Localidad:</label>
              <input type="localidad" name="localidad" class="uk-input " placeholder="Localidad"  value="<?php echo $mostrar['localidad']; ?>" required>
            </div >
            <div class="uk-width-1-3">
               <label>Direccion:</label>
              <input type="direccion" name="direccion" class="uk-input " placeholder="Direccion"  value="<?php echo $mostrar['direccion']; ?>" required>
            </div>
           </div>

           <!-- Datos tarjeta-->
            <div class="uk-child-width-expand@s uk-padding-small" uk-grid>
            <div class="uk-width-1-3 ">
               <label>Numero de tarjeta:</label>
              <input type="tarjeta" name="tarjeta_numero" class="uk-input " placeholder="Numero"  value="<?php echo $mostrar['tarjeta_numero']; ?>"required>
            </div>
            <div class="uk-width-1-3" >
              <label>Codigo de tarjeta:</label>
              <input type="tarjeta" name="tarjeta_codigo" class="uk-input " placeholder="Codigo" value="<?php echo $mostrar['tarjeta_codigo']; ?>" required>
            </div>
            <div class="uk-width-1-3">
              <label>Fecha de vencimiento:</label>
              <input type="date" data-uk-datepicker="{format:'MM.YYYY'}" name="tarjeta_vencimiento" class="uk-input " placeholder="Vencimiento"  value="<?php echo $mostrar['tarjeta_vencimiento']; ?>" required>
            </div>
          </div>

          <!-- Datos email-->
           <div class="uk-width-1-1 uk-padding-small">
               <label>E-mail:</label>
              <input type="email" name="mail" class="uk-input" placeholder="E-Mail" value="<?php echo $mostrar['mail']; ?>"  required> <!-- campo del formulario-->
            </div>

            <!-- Datos paass-->
            <div class="uk-width-1-1 uk-padding-small">
               <label>Contraseña:</label>
              <input type="password" name="contrasenia" class="uk-input " placeholder="Contraseña" value="<?php echo $mostrar['contrasenia']; ?>"  required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <label>Repita contraseña:</label>
              <input type="password" name="contrasenia-copia" class="uk-input " placeholder="Ingrese otra vez la contraseña" required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="submit" value="Guardar cambios" class="uk-width-1-1 uk-button uk-button-primary"></input>
            </div>
            <div class="uk uk-width-1-1 uk-padding-small">
             <a  class="uk-width-1-1 uk-button uk-button-primary" href="../vistas/home-user.php"> Cancelar</a>
            </div>

          </form> <!--fin de formulario-->


         <!--<form action="pantalla-login.php" method="get" class="uk-form uk-padding-small uk-padding-remove-top">
              <div class="uk-padding-small">
                <input type="submit" value="ya tengo cuenta" class="uk-width-1-1 uk-button uk-button-default"></input>
              </div>
          </form> -->
        </div>
      </div>
    </div>
  </body>
</html>
