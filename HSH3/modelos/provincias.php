<?php 
	


    function getArraySQL($sql){
    		include('conexion.php');
$conexion=conectar();
	
    if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa

    $rawdata = array(); //creamos un array

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;

    while($row = mysqli_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }

    return $rawdata; //devolvemos el array
}
$sql="SELECT * FROM `provincias`";

        $myArray = getArraySQL($sql);
        echo json_encode($myArray);

 ?>