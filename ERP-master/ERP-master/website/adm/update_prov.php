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
$estado= $_POST["estado"];

// Updateamos en la BD el provedor
mysql_query("UPDATE proveedores SET 
CODIGO_R = '$reg',CODIGO_C = '$com',RAZON_S = '$nombre_dos',NOMBRE_F = '$nombre_uno',GIRO = '$giro',DIREC_P = '$direc',TELEF_P = '$telef',CONTACTO_P = '$contac',ESTADO='$estado' WHERE RUT_P='$rut_clte'",$Db);	
echo mysql_error();
mysql_close();
?>
<script language='JavaScript'>
//Mensaje de exito
alert("PROVEEDOR ACTUALIZADO EXITOSAMENTE");
//redireccionamos..
window.location = "listado_prov.php"
</script>




