<?php

$impuesto= $_POST["nombre_imp"];
$monto= $_POST["valor"];
$creacion= $_POST["fecha"];
include("../lib/conexion.php");
$Db=Conectarse();

$consu = mysql_query("select NOM_IMPUESTO from impuesto where NOM_IMPUESTO='$impuesto'",$Db);

if(mysql_num_rows($consu)==1)
{
	
?>
<script language='JavaScript'>
alert("NO ES POSIBLE GRABAR EL IMPUESTO, YA EXISTE EL NOMBRE, INTENTE CON OTRO");
//Mensaje de error
window.location = "nuevo_imp.php"
//redireccionamos
</script>
<?php
mysql_free_result($consurut);
mysql_close();
}
else
{
mysql_query("insert into impuesto(NOM_IMPUESTO,VALOR,FECHA_CREACION,ESTADO) values('$impuesto','$monto', '$creacion','1')",$Db);	
mysql_close();
?>
<script language='javascript'>
alert("CREACION DE IMPUESTO EXITOSO");
//Mensaje de exito
window.location = "nuevo_imp.php"
//redireccionamos
</script>
<?php
}
?>