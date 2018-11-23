<?php session_start();?>
<?PHP if(($_SESSION["USUARIO"])==0)
{
?>
<script language='JavaScript'>
alert("SIN HACER LOG-IN, NO PUEDE ACCEDER AL SISTEMA");
//Mensaje de error
window.location = "../index.html"
//redireccionamos
</script>
<?php
exit;
}
include("../lib/conexion.php");
$Db=Conectarse();
$id_imp= $_GET["id"];
$consulta_impuesto=mysql_query("SELECT * FROM impuesto WHERE ID='$id_imp'",$Db);
if($row=mysql_fetch_array($consulta_impuesto))
{
$id=$row[0];
$nombre=$row[1];
$monto=$row[2];
$fecha=$row[3];

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sistema de Bodega 1.0.2 Modulo de Administracion (Beta)</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="../lib/jquery-1.5.2.js" type="text/javascript"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#datos").validate({
     rules: {
	         nombre_imp:{
			         required: true,
		         },
			 valor:{
				     required: true,
					 number:true
				 },
			 fecha:{
				    required: true
				 }

			 },
	messages: {
		    nombre_imp: {
				  required: "*"
				 },
			valor:{
				 required: "*",
				 number: "*"
				},
		   fecha:{
			     required: "*"
			   }
		} 
    
})
})
</script>
</head>

<body>
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
        <li class=""><a href="nuevo_imp.php" title="Crear Impuesto">Crear Impuesto</a></li>
        <li class="current_page_item"><a href="listado_imp.php" title="Editar Impuesto">Editar Impuesto</a></li>
        <li class=""><a href="configura.php" title="Volver Al inicio">Volver</a></li>
      
	</ul>	
</div>
<div class="edita_mon"></div>
<form action="update_imp.php" name="datos" id="datos" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<table border="0" class="tbl_imp">
  <tr>
    <td>Nombre Impuesto:</td>
    <td>
      <input name="nombre_imp" type="text" id="nombre_imp" size="30" maxlength="30"  class="textbox" value="<?php echo $nombre; ?>"/>
    </td>
  </tr>
  <tr>
    <td>Valor:</td>
    <td>
      <input name="valor" type="text" id="valor" size="2" maxlength="4"  value="<?php echo $monto; ?>"/> 
      %
    </td>
  </tr>
  <tr>
    <td>Fecha:</td>
    <td><input type="text" name="fecha" id="fecha" readonly value="<?php echo $fecha; ?>" /></td>
  </tr>
    <tr>
    <td colspan="2" align="center"><button type="submit" ><img src="../img/disk.png" alt=""/>Editar</button> 
      <button type="reset" class=""><img src="../img/delete.gif" alt=""/>Borrar</button></td>
    </tr>
</table>
</form>
</body>
</html>