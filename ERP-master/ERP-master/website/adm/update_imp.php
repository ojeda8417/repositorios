<?php
$id_edita= $_POST["id"];
$nom_edita= $_POST["nombre_imp"];
$valor_edita= $_POST["valor"];
$fecha_edita= $_POST["fecha"];

include("../lib/conexion.php");
$Db=Conectarse();

// Updateamos en la BD el impuesto

mysql_query("update impuesto set id='$id_edita',nom_impuesto='$nom_edita',valor='$valor_edita',fecha_creacion='$fecha_edita' where id ='$id_edita'",$Db);	
mysql_error();
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE IMPUESTO EXITOSA");
//Mensaje de exito
window.location = "listado_imp.php"
//redireccionamos
</script>