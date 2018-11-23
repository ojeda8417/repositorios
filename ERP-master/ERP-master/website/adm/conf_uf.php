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
	         nombre_m:{
			         required: true,
		         },

			 fecha:{
				    required: true
				 }

			 },
	messages: {
		    nombre_m: {
				  required: "El Nombre es OBLIGATORIO"
				 },
			
		   fecha:{
			     required: "La fecha es OBLIGATORIA"
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
<?php $fecha= date("d/m/Y"); ?>

<div class="menubg flt">
	<ul class="menu flt">
        <li class="current_page_item"><a href="#" title="Cargar Archivo UF">Subir UF</a></li>
        <li class=""><a href="xls/add_uf.php" title="Cargar UF Mensual">Procesar UF</a></li>
         <li class=""><a href="listado_uf.php" title="Revisar UF Cargada">Revisar UF Cargada</a></li>
        <li class=""><a href="configura.php" title="Volver Al inicio">Volver</a></li>
      
	</ul>	
</div>
<form action="upload_uf.php" name="datos" id="datos" method="post" enctype="multipart/form-data">
  
  
  <table border="0" id="tbl_uf">
  <tr>
    <td>Archivo a Cargar:</td>
    <td><div class="upload"><input name="upload" type="file"/></div></td>
  </tr>
  <tr>
    <td><p></p></td>
    <td></td>
  </tr>
  
    <tr>
    <td colspan="2" align="center"><button type="submit" ><img src="../img/disk.png" alt=""/> Subir</button> 
      <button type="reset" class=""><img src="../img/delete.gif"alt=""/> Borrar</button></td>
    </tr>
</table>
</form>
</body>
</html>