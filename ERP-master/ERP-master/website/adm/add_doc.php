<?php

$documento= $_POST["nombre_doc"];

include("../lib/conexion.php");
$Db=Conectarse();

$consu = mysql_query("select GLOSA_D from documentos where GLOSA_D='$documento'",$Db);

if(mysql_num_rows($consu)==1)
{
	
?>
<script language='JavaScript'>
alert("NO ES POSIBLE GRABAR EL DOCUMENTO, YA EXISTE EL NOMBRE, INTENTE CON OTRO");
//Mensaje de error
window.location = "nvo_doc.php"
//redireccionamos
</script>
<?php
mysql_free_result($consurut);
mysql_close();
}
else
{
mysql_query("insert into DOCUMENTOS(GLOSA_D,ESTADO) values('$documento','1')",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("CREACION DE DOCUMENTO EXITOSO");
//Mensaje de exito
window.location = "conf_doc.php"
//redireccionamos
</script>
<?php
}
?>