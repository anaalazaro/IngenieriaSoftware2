<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Agregar Residencia</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/personal.css" />
  <script src="../js/uikit.min.js"></script>
  <script src="../js/uikit-icons.min.js"></script>

</head>
  <body class="uk-height-viewport my-background-color">

    <div class="uk-position-center my-form-box">
        <form action="../controladores/registrarAdmin.php" method="post" enctype="multipart/form-data" class="uk-form uk-padding-small" >
          <div class="">
            <p class="uk-text-lead">Agregando nuevo administrador</p>
          </div>

          
         <!-- Datos email-->
          <label>E-mail:</label>
           <div class="uk-width-1-1 uk-padding-small">
              <input type="email" name="mail" class="uk-input" placeholder="E-Mail" required> <!-- campo del formulario-->
            </div>

            <!-- Datos paass-->

            <div class="uk-width-1-1 uk-padding-small">
              <label>Contraseña:</label>
              <input type="password" id="contrasenia" name="contrasenia" class="uk-input " placeholder="Contraseña"  required> <!-- campo del formulario-->
            </div>
            
        

          <!--boton de AGREGAR-->
          <div class="uk-width-1-1 uk-padding-small">
            <input  type="submit" value="agregar administrador" class="uk-width-1-1 uk-button uk-button-primary" ></input>
          </div>

          <!--boton de CANCELAR-->
          <div class="uk-width-1-1 uk-padding-small">
              <a class="uk-width-1-1 uk-button uk-button-primary" href="pantalla-listar-administradores.php">Cancelar</a>

          </div>

        </form>
    </div>
  </body>
</html>
