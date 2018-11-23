<?php
/*
	Include principal para la conexión a la base de datos
*/
include("conexion.php");
$Indice = date("Y-m-d");// Fecha actual, ejemplo 2015-12-31 23:59:59

$sqlGetTurno = "SELECT count(id) as totalAlumnos FROM alumnos WHERE  indice ='".$Indice."'";
// ir por cantidad de alumnos
	$result = $conn->query($sqlGetTurno); //ir por los aspirantes del día en curso
	    while($row = $result->fetch_assoc()) {
	    	$total = $row["totalAlumnos"];
	    }
$conn->close();
	$json = array("totalAlumnos" =>$total );
	echo json_encode($json);
?>