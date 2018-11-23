<?php
$rut_edita= $_POST["rut_clte"];
$no1= $_POST["nombre1"];
$no2= $_POST["nombre2"];
$ap1= $_POST["ape_paterno"];
$ap2= $_POST["ape_materno"];
$r= $_POST["region_clte"];
$c= $_POST["comuna_clte"];
$d= $_POST["dire_clte"];
$t= $_POST["fono_clte"];
$e= $_POST["estado"];

include("../lib/conexion.php");
$Db=Conectarse();

/* Updateamos en la BD el cliente natural.. 

  `RUT` decimal(8,0) NOT NULL,
  `DV` text NOT NULL,
  `CODIGO_R` int(4) DEFAULT NULL,
  `CODIGO_C` int(4) DEFAULT NULL,
  `NOMBRE1` text,
  `NOMBRE2` text,
  `APELLIDO1` text,
  `APELLIDO2` text,
  `DIRE_CLI` text,
  `TELEF_CLI` decimal(10,0) DEFAULT NULL,
  `TIPO_CLI` int(1) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,

 */


mysql_query("update clientes set 
CODIGO_R='$r',CODIGO_C='$c',NOMBRE1='$no1',NOMBRE2='$no2',APELLIDO1='$ap1',APELLIDO2='$ap2',DIRE_CLI='$d', TELEF_CLI='$t', ESTADO='$e' WHERE RUT ='$rut_edita'",$Db);	
mysql_close();
?>
<script language='JavaScript'>
alert("ACTUALIZACION DE CLIENTE EXITOSA");
//Mensaje de exito
window.location = "clientes.php"
//redireccionamos
</script>