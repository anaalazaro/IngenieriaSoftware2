<?php
include('../modelos/conexion.php');
include('../modelos/funciones-residencias.php');

//BUSQUEDA POR NOMBRE DE RESIDENCIA
if (isset($_GET['busqueda_nombre'])){

  $nombre = $_GET['busqueda_nombre'];
  $conexion = conectar();
  $consulta = "SELECT * FROM residencia WHERE nombre='$nombre'";
  $lista = consultaResidencia($conexion, $consulta);
  mysqli_close($conexion);

  while ($row=mysqli_fetch_array($lista)) {
    echo $row['nombre'];
    
  }

}

//BUSQUEDA POR DESCRIPCION


//BUSQUEDA POR LOCALIDAD


//BUSQUEDA POR FECHA

?>
