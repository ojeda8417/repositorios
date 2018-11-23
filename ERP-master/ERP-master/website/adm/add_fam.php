<?php
include("../lib/conexion.php");
$Db=Conectarse();
/*
 * Script de grabado de comunas
 */
$codigo=$_POST["cod_f"];
$glosa_fam=$_POST["nombre"];
$estado_fam=1;

//echo $codigo_reg;
//echo $glosa_com;

$cons_fam=mysql_query("select codigo_f from familia where codigo_f='$codigo'",$Db);
echo mysql_error();

if(mysql_num_rows($cons_fam)==1)
{
?>
<script language='JavaScript'>
//Mensaje de exito
alert("CODIGO DE FAMILIA EXISTE, INTENTE CON OTRO");
//redireccionamos
window.location = "man_fam.php"
</script>
<?php
mysql_free_result($cons_fam);
mysql_close();
}
else
{
mysql_query("INSERT INTO familia values('$codigo','$glosa_fam','$estado_fam')",$Db);	
?>
<script language='JavaScript'>
//Mensaje de exito
alert("CREACION DE FAMILIA EXITOSA");
//redireccionamos
window.location = "man_fam.php"
</script>
<?php
}	
//echo mysql_error();
//mysql_close();
?>

