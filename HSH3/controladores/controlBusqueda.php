<?php
include('../modelos/conexion.php');
include('../modelos/funciones-residencias.php');

//BUSQUEDA POR NOMBRE DE RESIDENCIA
function busquedaPorNombre($nombre)
{
  $conexion = conectar();
  $consulta = "SELECT * FROM residencia WHERE nombre LIKE '%$nombre%'";
  $resultado = consultaResidencia($conexion, $consulta);
  mysqli_close($conexion);
  if (mysqli_num_rows($resultado)>0) {
    echo "hay ".mysqli_num_rows($resultado)." resultado/s";
  }else {
    echo "no hay resultados";
  }
  return $resultado;
}

function todasLasResidencias()
{
  $conexion = conectar();
  $consulta = "SELECT * FROM residencia";
  $resultado = consultaResidencia($conexion, $consulta);
  mysqli_close($conexion);
  return $resultado;
}


//BUSQUEDA POR DESCRIPCION
function busquedaPorDescripcion($descripcion)
{
  $conexion = conectar();
  $consulta = "SELECT * FROM residencia WHERE descripcion='$descripcion'";
  $resultado = consultaResidencia($conexion, $consulta);
  mysqli_close($conexion);
  if (mysqli_num_rows($resultado)>0) {
    echo "hay ".mysqli_num_rows($resultado)." resultado/s";
  }else {
    echo "no hay resultados";
  }
  return $resultado;
}




//BUSQUEDA POR LOCALIDAD


//BUSQUEDA POR FECHA

?>
