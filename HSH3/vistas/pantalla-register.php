<?php //header('location: home-user.php')?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <script src="../controladores/validarNac.js"></script>
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
            <!-- Datos nombre-->
            <label>Nombre:</label>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="nombre" name="nombre" class="uk-input " placeholder="Nombre" required>
            </div>

            <!-- Datos apellido-->
            <label>Apellido:</label>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="apellido" name="apellido" class="uk-input" placeholder="Apellido" required>
            </div>
             <!-- Datos nacimiento-->
            <label>Fecha de nacimiento:</label>
            <div class="uk-width-1-1 uk-padding-small">
              <input id="nac" type="date" name="edad" class="uk-input " placeholder="Fecha de nacimiento" required>
            </div>


            <!-- Datos telefno-->
            <label>Telefono:</label>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="telefono" name="telefono" class="uk-input " placeholder="Telefono" required>
            </div>

            <!-- Datoslocalidad -->
             <div class="uk-child-width-expand@s uk-padding-small" uk-grid>
            <div class="uk-width-1-3 ">
               <label>Localidad:</label>
              <input type="localidad" name="localidad" class="uk-input " placeholder="Localidad" required>
            </div >
            <div class="uk-width-1-3">
               <label>Direccion:</label>
              <input type="direccion" name="direccion" class="uk-input " placeholder="Direccion" required>
            </div>
           </div>

           <!-- Datos tarjeta-->
            <div class="uk-child-width-expand@s uk-padding-small" uk-grid>
            <div class="uk-width-1-3 ">
              <label>Numero de tarjeta:</label>
              <input type="tarjeta" name="tarjeta_numero" class="uk-input " placeholder="Numero" required>
            </div>
            <div class="uk-width-1-3" >
              <label>Codigo de tarjeta:</label>
              <input type="tarjeta" name="tarjeta_codigo"  class="uk-input " placeholder="Codigo" required>
            </div>
            <div class="uk-width-1-3">
              <label>Vencimiento de la tarjeta:</label>
              <input type="date" data-uk-datepicker="{format:'MM.YYYY'}" name="tarjeta_vencimiento" class="uk-input " placeholder="Vencimiento" required>
            </div>
          </div>

          <!-- Datos email-->
          <label>E-mail:</label>
           <div class="uk-width-1-1 uk-padding-small">
              <input type="email" name="mail" class="uk-input" placeholder="E-Mail" required> <!-- campo del formulario-->
            </div>

            <!-- Datos paass-->

            <div class="uk-width-1-1 uk-padding-small">
              <label>Contraseña:</label>
              <input type="password" name="contrasenia" class="uk-input " placeholder="Contraseña" required> <!-- campo del formulario-->
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <label>Repita contraseña:</label>
              <input type="password" name="contrasenia-copia" class="uk-input " placeholder="Ingrese otra vez la contraseña" required> <!-- campo del formulario-->
            </div>
            <div>
              <label><input type="checkbox" id="cbox1" value="first_checkbox"> Aceptar contrato</label><br>
            </div>
            <div class="uk-width-1-1 uk-padding-small">
              <input type="submit" value="registrarme" class="uk-width-1-1 uk-button uk-button-primary" onclick="aceptar();"></input>
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
