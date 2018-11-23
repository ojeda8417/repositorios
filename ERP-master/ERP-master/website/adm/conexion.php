<?php
//Configuracion de la conexion a base de datos
$bd_host = "localhost"; 
$bd_usuario = "sintaxis_db"; 
$bd_password = "sintaxis_2013"; 
$bd_base = "sintaxis_sin"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con); 
?>