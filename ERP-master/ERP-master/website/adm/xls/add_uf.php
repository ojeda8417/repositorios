<?php
include("../../lib/conexion.php");
$Db=Conectarse();
require_once('../../lib/PHPExcel.php');
require_once('../../lib/Excel2007.php');

$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("uf.xlsx");
$objPHPExcel->getActiveSheet();
// Asignar hoja de calculo activa
?>

<!--$fecha_uf= date("Y-m-d H:i:s",$timestamp); -->
<?php

for($i=1; $i<=$objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();)
{
$fecha = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
$valor = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
// utilizo la función y obtengo el timestamp
$timestamp = PHPExcel_Shared_Date::ExcelToPHP($fecha);
$fecha_uf= date("d-m-Y",$timestamp);
mysql_query("insert into UF values('$fecha_uf','$valor')",$Db);
//mysql_close();
$i++;
unlink('uf.xlsx');

?>
<script language='JavaScript'>
alert("LA UF DEL MES FUE PROCESADA EXITOSAMENTE");
//Mensaje
window.location = "../conf_uf.php"
//redireccionamos
</script>
<?php
}

?>