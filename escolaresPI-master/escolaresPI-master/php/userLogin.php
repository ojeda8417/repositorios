<?php
/*
	Include principal para la conexión a la base de datos
*/
include("conexion.php");

$sqlGetTurno = "SELECT * from login where usuario ='".$_GET['user']."' and password='".$_GET['pass']."'";
$estado = 0;
// ir por cantidad de alumnostest/new/turnos.html
	$result = $conn->query($sqlGetTurno); //ir por los aspirantes del día en curso
	if ($result->num_rows > 0) {
	  	$estado = 1;
	} else {
	    $estado = 0;
	}
$conn->close();
	$arrayName = array('estado' => $estado);
	echo json_encode($arrayName);
?>