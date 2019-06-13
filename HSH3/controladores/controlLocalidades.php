<?php

/**
 *
 */
class SelectorDeLocalidad
{

  private $id_pais_seleccionado = 0;

  function __construct()
  {
    // code...
  }

  function listarPaises()
  {
      $conexion=conectar();
      $consulta="SELECT * FROM pais";
      $paises=mysqli_query($conexion,$consulta);
      mysqli_close($conexion);
      while ($row = mysqli_fetch_array($paises)){

        echo "<option value='pais_nombre'>".$row['pais_nombre']."</option>";
      }
  }

}


function listarPaises()
{
    $conexion=conectar();
    $consulta="SELECT * FROM pais";
    $paises=mysqli_query($conexion,$consulta);
    mysqli_close($conexion);
    while ($row = mysqli_fetch_array($paises)){

      echo "<option value='pais_nombre'>".$row['pais_nombre']."</option>";
    }
}


/*<?php
  $conexion=conectar();
  $consulta="SELECT * FROM pais";
  $paises=mysqli_query($conexion,$consulta);
  mysqli_close($conexion);
  while ($row = mysqli_fetch_array($paises)){
?>
  <option value="pais_nombre">
    <?php
    echo $row['pais_nombre'];
    $id_pais_seleccionado=$row['id'];
    ?>
  </option>
<?php } ?>*/

function listarProvincias($pais)
{
  $conexion=conectar();
  $consulta="SELECT * FROM provincias WHERE pais_id='$pais'";
  $provincias=mysqli_query($conexion,$consulta);
  mysqli_close($conexion);
  while ($row = mysqli_fetch_array($provincias)){
    echo "<option value='provincia_nombre'>".$row['provincia_nombre']."</option>";
  }
}

function cambiaProvincia()
{
  cambiaProvincia(1);
}

?>
