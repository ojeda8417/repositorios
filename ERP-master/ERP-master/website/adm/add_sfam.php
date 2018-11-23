<?php
include("../lib/conexion.php");
$Db=Conectarse();
/*
 * Script de grabado de subfamilia
 */
$sfam=$_POST["fam"];
$cod=$_POST["cod_sf"];
$glosa_sfam=$_POST["nombre"];
$estado_sfam=1;

//echo $codigo_reg;
//echo $glosa_com;

$cons_fam=mysql_query("select codigo_sf from subfamilia where codigo_sf='$cod'",$Db);
echo mysql_error();

if(mysql_num_rows($cons_fam)==1)
{
?>
<script language='JavaScript'>
//Mensaje de exito
alert("CODIGO DE SUBFAMILIA EXISTE, INTENTE CON OTRO");
//redireccionamos
window.location = "man_subfam.php"
</script>
<?php
mysql_free_result($cons_fam);
mysql_close();
}
else
{
mysql_query("INSERT INTO subfamilia values('$cod','$sfam','$glosa_sfam','$estado_sfam')",$Db);	
echo mysql_error();
?>
<script language='JavaScript'>
//Mensaje de exito
alert("CREACION DE SUBFAMILIA EXITOSA");
//redireccionamos
window.location = "man_subfam.php"
</script>
<?php
}	
//echo mysql_error();
//mysql_close();
?>

