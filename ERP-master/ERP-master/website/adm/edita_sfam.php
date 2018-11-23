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
include("../lib/conexion.php");
include("../lib/funciones.php");
$Db=Conectarse();

$cod= $_GET["id"];
$consulta_sf=mysql_query("SELECT * FROM subfamilia WHERE codigo_sf='$cod'",$Db);
while ($row=mysql_fetch_array($consulta_sf))
{
$cod_f=$row[1];
$glosa_f=familia($cod_f);
$glosa=	$row[2];
$val_est=$row[3];
$estado=estado($row[3]);
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de SubFamilias <?php echo $version; ?></title>
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
				  required: "*"
				 },
			
		   nombre:{
			     required: "*"
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
      <li class="current_page_item"><a href="man_subfam.php" title="Crear SubFamilia">Crear SubFamilia</a></li>
      <li class=""><a href="sel_subfam.php" title="Editar SubFamilia">Editar SubFamilia</a></li>
      <li class=""><a href="mantenedores.php" title="Volver Al inicio">Volver</a></li>
	</ul>	
</div>
<div class="nva_sfam"></div>
<form action="update_sfam.php" name="datos" id="datos" method="post">

<table border="0" class="tbl_imp">
  <tr>
    <td>Familia:</td>
    <td>
     <select name="fam">
       <option selected="selected" value="<?php echo $cod_f; ?>"><?php echo $glosa_f ?></option>
         <?php
       $familia= mysql_query("select * from familia where estado ='1'",$Db);
       while ($Rs=mysql_fetch_array($familia))
       {
       ?>
         <option value="<?php echo $Rs["CODIGO_F"]; ?>"><?php echo $Rs["GLOSA_F"]; ?></option>
         <?php
       }
      ?>
     </select>
    </td>
  </tr>
  <tr>
    <td>Codigo:</td>
    <td>
      <input name="cod_sf" type="text" id="cod_sf"  readonly="readonly" size="10" maxlength="10"  class="textbox" value="<?php echo $cod; ?>"/>
    </td>
  </tr>
  <tr>
    <td>Nombre:</td>
    <td><input type="text" name="nombre" id="nombre" size="35" maxlength="35" value="<?php echo $glosa; ?>" /></td>
  </tr>
  <tr>
    <td>Estado:</td>
    <td><select name="estado_sf">
     <option value="<?php echo $val_est; ?>"><?php echo $estado; ?></option>
     <option value="0">INACTIVO</option>
     <option value="1">ACTIVO</option>
    </select></td>
  </tr>
  <tr>
    <td><br></td>
  </tr>
  
    <tr>
    <td colspan="2" align="center"><button type="submit" ><img src="../img/disk.png" alt=""/> Grabar</button> 
      <button type="reset" class=""><img src="../img/delete.gif" alt=""/> Borrar</button></td>
    </tr>
</table>
</form>
</body>
</html>