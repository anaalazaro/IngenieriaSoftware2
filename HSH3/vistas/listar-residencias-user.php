<?php
include('../controladores/controlBusqueda.php');
include('../controladores/controlLocalidades.php');
?>

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

    <div class="uk-padding uk-background-default" uk-grid>
      <div class="">
        <span uk-search-icon></span>
      </div>
      <div class="uk-width-expand">
        <ul class="uk-subnav uk-subnav-pill" <?php if(isset($_GET['pais'])){echo "active=2";} ?> uk-switcher>
          <li><a href="#">Nombre</a></li>
          <li><a href="#">Descripcion</a></li>
          <li><a href="#">Localidad</a></li>
          <li><a href="#">Semana</a></li>
        </ul>

        <ul class="uk-switcher uk-margin">
          <li>
            <div class="uk-search uk-search-default uk-width-expand">
              <form class="" action="../vistas/listar-residencias-user.php" method="get">
                <input name="busqueda_nombre" class="uk-search-input" type="search" placeholder="Buscar por nombre de residencia...">
              </form>
            </div>
          </li>
          <li>
            <div class="uk-search uk-search-default uk-width-expand">
              <form class="" action="../vistas/listar-residencias-user.php" method="get">
                <input name="busqueda_descripcion" class="uk-search-input" type="search" placeholder="Buscar por descripcion de residencia...">
              </form>
            </div>
          </li>
          <li>

            <form id="formulario" class="" action="" method="get">
              <div class="uk-child-width-1-4" uk-grid>
                <div class="">
                  <select name="pais" class="uk-button uk-button-default" onchange="cambioPais()">
                    <script>
                      function cambioPais() {
                        var select_provincia = document.getElementById("select-provincia");
                        select_provincia.value = 0;
                        var formulario = document.getElementById("formulario");
                        formulario.submit();
                      }
                    </script>

                    <?php
                    if (isset($_GET['pais'])) {
                      //$pais_seleccionado = getNombrePaisPorId($_GET['pais']);
                      $id_pais_seleccionado = $_GET['pais'];
                      $nombre_pais_seleccionado = getNombrePaisPorId($id_pais_seleccionado);
                      echo '<option value="'.$id_pais_seleccionado.'" selected>'.$nombre_pais_seleccionado.'</option>';
                    } else {
                      echo '<option value="" selected disabled>-- seleccione un pais --</option>';
                    }
                    $paises = listarPaises();
                    while ($row = mysqli_fetch_array($paises)){
                      $nombre_pais = $row['pais_nombre'];
                      $id_pais = $row['id'];
                      echo "<option value=".$id_pais.">".$nombre_pais."</option>";
                    }?>
                  </select>
                </div>

                <div class="">
                  <select id="select-provincia" name="provincia" class="uk-button uk-button-default" onchange="cambioProvincia()">
                    <script>
                      function cambioProvincia() {
                        var select_ciudad = document.getElementById("select-ciudad");
                        select_ciudad.value = 0;
                        var formulario = document.getElementById("formulario");
                        formulario.submit();
                      }
                    </script>

                    <?php
                    if (isset($_GET['pais'])) {
                      if (isset($_GET['provincia'])) {
                        $nombre_provincia_seleccionada = getNombreProvinciaPorId($_GET['provincia']);
                        $id_provincia_seleccionada = $_GET['provincia'];
                        echo '<option value="'.$id_provincia_seleccionada.'" selected>'.$nombre_provincia_seleccionada.'</option>';
                      } else {
                        echo '<option value="pais" selected disabled>--Seleccione una provincia--</option>';
                      }

                      $provincias = listarProvinciasDe($nombre_pais_seleccionado);
                      while ($row = mysqli_fetch_array($provincias)){
                        $nombre_provincia = $row['provincia_nombre'];
                        $id_provincia = $row['id'];
                        echo "<option value=".$id_provincia.">".$nombre_provincia."</option>";
                      }
                    } else {
                      echo '<option value="pais" selected disabled>--Seleccione una provincia--</option>';
                    }
                     ?>
                  </select>
                </div>
                <div class="">
                  <select id="select-ciudad" name="ciudad" class="uk-button uk-button-default" onchange="this.form.submit()">

                    <?php
                    if (isset($_GET['provincia'])) {
                      if (isset($_GET['ciudad'])) {
                        $id_ciudad_seleccionada = $_GET['ciudad'];
                        $nombre_ciudad_seleccionada = getNombreCiudadPorId($id_ciudad_seleccionada);
                        echo '<option value="'.$id_ciudad_seleccionada.'" selected>'.$nombre_ciudad_seleccionada.'</option>';


                      }else {
                        echo '<option value="pais" selected disabled>--Seleccione una localidad--</option>';
                      }

                      $ciudades = listarCiudadesDe($id_provincia_seleccionada);
                      while ($row = mysqli_fetch_array($ciudades)) {
                        $nombre_ciudad = $row['ciudad_nombre'];
                        $id_ciudad = $row['id'];
                        echo "<option value=".$id_ciudad.">".$nombre_ciudad."</option>";
                      }

                    }else {
                      echo '<option value="pais" selected disabled>--Seleccione una localidad--</option>';
                    }
                     ?>

                  </select>
                </div>
                <div class="">
                  <input type="submit" name="" value="buscar" class="uk-button uk-button-primary">
                </div>
              </div>
            </form>
          </li>
          <li>
            fecha
          </li>
        </ul>
      </div>
    </div>

    <?php

    if (isset($_GET['busqueda_nombre'])) {                               //SI LA BUSQUEDA FUE POR NOMBRE
      $residencias = busquedaPorNombre($_GET['busqueda_nombre']);
    } else {
      if (isset($_GET['busqueda_descripcion'])) {                       // SI LA BUSQUEDA FUE POR DESCRIPCON
        $residencias = busquedaPorDescripcion($_GET['busqueda_descripcion']);
      }else {                                                            // SI NO HAY UNA BUSQUEDA HECHA, MUESTRA TODAS LAS RESIDENCIAS
        $residencias = todasLasResidencias();
      }
    }

    while($row = mysqli_fetch_array($residencias)){
      $contenido=$row["imagen"]?>

      <div class="uk-padding-large uk-padding-remove-bottom">
        <div class="uk-card uk-card-default uk-border-rounded" uk-grid>
          <div class="uk-card-media-left uk-width-1-4">
            <img src='data:image/jpeg; base64, <?php echo base64_encode($contenido); ?>' alt="Aca va una imagen" />
          </div>
          <div class="uk-width-expand">
            <div class="uk-card-header">
              <h3><?php echo ucwords($row['nombre']); ?></h3>
            </div>
            <div class="uk-card-body">
              <?php
                echo ucwords($row['pais']),",",ucwords($row['provincia']);
              ?>
            </div>
            <div class="uk-card-footer">
              <a href="../vistas/detalle-residencia-user.php?id=<?php echo $row['id'] ?>">Conocé más</a>
            </div>
          </div>
        </div>
      </div>
<?php } ?>


  </body>
</html>
