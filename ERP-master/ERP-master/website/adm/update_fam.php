<?php
$id_edita= $_POST["cod_f"];
$glosa_fam_edita= $_POST["nombre"];
$est_fam_edita= $_POST["f_estado"];

include("../lib/conexion.php");
$Db=Conectarse();

// Updateamos en la BD nuevo usuario

mysql_query("update familia SET codigo_f='$id_edita',glosa_f='$glosa_fam_edita',estado='$est_fam_edita' where codigo_f ='$id_edita'",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE FAMILIA EXITOSA");
//Mensaje de exito
window.location = "man_fam.php"
//redireccionamos
</script>