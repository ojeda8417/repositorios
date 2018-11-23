<?php

$id= $_POST["codigo"];
$nombre= $_POST["nombre"];
$menu= $_POST["menu"];
$estado= 1 ;
include("../lib/conexion.php");
$Db=Conectarse();

$consu = mysql_query("select codigo_p, glosa_p from perfiles where codigo_p='$id' or glosa_p='$nombre'",$Db);

if(mysql_num_rows($consu)==1)
{
	
?>
<script language='JavaScript'>
alert("ERROR, YA EXISTE EL ID O EL NOMBRE, INTENTE CON OTRO");
//Mensaje de error
window.location = "man_perfil.php"
//redireccionamos
</script>
<?php
mysql_free_result($consurut);
mysql_close();
}
else
{
mysql_query("INSERT INTO PERFILES(CODIGO_P,GLOSA_P,MENU_ASOC,ESTADO) values('$id','$nombre','$menu','$estado')",$Db);

echo mysql_error();	
mysql_close();
?>
<script language='JavaScript'>
alert("CREACION DE PERFIL EXITOSO");
//Mensaje de exito
window.location = "listado_perf.php"
//redireccionamos
</script>
<?php
}
?>