<?php
/*	Include principal para la conexión a la base de datos*/
include("conexion.php");
$Indice = date("Y-m-d");// Fecha actual, ejemplo 2015-12-31 23:59:59
$sqlGetLista = "SELECT nombre, turno, estado, carrera, ficha_inscripcion FROM alumnos where indice ='".$Indice."'";
$return_arr = array();
$array = array();
$result = $conn->query($sqlGetLista); 
	while($row = mysqli_fetch_array($result)) {
		$array = array('Nombre' =>$row['nombre'],'Turno' =>$row['turno'],'Estado' =>$row['estado'],'Carrera' =>$row['carrera'],'Ficha' =>$row['ficha_inscripcion']);
	    array_push($return_arr,$array);
	}
$conn->close();
	$array = json_encode($return_arr);
	echo $array;

?>