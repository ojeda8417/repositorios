<?php
/*	Include principal para la conexión a la base de datos*/
include("conexion.php");
$sqlGetLista = "SELECT * FROM carreras";
$return_arr = array();
$array = array();
$result = $conn->query($sqlGetLista); 
	while($row = mysqli_fetch_array($result)) {
		$array = array('Nombre' =>$row['nombre'],'Id' =>$row['id']);
	    array_push($return_arr,$array);
	}
$conn->close();
	$array = json_encode($return_arr);
	echo $array

?>