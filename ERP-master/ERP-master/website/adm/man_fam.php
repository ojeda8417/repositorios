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
include("../lib/version.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de Familias<?php echo $version; ?></title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="../lib/jquery-1.5.2.js" type="text/javascript"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#datos").validate({
     rules: {
	         cod_f:{
			         required: true
		         },

			 nombre:{
				    required: true
				 }

			 },
	messages: {
		    cod_f: {
				  required: "El codigo es OBLIGATORIO"
				 },
			
		   nombre:{
			     required: "El nombre es OBLIGATORIA"
			   }
		} 
    
})
})
</script>
</head>

<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
      <li class="current_page_item"><a href="#" title="Crear Nueva Familia">Crear Familia</a></li>
      <li class=""><a href="listado_fam.php" title="Editar Familia">Editar Familia</a></li>
      <li class=""><a href="mantenedores.php" title="Volver Al inicio">Volver</a></li>
	</ul>	
</div>
<div class="nva_fam"></div>
<form action="add_fam.php" name="datos" id="datos" method="post">

<table border="0" class="tbl_imp">
  <tr>
    <td title="Utilice Codigo de Familia">Codigo:</td>
    <td>
      <input name="cod_f" type="text" id="cod_f" size="10" maxlength="10"  class="textbox"/>
    </td>
  </tr>
  <tr>
    <td>Nombre:</td>
    <td><input type="text" name="nombre" id="nombre" size="30" maxlength="30" /></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p></td>
    <td></td>
  </tr>
  
    <tr>
    <td colspan="2" align="center"><button type="submit" ><img src="../img/disk.png" alt=""/> Grabar</button> 
      <button type="reset" class=""><img src="../img/delete.gif"alt=""/> Borrar</button></td>
    </tr>
</table>
</form>
</body>
</html>