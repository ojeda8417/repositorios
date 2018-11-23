<?php
$id_edita= $_POST["cod_sf"];
$id_f=$_POST["fam"];
$glosa_sf_edita= $_POST["nombre"];
$est_sf_edita= $_POST["estado_sf"];

include("../lib/conexion.php");
$Db=Conectarse();

// Updateamos en la BD la subfamilia...

mysql_query("update subfamilia SET codigo_f='$id_f',glosa_sf='$glosa_sf_edita',estado='$est_sf_edita' where codigo_sf ='$id_edita'",$Db);
echo mysql_error();	
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE SUBFAMILIA EXITOSA");
//Mensaje de exito
window.location = "sel_subfam.php"
//redireccionamos
</script>