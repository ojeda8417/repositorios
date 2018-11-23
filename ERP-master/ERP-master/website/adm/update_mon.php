<?php
$id_edita= $_POST["id"];
$nom_edita= $_POST["nombre_m"];

include("../lib/conexion.php");
$Db=Conectarse();

// Updateamos en la BD nuevo usuario

mysql_query("update moneda set codigo_moneda='$nom_edita' where id= '$id_edita'",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE MONEDA EXITOSA");
//Mensaje de exito
window.location = "listado_mon.php"
//redireccionamos
</script>