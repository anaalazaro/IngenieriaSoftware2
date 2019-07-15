<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">
    <nav class="uk-navbar-container" style="background-color:white" uk-navbar>
      <div class="uk-navbar-center">

        <ul class="uk-navbar-nav">

            <li><a href="pantalla-listar-residencias.php">Residencias</a>
               <div class="uk-navbar-dropdown">
                <ul class=" uk-nav uk-navbar-dropdown-nav">
                  <li><a href="pantalla-listar-residencias.php">Lista de residencias</a></li>
                </ul>
              </div>
            </li>
            <li><a href="pantalla-listar-subastas.php">Subastas</a>
              <div class="uk-navbar-dropdown">
                <ul class=" uk-nav uk-navbar-dropdown-nav">
                  <li><a href="pantalla-listar-subastas.php">Lista de subastas</a></li>
                </ul>
              </div>
            </li>
          <li><a href="pantalla-listar-administradores.php">Administradores</a>
             <div class="uk-navbar-dropdown">
                <ul class=" uk-nav uk-navbar-dropdown-nav">
                  <li><a href="pantalla-listar-administradores.php">Lista de administradores</a></li>
                </ul>
              </div> 
            </li> 
            <li><a href="pantalla-listar-usuarios.php"> Usuarios</a>
              <div class="uk-navbar-dropdown">
                <ul class=" uk-nav uk-navbar-dropdown-nav">
                  <li><a href="pantalla-listar-usuarios.php">Lista de usuarios</a></li>
                  <li><a href="pantalla-solicitudes"> Solicitudes</a></li>
                </ul>
              </div>
            </li>
           <li><a href="pantalla-listar-paquetes.php">Paquetes</a>
             <div class="uk-navbar-dropdown">
                <ul class=" uk-nav uk-navbar-dropdown-nav">
                  <li><a href="pantalla-listar-paquetes.php">Lista de paquetes</a></li>
                </ul>
              </div> 
            </li> 
            <li><a href="pantalla-configurar-precios.php">Configurar precios</a></li> 

            <li><a href="../modelos/cerrar-sesion.php"> Cerrar Sesion</a></li>

        </ul>

      </div>
    </nav>

    <div class="uk-align-center uk-position-center">
      <img src="../files/hsh-logo.png"width="550" height="550" >
    </div>


  </body>
</html>
