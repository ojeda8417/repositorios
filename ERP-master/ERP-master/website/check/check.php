<?php
session_start();
include("../lib/conexion.php");
$Db=Conectarse();

$usu= $_POST["user"];
$pas= $_POST["pass"];
$pas= sha1($pas);
//consultamos a la bd si existe el usuario y contraseña...
$consulta= mysql_query("select * from usuario WHERE USUARIO = '$usu' AND PASSWORD = '$pas'",$Db);
//revisamos si no existe
if(mysql_num_rows($consulta)==0)
{ 
mysql_free_result($consulta);
?>
<script language='JavaScript'>
alert("ERROR, VERIFIQUE USUARIO Y PASSWORD");
//Mensaje de error
window.location = "../index.html"
//redireccionamos
</script>
<?php
}
else
{
$_SESSION["USUARIO"]= $_POST["user"];
//echo $_SESSION["USUARIO"];
//verificamos que la sesion contenga datos...
//error_log("¡Lo echaste a perder!", 3, "../log/accesos.log");
$filas= mysql_fetch_array($consulta);
$activo= $filas["ESTADO"];
$perfil= $filas['CODIGO_P'];
//Preguntamos si es usuario activo...
if ($activo==2)
{
?>
<script language='JavaScript'>
alert("CUENTA INACTIVA, CONTACTE AL ADMINISTRADOR");
//Mensaje de error
window.location = "../index.html"
//redireccionamos
</script>
<?php
}
if($perfil==1)
{
?>
<script language='JavaScript'>
//redireccionamos a la administracion
window.location = "../adm/index_adm.php"
</script>
<?php
}
if($perfil==2)
{
?>
<script language='JavaScript'>
//redireccionamos al modulo de bodega
window.location = "../bodega/index_bod.php"
</script>
<?php
}
if($perfil==3)
{
?>
<script language='JavaScript'>
//redireccionamos al modulo de ventas
window.location = "../usr/index_usr.php"
</script>
<?php
}
   // lo que quieras
}  


?>