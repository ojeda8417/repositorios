<?php
function familia($cod)
{
$Db=Conectarse();
$con_f = mysql_query("SELECT GLOSA_F FROM FAMILIA WHERE CODIGO_F='$cod'",$Db);
if($row=mysql_fetch_array($con_f))
{
$glosa_f=$row[0];
}

return $glosa_f;

}

function sfamilia($cod1)
{
$Db=Conectarse();
$con_sf = mysql_query("SELECT GLOSA_SF FROM SUBFAMILIA WHERE CODIGO_SF='$cod1'",$Db);
if($row=mysql_fetch_array($con_sf))
{
$glosa_sf=$row[0];
}
return $glosa_sf;	

	
}


?>