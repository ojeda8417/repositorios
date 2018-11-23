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
$Db=Conectarse();
$fecha= date("d/m/Y");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de Productos<?php echo $version; ?></title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="../lib/jquery-1.5.2.js" type="text/javascript"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<!--CARGAMOS EL COMBO DEPENDIENTE -->
<script language="javascript" type="text/JavaScript">
    $(document).ready(function(){
        $("#fam").change(function(event){
            var id = $("#fam").find(':selected').val();
            $("#sfam").load('genera-select2.php?id='+id);
        });
    });
</script>
<!--VALIDACIONES DEL FORMULARIO -->
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
    <li class="current_page_item"><a href="man_prod.php" title="Crear Producto">Crear Producto</a></li>
      <li class=""><a href="listado_prod.php" title="Editar Producto">Editar Producto</a></li>
      <li class=""><a href="mantenedores.php" title="Volver Al inicio">Volver</a></li>
	</ul>	
</div>
<div class="nvo_pro"></div>
<form action="add_pro.php" name="datos" id="datos" method="post">

<table border="0" class="tbl_imp">
  <tr>
    <td>Familia:</td>
    <td>
     <select name="fam" id="fam">
       <option selected="selected" value="">Seleccione Familia</option>
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
    <td>SubFamilia:</td>
    <td>
      <select name="sfam" id="sfam">
       <option selected="selected" value="">Seleccione SubFamilia</option>
     </select>
    </td>
  </tr>
  <tr>
    <tr>
    <td>Rut Prov:</td>
    <td><input type="text" name="rutp" id="rutp" size="8" maxlength="8" /></td>
  </tr>
    <td>Codigo:</td>
    <td><input type="text" name="codigo" id="codigo" size="30" maxlength="30" /></td>
  </tr>
  <tr>
    <td>Nombre:</td>
    <td><input type="text" name="glosa" id="glosa" size="30" maxlength="30" /></td>
  </tr>
   <tr>
    <td>Medida:</td>
    <td><select name="med" id="med">
       <option selected="selected" value="">Seleccione Medida</option>
        <?php
       $medida= mysql_query("select * from medidas where estado ='1'",$Db);
       while ($row=mysql_fetch_array($medida))
       {
       ?>
         <option value="<?php echo $row["COD_MEDIDA"]; ?>"><?php echo $row["GLOSA_MEDIDA"]; ?></option>
         <?php
       }
      ?>
     </select></td>
   </tr>
  <tr>
    <td>Fecha:</td>
    <td><input type="text" name="fecha" id="fecha" readonly size="10" value="<?php echo $fecha; ?>" /></td>
  </tr>
    <tr>
    <td><br/></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><button type="submit" ><img src="../img/disk.png" alt=""/> Grabar</button> 
      <button type="reset" class=""><img src="../img/delete.gif"alt=""/> Borrar</button></td>
    </tr>
</table>
</form>
</body>
</html>