  <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  
  <title>Agregar Residencia</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/personal.css" />
  <script src="../js/uikit.min.js"></script>
  <script src="../js/uikit-icons.min.js"></script>
  <script type="text/javascript" src="validar_agregar.js"></script>
</head>
  <body class="uk-height-viewport my-background-color">

    <div class="uk-position-center my-form-box">
        <form action="../controladores/registrarRes.php" method="post" enctype="multipart/form-data" class="uk-form uk-padding-small" >
          <div class="">
            <p class="uk-text-lead">Agregando nueva residencia</p>
          </div>

          <!--Agregar una foto -->
          <div class="uk-width-1-1 uk-padding-small">
            <label for="foto">
              Imagen:</label>
            <input id="foto" name="foto" type="file" size="20" accept="image/*" class="uk-input" >

          </div>
          <!--agregar nombre-->
          <div class="uk-width-1-1 uk-padding-small">
             <label>Nombre:</label>
            <input id="nombre"  name="nombre" type="text" class="uk-input" placeholder="Nombre de la Residencia"  >
          </div>

          <!--agregar ubicacion-->
          <div class="uk-child-width-expand@s uk-padding-small" uk-grid>

            <!--
              <div class="uk-width-1-3">
              <input id="pais" type="text" name="pais" class="uk-input" placeholder="Pais"  required>
            </div>-->
            <div class="uk-width-1-3">
              <label>Pais:</label>
              <select id="pais"  class="uk-input" name="pais">
                <option>-------</option>
                <option value="argentina" >Argentina</option>
                <option value="brasil">Brasil</option>
                <option value="chile">Chile</option>
                <option value="mexico">Mexico</option>
              </select>
            </div>

            <!-- agregar provincia--->
             <div class="uk-width-1-3">
              <label>Provincia:</label>
              <input id="provincia" type="text" name="provincia" class="uk-input" placeholder="Provincia"  >
            </div>

          <!-- agregar direccion-->
            <div class="uk-width-1-3">
              <label>Direccion:</label>
              <input id="direccion" type="text" name="direccion" class="uk-input" placeholder="Direccion"  >
            </div>


          </div>

          <!--agregar descripcion-->
          <div class="uk-width-1-1 uk-padding-small">
            <label>Descripcion:</label>
            <input id="descripcion" name="descripcion" type="text" class="uk-input" placeholder="Breve Descripcion"   required>
          </div>

          <!--boton de AGREGAR-->
          <div class="uk-width-1-1 uk-padding-small">
            <input  type="submit" value="agregar residencia" class="uk-width-1-1 uk-button uk-button-primary" onclick=" return validarAgregar();"></input>
          </div>

          <!--boton de CANCELAR-->
          <div class="uk-width-1-1 uk-padding-small">
              <a class="uk-width-1-1 uk-button uk-button-primary" href="home.php">Cancelar</a>

          </div>

        </form>
    </div>
  </body>
</html>
