<?php
 
   
	include("../lib/conexion.php");
	$Db=Conectarse();	

    $consulta = "SELECT * from comuna WHERE CODIGO_R = ".$_GET['id'];
    $query = mysql_query($consulta,$Db);
    while ($fila = mysql_fetch_array($query)) {
        echo '<option value="'.$fila['CODIGO_C'].'">'.$fila['GLOSA_C'].'</option>';
    };
 
?>