<?php
$cod_edita= $_POST["cod"];
$glosa_edita= $_POST["nombre"];
$diecc_edita= $_POST["direc_suc"];
$tel_edita= $_POST["telefono"];
$admin_edita= $_POST["jlocal"];
$reg_edita= $_POST["reg_suc"];
$com_edita= $_POST["com_suc"];
$estado_edita= $_POST["estado"];

include("../lib/conexion.php");
$Db=Conectarse();

// Updateamos en la BD LA SUCURSAL

mysql_query("update sucursales set 
CODIGO_SUC='$cod_edita',CODIGO_R='$reg_edita',CODIGO_C='$com_edita',GLOSA_S='$glosa_edita',DIREC_S='$diecc_edita',TELEF_S='$tel_edita',ADMIN_S='$admin_edita',ESTADO='$estado_edita'
 where CODIGO_SUC ='$cod_edita'",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE SUCURSAL EXITOSA");
//Mensaje de exito
window.location = "man_suc.php"
//redireccionamos
</script>