<?php
include("../lib/conexion.php");
$Db=Conectarse();

$rut_usr= $_POST["rut"];
$dv_usr=$_POST["dv"];
$nom_usr=$_POST["nombre"];
$ape_usr=$_POST["apellido"];
$fecha=$_POST["fecha_alta"];
$pass_usr=$_POST["clave"];
$tip_usr=$_POST["sel_usr"];
$est_usr=$_POST["sel_estado"];
$suc_ori=$_POST["sel_suc"];
//echo $rut_usr;
//echo $dv_usr;
//echo $nom_usr;
//echo $ape_usr;
//echo $pass_usr;
//echo $tip_usr;

$consurut = mysql_query("select USUARIO from usuario where USUARIO='$rut_usr'",$Db);

if(mysql_num_rows($consurut)==1)
{
	
?>
<script language='JavaScript'>
alert("NO ES POSIBLE DAR DE ALTA, RUT YA EXISTE");
//Mensaje de error
window.location = "man_usr.php"
//redireccionamos
</script>
<?php
mysql_free_result($consurut);
mysql_close();
}
else
{	
// Insertamos en la BD el nuevo usuario
$pass_usr= sha1($pass_usr);
mysql_query("insert into usuario(usuario,codigo_p,password,fecha_alta,estado,sucursal_asoc) values('$rut_usr','$tip_usr', '$pass_usr','$fecha','$est_usr','$suc_ori')",$Db);
mysql_close();
?>
<script language='JavaScript'>
alert("ALTA DE USUARIO EXITOSA");
//Mensaje de exito
window.location = "man_usr.php"
//redireccionamos
</script>
<?php

}


?>