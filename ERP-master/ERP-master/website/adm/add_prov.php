<?php
include("../lib/conexion.php");
$Db=Conectarse();

$rut_clte= $_POST["rut_emp"];
$dv_clte= $_POST["dv_emp"];
$nombre_uno= $_POST["fantasia"];
$nombre_dos= $_POST["razonsoc"];
$giro= $_POST["giro"];
$contac=  $_POST["contacto"];
$reg= $_POST["region_clte"];
$com= $_POST["comuna_clte"];
$direc= $_POST["dire_emp"];
$telef= $_POST["fono_emp"];

//echo $reg;
//echo $com;

$consurut = mysql_query("select RUT_P from proveedores where RUT_P='$rut_clte'",$Db);

if(mysql_num_rows($consurut)==1)
{
	
?>
<script language='JavaScript'>
alert("NO ES POSIBLE DAR DE ALTA, CLIENTE YA EXISTE");
//Mensaje de error
window.location = "man_prov.php"
//redireccionamos
</script>
<?php
mysql_free_result($consurut);
mysql_close();
}
else
{	
// Insertamos en la BD el nuevo provedor
mysql_query("INSERT INTO proveedores(RUT_P,DV_P,CODIGO_R,CODIGO_C,RAZON_S,NOMBRE_F,GIRO,DIREC_P,TELEF_P,CONTACTO_P, ESTADO)VALUES('$rut_clte','$dv_clte','$reg','$com','$nombre_dos','$nombre_uno','$giro','$direc','$telef','$contac','1' )",$Db);	
echo mysql_error();
mysql_close();
?>
<script language='JavaScript'>
//Mensaje de exito
alert("ALTA DE CLIENTE EXITOSA");
window.location = "man_prov.php"
//redireccionamos
</script>
<?php

}


?>