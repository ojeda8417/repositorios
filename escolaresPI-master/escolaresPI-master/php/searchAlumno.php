<?php
/*
	Include principal para la conexión a la base de datos
*/
include("conexion.php");
$Indice = date("Y-m-d");// Fecha actual, ejemplo 2015-12-31 23:59:59

$sqlGetTurno = "SELECT alumno.nombre as nombre, alumno.turno as turno, alumno.estado as estado, alumno.ficha_inscripcion as ficha, alumno.indice as indice, carreras.nombre as carrera from alumnos alumno inner join carreras on carreras.id = alumno.carrera and alumno.ficha_inscripcion =".(int)$_GET['Ficha']." order by alumno.indice limit 1";
$alumno = array();
$estado = 0;
// ir por cantidad de alumnos
	$result = $conn->query($sqlGetTurno); //ir por los aspirantes del día en curso
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	$alumno =  array('Nombre' =>$row['nombre'],'Carrera' => $row['carrera'],'Fecha' =>$row['indice'],'Ficha' =>$row['ficha'],'Turno' => $row['turno'],'Estado' =>$row['estado']);
	    }
	} else {
	    $estado = 1;
	}
$conn->close();
	$arrayName = array('estado' => $estado ,'Alumno' => $alumno);
	echo json_encode($arrayName);
?>