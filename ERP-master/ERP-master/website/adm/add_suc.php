<?php
include("../lib/conexion.php");
$Db=Conectarse();
/*
 * Script de grabado de comunas
 */
$cod_suc=$_POST["cod"];
$glosa_suc=$_POST["nombre"];
$dire_suc=$_POST["direc_suc"];
$telef_suc=$_POST["telefono"];
$jefe_suc=$_POST["jlocal"];
$region_suc=$_POST["reg_suc"];
$comuna_suc=$_POST["com_suc"];
$FORMATO_TELEF= (56-2).$telef_suc;
//echo $codigo_reg;
//echo $glosa_com;

$cons_suc=mysql_query("select max(codigo_suc)as maximo from sucursales where codigo_suc='$cod_suc'",$Db);

echo mysql_error();
$fila=mysql_fetch_array($cons_suc);

if ($fila["maximo"] == 0){
$multiplo=1;
$max= $cod_suc;
//echo $max;
mysql_query("INSERT INTO sucursales values('$max','$region_suc','$comuna_suc','$glosa_suc','$dire_suc','$FORMATO_TELEF','$jefe_suc','1')",$Db);	
echo mysql_error();
mysql_close();
}
else
{   

}	

//mysql_close();
?>
<script language='JavaScript'>
alert("CREACION DE SUCURSAL EXITOSA");
//Mensaje de exito
window.location = "mant_suc.php"
//redireccionamos
</script>
<?php

?>
