<?php
/*
 * Script Graba Bodegas.-
 * 20/10/2013
 * Luis Prieto
 */
include("../lib/conexion.php");
$Db=Conectarse();

//$cod_bod_=$_POST["codigo"];
$glosa_bod=$_POST["nombre"];
$cod_suc=$_POST["sel_suc"];
$estado=$_POST["estado"];


$bod_suc=mysql_query("select max(codigo_b)as maximo from bodegas where codigo_suc='$cod_suc'",$Db);

echo mysql_error();
$fila=mysql_fetch_array($bod_suc);

if ($fila["maximo"] == 0){
$multiplo=1;
$max= $cod_suc . $multiplo;
//echo $max;
mysql_query("INSERT INTO bodegas values('$max','$cod_suc','$glosa_bod','$estado')",$Db);	
echo mysql_error();
mysql_close();
}
else
{   
$max=$fila["maximo"]+1;   
mysql_query("INSERT INTO bodegas values('$max','$cod_suc','$glosa_bod','$estado')",$Db);
echo mysql_error();
mysql_close();
}	

?>
<script language='JavaScript'>
alert("CREACION DE BODEGA EXITOSA");
//Mensaje de exito
window.location = "mant_bod.php"
//redireccionamos
</script>
<?php

?>
