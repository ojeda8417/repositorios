<?php
function Conectarse()
{
/*======== Desarrollo ================= */

 $host="localhost";
 $usr="root";
 $pass="";
 $base="sintaxis";

/* ======== Produccion ================ */
/*
$host="localhost";
$usr="sintaxis_db"; 
$pass="sintaxis_2013";
$base="sintaxis_sin";
*/
if (!($Db=mysql_connect("$host","$usr","$pass")))
{
echo "Error conectando a la base de datos.";
exit();
}
if (!mysql_select_db("$base",$Db))
{
echo "Error seleccionando la base de datos.";
exit();
}
return $Db;
}
$Db=Conectarse();
//echo "Conexión con la base de datos conseguida.<br>";
mysql_close($Db); //cierra la conexion
?>



