<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listar Residenciaa</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
 <script type="text/javascript" src="../controladores/validar_eli.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">

    <nav class="uk-navbar-container" style="background-color:white" uk-navbar>
      <div class="uk-navbar-left uk-padding-small">
        <a href="../vistas/home-admin.php" class="uk-button uk-button-primary">Volver al home</a>
      </div>
      <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">
            <li><a href="../vistas/home-admin.php"><img data-src="../files/hsh-logo.png"  width="150" uk-img></a></li>
        </ul>
      </div>
    </nav>

    <?php
    include('../modelos/conexion.php');

    $conexion=conectar();
    $consulta= "SELECT * FROM residencia ";
    $result=mysqli_query($conexion,$consulta);

    mysqli_close($conexion);?>
    <div class="uk-position-center my-form-box">
    <table class="table table-striped uk-table uk-table-divider uk-align-center">
      <thead>
        <tr>
         <th>Imagen</th>
          <th>Nombre</th>
          <th>Pais</th>
          <th>Provincia</th>
          <th>Direccion</th>
          <th>Descripcion</th>
	  <th></th>
	  <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)){
        $contenido=$row["imagen"];
        $nom_residencia=$row['nombre'];
        ?>
        <tr>
          <td><img src='data:image/jpeg; base64, <?php echo base64_encode($contenido); ?>' alt="Aca va una imagen" width="60px"/></td>
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['pais']; ?></td>
          <td><?php echo $row['provincia']; ?></td>
          <td><?php echo $row['ciudad']; ?></td>
          <td><?php echo $row['descripcion']; ?></td>
          <td><a href="../controladores/modificarResidencia.php?nom_residencia=<?php echo $nom_residencia ?>">modificar<span uk-icon="pencil"></span></a></td>
	  <td><a onclick="eliminarResidencia();" href="../controladores/eliminarRes.php?nom_residencia=<?php echo $nom_residencia ?>"><span uk-icon="trash"></span></a></td>
        <?php } ?>
        </tr>
      </tbody>
    </table>
      <div class="uk-padding-small">
        <a href="home-admin.php" class="uk-button uk-button-primary">Volver</a>

        <a href="pantalla-agregar-residencia.php" class="uk-button uk-button-primary">Agregar</a>
      </div>
    </div>
  </body>
</html>
