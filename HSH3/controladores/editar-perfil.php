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
      <div class="uk-position-center my-form-box uk-padding-small">
        <div class="uk-width-1-1">
          <h1 align="center">Registro de usuarios</h1>
        </div>
        <center>
          <img src="../files/hsh-logo.png"width="250" height="250" >
        </center>
          <form action="../controladores/validarEditarPerfil.php" method="post" class="uk-form uk-padding-small uk-padding-remove-bottom"> <!--comienzo de formulario-->
            <!-- Datos nombre-->
            <div class="uk-width-1-1 uk-padding-small">
              <input type="nombre" name="nombre" class="uk-input " placeholder="Nombre" value="<?php echo($mostrar['nombre_usuario']);?>" required>
            </div>

            <!-- Datos apellido-->
            <div class="uk-width-1-1 uk-padding-small">
              <input type="apellido" name="apellido" class="uk-input" placeholder="Apellido"   value="<?php echo $mostrar['apellido_usuario'] ;?>" required>
            </div>

            <!-- Datos telefno-->
            <div class="uk-width-1-1 uk-padding-small">
              <input type="telefono" name="telefono" class="uk-input " placeholder="Telefono"  value="<?php echo $mostrar['telefono']; ?>" required>
            </div>

            <!-- Datoslocalidad -->
             <div class="uk-child-width-expand@s uk-padding-small" uk-grid>
            <div class="uk-width-1-3 ">
              <input type="localidad" name="localidad" class="uk-input " placeholder="Localidad"  value="<?php echo $mostrar['localidad']; ?>" required>
            </div >
            <div class="uk-width-1-3">
              <input type="direccion" name="direccion" class="uk-input " placeholder="Direccion"  value="<?php echo $mostrar['direccion']; ?>" required>
            </div>
           </div>

           <!-- Datos tarjeta-->
            <div class="uk-child-width-expand@s uk-padding-small" uk-grid>
            <div class="uk-width-1-3 ">
              <input type="tarjeta" name="tarjeta_numero" class="uk-input " placeholder="Numero"  value="<?php echo $mostrar['tarjeta_numero']; ?>"required>
            </div>
            <div class="uk-width-1-3" >
              <input type="tarjeta" name="tarjeta_codigo" class="uk-input " placeholder="Codigo" value="<?php echo $mostrar['tarjeta_codigo']; ?>" required>
            </div>
            <div class="uk-width-1-3">
              <input type="date" data-uk-datepicker="{format:'MM.YYYY'}" name="tarjeta_vencimiento" class="uk-input " placeholder="Vencimiento"  value="<?php echo $mostrar['tarjeta_vencimiento']; ?>" required>
            </div>
          </div>

          <!-- Datos email-->
           <div class="uk-width-1-1 uk-padding-small">
              <input type="email" name="mail" class="uk-input" placeholder="E-Mail" value="<?php echo $mostrar['mail']; ?>"  required> <!-- campo del formulario-->
            </div>

            <!-- Datos paass-->
            <div class="uk-width-1-1 uk-padding-small">
              <input type="password" name="contrasenia" class="uk-input " placeholder="Contraseña" value="<?php echo $mostrar['contrasenia']; ?>"  required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="password" name="contrasenia-copia" class="uk-input " placeholder="Ingrese otra vez la contraseña" required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="submit" value="Guardar cambios" class="uk-width-1-1 uk-button uk-button-primary"></input>
            </div>
            <div class="uk uk-width-1-1 uk-padding-small">
             <a  class="uk-width-1-1 uk-button uk-button-primary" href="../vistas/pantalla-login.php"> Ya tengo cuenta</a>
            </div>

          </form> <!--fin de formulario-->


         <!--<form action="pantalla-login.php" method="get" class="uk-form uk-padding-small uk-padding-remove-top">
              <div class="uk-padding-small">
                <input type="submit" value="ya tengo cuenta" class="uk-width-1-1 uk-button uk-button-default"></input>
              </div>
          </form> -->
      </div>
    </div>
  </body>
</html>