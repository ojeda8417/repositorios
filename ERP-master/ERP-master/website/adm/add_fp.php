<?php

$forma= $_POST["nombre_fp"];

include("../lib/conexion.php");
$Db=Conectarse();

$consu = mysql_query("SELECT GLOSA_F_PAGO FROM forma_pago WHERE GLOSA_F_PAGO='$forma'",$Db);

if(mysql_num_rows($consu)==1)
{
	
?>
<script language='JavaScript'>
alert("NO ES POSIBLE GRABAR EL LA FORMA DE PAGO, YA EXISTE EL NOMBRE, INTENTE CON OTRO");
//Mensaje de error
window.location = "nva_fp.php"
//redireccionamos
</script>
<?php
mysql_free_result($consurut);
mysql_close();
}
else
{
mysql_query("INSERT INTO forma_pago(GLOSA_F_PAGO,ESTADO) values('$forma','1')",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("CREACION DE FORMA DE PAGO EXITOSO");
//Mensaje de exito
window.location = "nva_fp.php"
//redireccionamos
</script>
<?php
}
?>