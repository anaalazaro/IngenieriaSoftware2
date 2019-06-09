<?php //header('location: home-user.php')?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <title>Login Usuario</title>
  </head>
  <body class="uk-height-viewport my-background-color">
    <div class="">
      <div class="uk-position-center my-form-box uk-padding-small">
        <div class="uk-width-1-1">
          <h1 align="center">Inicio de sesion Usuarios  </h1>
        </div>
        <center>
          <img src="../files/hsh-logo.png"width="250" height="250" >
        </center>
          <form action="../controladores/validarUsuario.php" method="get" class="uk-form uk-padding-small uk-padding-remove-bottom"> <!--comienzo de formulario-->
            <!--<div class="">
              <p class="uk-text-lead">Ingrese su codigo de acceso</p>
            </div>-->
            <div class="uk-width-1-1 uk-padding-small">
              <input type="email" name="mail" class="uk-input uk-form-large" placeholder="E-Mail" required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="password" name="contrasenia" class="uk-input uk-form-large" placeholder="Contraseña" required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="submit" value="ingresar" class="uk-width-1-1 uk-button uk-button-primary"></input>
            </div>
          </form> <!--fin de formulario-->

          <!--formulario para boton de registrar usuario-->
          <form action="pantalla-register.php" method="get" class="uk-form uk-padding-small uk-padding-remove-top">
              <div class="uk-padding-small">
                <input type="submit" value="registrarme" class="uk-width-1-1 uk-button uk-button-default"></input>
              </div>
          </form>
      </div>
      <!--FIN box de login con codigo-->
    </div>
  </body>
</html>
