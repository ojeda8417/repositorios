<?php
$id_edita= $_POST["cod"];
$glosa_perf_edita= $_POST["nombre"];
$est_perf_edita= $_POST["sel_estado"];

include("../lib/conexion.php");
$Db=Conectarse();

// Updateamos en la BD nuevo usuario

mysql_query("update perfiles set codigo_p='$id_edita',glosa_p='$glosa_perf_edita',estado='$est_perf_edita' where codigo_p ='$id_edita'",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE PERFIL EXITOSO");
//Mensaje de exito
window.location = "man_perfil.php"
//redireccionamos
</script>