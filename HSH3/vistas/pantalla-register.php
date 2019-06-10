<?php //header('location: home-user.php')?>
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
          <form action="../controladores/registrarUsuario.php" method="post" class="uk-form uk-padding-small uk-padding-remove-bottom"> <!--comienzo de formulario-->
            <div class="uk-width-1-1 uk-padding-small">
              <input type="nombre" name="nombre" class="uk-input uk-form-large" placeholder="Nombre" required>
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="apellido" name="apellido" class="uk-input uk-form-large" placeholder="Apellido" required>
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="email" name="mail" class="uk-input uk-form-large" placeholder="E-Mail" required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="password" name="contrasenia" class="uk-input uk-form-large" placeholder="Contraseña" required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="password" name="contrasenia-copia" class="uk-input uk-form-large" placeholder="Ingrese otra vez la contraseña" required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="submit" value="registrarme" class="uk-width-1-1 uk-button uk-button-primary"></input>
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
