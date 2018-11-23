<?php
$id_edita= $_POST["id"];
$nom_edita= $_POST["nombre_doc"];

include("../lib/conexion.php");
$Db=Conectarse();

// Updateamos en la BD nuevo usuario
$pass_usr= sha1($clave_edita);
mysql_query("update documentos set codigo_d='$id_edita',glosa_d='$nom_edita' where codigo_d ='$id_edita'",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE DOCUMENTO EXITOSA");
//Mensaje de exito
window.location = "listado_doc.php"
//redireccionamos
</script>