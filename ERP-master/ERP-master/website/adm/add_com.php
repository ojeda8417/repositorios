<?php
include("../lib/conexion.php");
$Db=Conectarse();
/*
 * Script de grabado de comunas
 */
$codigo_reg=$_POST["sel_reg"];
$glosa_com=$_POST["nom_com"];
$codigo_com="";

//echo $codigo_reg;
//echo $glosa_com;

$cons_comuna=mysql_query("select max(codigo_c)as maximo from comuna where codigo_r='$codigo_reg'",$Db);

echo mysql_error();
$fila=mysql_fetch_array($cons_comuna);

if ($fila["maximo"] == 0){
$multiplo=1;
$max= $codigo_reg . $multiplo;
//echo $max;
mysql_query("INSERT INTO comuna values('$max','$codigo_reg','$glosa_com')",$Db);	
echo mysql_error();
mysql_close();
}
else
{   
$max=$fila["maximo"]+1;   
mysql_query("INSERT INTO comuna values('$max','$codigo_reg','$glosa_com')",$Db);
echo mysql_error();
mysql_close();
}	

//mysql_close();
?>
<script language='JavaScript'>
alert("CREACION DE COMUNA EXITOSA");
//Mensaje de exito
window.location = "man_com.php"
//redireccionamos
</script>
<?php

?>
