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
$id_fp= $_GET["id"];
$consulta_fp=mysql_query("select * from forma_pago where codigo_f_pago='$id_fp'",$Db);
if($row=mysql_fetch_array($consulta_fp))
{
$id=$row[0];
$nombre=$row[1];
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
	         nombre_fp:{
			         required: true,
		         }

			 },
	messages: {
		    nombre_fp: {
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
        <li class=""><a href="nva_fp.php" title="Crear Forma de Pago">Nueva Forma de Pago</a></li>
        <li class="current_page_item"><a href="listado_fp.php" title="Editar Forma de PAgo">Editar Forma de Pago</a></li>
        <li class=""><a href="configura.php" title="Volver Al inicio">Volver</a></li> 
	</ul>	
</div>
<div class="edita_fp"></div>
<form action="update_fp.php" name="datos" id="datos" method="post">
<input name="id" type="hidden" value="<?php echo $id ?>" />
<table border="0" class="tbl_imp">
  <tr>
    <td>Forma de Pago:</td>
    <td>
      <input name="nombre_fp" type="text" id="nombre_doc" size="30" maxlength="30" value="<?php echo $nombre ?>"  class="textbox"/>
    </td>
  </tr>
  <tr>
   
   <td></td>
   <td><p>&nbsp;</p></td>
  </tr>
   <tr>
    <td colspan="2" align="center"><button type="submit" ><img src="../img/disk.png" alt=""/> Grabar</button> 
      <button type="reset" class=""><img src="../img/delete.gif"alt=""/> Borrar</button></td>
    </tr>
</table>
</form>
</body>
</html>