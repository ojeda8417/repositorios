<?php
$id_edita= $_POST["id"];
$nom_edita= $_POST["nombre_fp"];

include("../lib/conexion.php");
$Db=Conectarse();

// Updateamos en la BD nuevo usuario

mysql_query("update forma_pago set codigo_f_pago='$id_edita',glosa_f_pago='$nom_edita' where codigo_f_pago ='$id_edita'",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE FORMA DE PAGO EXITOSA");
//Mensaje de exito
window.location = "listado_fp.php"
//redireccionamos
</script>