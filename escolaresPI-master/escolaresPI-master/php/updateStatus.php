<?php
/*	Include principal para la conexión a la base de datos*/
include("conexion.php");
$Indice = date("Y-m-d");// Fecha actual, ejemplo 2015-12-31 23:59:59
$fin = date("Y-m-d H:i:s");// Fecha actual, ejemplo 2015-12-31 23:59:59
$return_arr = array();

$sqlUpdate = "UPDATE alumnos SET estado=".(int)$_GET['Estado'].", hora_fin='".$fin."' WHERE ficha_inscripcion=".(int)$_GET['Ficha']." and indice='".$Indice."'";

if ($conn->query($sqlUpdate) === TRUE) {
   	$return_arr = array('check' =>1);

} else {
	$return_arr = array('check' =>0);
}
$conn->close();
	$array = json_encode($return_arr);
	echo $array

?>