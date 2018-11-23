<?php
include("../lib/conexion.php");
$Db=Conectarse();
/*
 * Script de grabado productos
 */
$fam= $_POST["fam" ];       
$sfam= $_POST["sfam"];      
$rutp= $_POST["rutp"];      
$cod= $_POST["codigo"];     
$nom= $_POST["glosa"];      
$fecha= $_POST["fecha"];  
$medida= $_POST["med"];  
$estado=1;

//echo $codigo_reg;
//echo $glosa_com;

$cons_fam=mysql_query("select CODIGO_PRO from productos where codigo_pro='$cod'",$Db);
echo mysql_error();

if(mysql_num_rows($cons_fam)==1)
{
?>
<script language='JavaScript'>
//Mensaje de exito
alert("CODIGO DE PRODUCTO EXISTE, INTENTE CON OTRO");
//redireccionamos
window.location = "man_prod.php"
</script>
<?php
mysql_free_result($cons_fam);
mysql_close();
}
else
{
mysql_query("INSERT INTO productos VALUES ('$cod', '$fam', '$sfam', '$rutp', '$nom','$medida', '$fecha', '$estado');",$Db);	
?>
<script language='JavaScript'>
//Mensaje de exito
alert("CREACION DE PRODUCTO EXITOSO");
//redireccionamos
window.location = "man_prod.php"
</script>
<?php
}	
//echo mysql_error();
//mysql_close();
?>

