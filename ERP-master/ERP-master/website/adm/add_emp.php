<?php
include("../lib/conexion.php");
$Db=Conectarse();

$rut_clte= $_POST["rut_emp"];
$dv_clte= $_POST["dv_emp"];
$nombre_uno= $_POST["fantasia"];
$nombre_dos= $_POST["razonsoc"];
$ape_pa= $_POST["giro"];
$ape_ma=  $_POST["contacto"];
$reg= $_POST["region_clte"];
$com= $_POST["comuna_clte"];
$direc= $_POST["dire_emp"];
$telef= $_POST["fono_emp"];

//echo $reg;
//echo $com;

$consurut = mysql_query("select RUT from clientes where RUT='$rut_clte'",$Db);

if(mysql_num_rows($consurut)==1)
{
	
?>
<script language='JavaScript'>
alert("NO ES POSIBLE DAR DE ALTA, CLIENTE YA EXISTE");
//Mensaje de error
window.location = "clientes.php"
//redireccionamos
</script>
<?php
mysql_free_result($consurut);
mysql_close();
}
else
{	
// Insertamos en la BD el nuevo cliente
mysql_query("INSERT INTO clientes(RUT, DV, CODIGO_R, CODIGO_C, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, DIRE_CLI, TELEF_CLI, TIPO_CLI, ESTADO) VALUES('$rut_clte','$dv_clte','$reg','$com','$nombre_uno','$nombre_dos','$ape_pa','$ape_ma','$direc','$telef','2','1' )",$Db);	
mysql_close();
?>
<script language='JavaScript'>
//Mensaje de exito
alert("ALTA DE CLIENTE EXITOSA");
window.location = "cliente_emp.php"
//redireccionamos
</script>
<?php

}


?>