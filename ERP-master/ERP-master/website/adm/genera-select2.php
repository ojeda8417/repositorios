<?php
 
   
	include("../lib/conexion.php");
	$Db=Conectarse();	

    $consulta = "SELECT * from subfamilia WHERE CODIGO_F = ".$_GET['id'];
    $query = mysql_query($consulta,$Db);
    while ($fila = mysql_fetch_array($query)) {
        echo '<option value="'.$fila['CODIGO_SF'].'">'.$fila['GLOSA_SF'].'</option>';
    };
 
?>