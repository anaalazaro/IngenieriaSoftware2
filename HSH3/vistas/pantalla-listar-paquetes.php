<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listar Paquetes</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/uikit.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/personal.css" />
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
 <script type="text/javascript" src="../controladores/validar_eli.js"></script>
  </head>
  <body class="uk-height-viewport my-background-color">
    <?php
    include('../modelos/conexion.php');

    $conexion=conectar();
    $consulta= "SELECT * FROM paquete";
    $result=mysqli_query($conexion,$consulta);

    mysqli_close($conexion);?>
    <div class="uk-position-center my-form-box">
    <table class="table table-striped uk-table uk-table-divider uk-align-center">
      <thead>
        <tr>
         <th>Id</th>
          <th>Nombre</th>
          <th>Semana</th>
          <th>Estado</th>
          <th>Usuario</th>
		  <th>Entra en subasta<th>
          
	  <th></th>
	  <th></th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)){
       
        $id_paquete=$row['id'];
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['nombre_res']; ?></td>
          <td><?php echo $row['semana']; ?></td>
          <td><?php echo $row['estado']; ?></td>
          <td><?php echo $row['id_usuario']; ?></td>
		  <td></td>
	  <td><a onclick="eliminarResidencia();" href="../controladores/eliminarRes.php?id_paquete=<?php echo $id_paquete ?>"><span uk-icon="trash"></span></a></td>
        <?php } ?>
        </tr>
      </tbody>
    </table>
      <div class="uk-padding-small">
        <a href="home-admin.php" class="uk-button uk-button-primary">Volver</a>

        <a href="pantalla-crear-paquete.php" class="uk-button uk-button-primary">Agregar</a>
      </div>
    </div>
  </body>
</html>
