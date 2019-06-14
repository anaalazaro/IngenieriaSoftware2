<?php

function getIdPaisPorNombre($nombre_pais)
{
  $conexion=conectar();
  $consulta="SELECT * FROM pais WHERE pais_nombre='$nombre_pais'";
  $id_pais=mysqli_query($conexion,$consulta);
  mysqli_close($conexion);
  return $id_pais;
}

function getNombrePaisPorId($id_pais)
{
  $conexion=conectar();
  $consulta="SELECT * FROM pais WHERE id='$id_pais'";
  $resultado=mysqli_fetch_array(mysqli_query($conexion,$consulta));
  $nombre_pais = $resultado['pais_nombre'];
  mysqli_close($conexion);
  return $nombre_pais;
}

function listarPaises()
{
    $conexion=conectar();
    $consulta="SELECT * FROM pais";
    $paises=mysqli_query($conexion,$consulta);
    mysqli_close($conexion);
    return $paises;
}

function getNombreProvinciaPorId($id_provincia)
{
  $conexion=conectar();
  $consulta="SELECT * FROM provincia WHERE id='$id_provincia'";
  $resultado= mysqli_fetch_array(mysqli_query($conexion,$consulta));
  $nombre_provincia = $resultado['provincia_nombre'];
  mysqli_close($conexion);
  return $nombre_provincia;
}

function listarProvinciasDe($nombre_pais)
{
  $id_pais = mysqli_fetch_array(getIdPaisPorNombre($nombre_pais))['id'];
  echo $id_pais;
  $conexion=conectar();
  $consulta = "SELECT * FROM provincia WHERE pais_id='$id_pais'";
  $provincias = mysqli_query($conexion, $consulta);
  mysqli_close($conexion);
  return $provincias;
}

function getNombreCiudadPorId($id_ciudad)
{
  $conexion=conectar();
  $consulta="SELECT * FROM ciudad WHERE id='$id_ciudad'";
  $resultado= mysqli_fetch_array(mysqli_query($conexion,$consulta));
  $nombre_ciudad = $resultado['ciudad_nombre'];
  mysqli_close($conexion);
  return $nombre_ciudad;
}

function listarCiudadesDe($id_provincia)
{
  $conexion=conectar();
  $consulta = "SELECT * FROM ciudad WHERE provincia_id='$id_provincia'";
  $ciudades = mysqli_query($conexion, $consulta);
  mysqli_close($conexion);
  return $ciudades;
}

?>
