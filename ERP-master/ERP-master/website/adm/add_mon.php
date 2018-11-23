<?php

$moneda= $_POST["nombre_m"];
$creacion= $_POST["fecha"];
include("../lib/conexion.php");
$Db=Conectarse();

$consu = mysql_query("select codigo_moneda from moneda where codigo_moneda='$moneda'",$Db);

if(mysql_num_rows($consu)==1)
{
	
?>
<script language='JavaScript'>
alert("NO ES POSIBLE GRABAR LA MONEDA, YA EXISTE EL NOMBRE, INTENTE CON OTRO");
//Mensaje de error
window.location = "nva_mon.php"
//redireccionamos
</script>
<?php
mysql_free_result($consurut);
mysql_close();
}
else
{
mysql_query("insert into moneda(CODIGO_MONEDA,FECHA_CREACION,ESTADO) values('$moneda', '$creacion','1')",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("CREACION DE MONEDA EXITOSA");
//Mensaje de exito
window.location = "nva_mon.php"
//redireccionamos
</script>
<?php
}
?>