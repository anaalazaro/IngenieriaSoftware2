<?php
include('../modelos/conexion.php');
include('../modelos/funciones-residencias.php');

//BUSQUEDA POR NOMBRE DE RESIDENCIA
if (isset($_GET['busqueda_nombre'])){

  $nombre = $_GET['busqueda_nombre'];
  $conexion = conectar();
  $consulta = "SELECT * FROM residencia WHERE nombre='$nombre'";
  $resultado = consultaResidencia($conexion, $consulta);
  mysqli_close($conexion);

  if (mysqli_num_rows($resultado)>0) {
    echo "hay ".mysqli_num_rows($resultado)." resultado/s";
  }else {
    echo "no hay resultados";
  }

}

//BUSQUEDA POR DESCRIPCION
if (isset($_GET['busqueda_descripcion'])){

  $descripcion = $_GET['busqueda_descripcion'];
  $conexion = conectar();
  $consulta = "SELECT * FROM residencia WHERE descripcion='$descripcion'";
  $resultado = consultaResidencia($conexion, $consulta);
  mysqli_close($conexion);

  if (mysqli_num_rows($resultado)>0) {
    echo "hay ".mysqli_num_rows($resultado)." resultado/s";
  }else {
    echo "no hay resultados";
  }

}

//BUSQUEDA POR LOCALIDAD


//BUSQUEDA POR FECHA

?>
