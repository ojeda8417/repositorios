<?php
include("../lib/conexion.php");
$Db=Conectarse();
/*
 * Script de update de productos...
 */
$fam= $_POST["fam" ];       
$sfam= $_POST["sfam"];      
$rutp= $_POST["rutp"];      
$cod= $_POST["codigo"];     
$nom= $_POST["glosa"];      
$fecha= $_POST["fecha"];     
$estado=$_POST["estado"]; 

//echo $codigo_reg;
//echo $glosa_com;
mysql_query("update productos set CODIGO_F='$fam',CODIGO_SF='$sfam',RUT_P='$rutp', NOM_PRO='$nom', ESTADO_PRO='$estado' WHERE CODIGO_PRO ='$cod'",$Db);
echo mysql_error();
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE PRODUCTO EXITOSO");
//Mensaje de exito
window.location = "man_prod.php"
//redireccionamos
</script>


