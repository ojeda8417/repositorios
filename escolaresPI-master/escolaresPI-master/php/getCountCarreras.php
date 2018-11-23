<?php
/*
	Include principal para la conexión a la base de datos
*/
include("conexion.php");
$total = array();
$sqlGetTurno = "SELECT sum(case when carrera = 1 then 1 else 0 end) Electronica, 
						sum(case when carrera = 2 then 1 else 0 end) Electromecanica,
						sum(case when carrera = 3 then 1 else 0 end) Gestion,
						sum(case when carrera = 4 then 1 else 0 end) Industrial,
						sum(case when carrera = 5 then 1 else 0 end) Mecatronica,
						sum(case when carrera = 6 then 1 else 0 end) Sistemas, 
						sum(case when carrera = 7 then 1 else 0 end) Administacion 
						from alumnos";
// ir por cantidad de alumnos
	$result = $conn->query($sqlGetTurno); //ir por el total de aspitantes
	    while($row = $result->fetch_assoc()) {
	    		$total = array('Electronica' =>$row['Electronica'],'Electromecanica' =>$row['Electromecanica'],'Gestion' =>$row['Gestion'],'Industrial' =>$row['Industrial'],'Mecatronica' =>$row['Mecatronica'],'Sistemas' =>$row['Sistemas'],'Administacion' =>$row['Administacion']);
	    }
$conn->close();
	echo json_encode($total);
?>