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
<?php
include("../lib/version.php");
include("../lib/conexion.php");
$Db=Conectarse();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de Clientes<?php echo $version; ?></title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../lib/jquery-1.5.2.js"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#region_clte").change(function(event){
            var id = $("#region_clte").find(':selected').val();
            $("#comuna_clte").load('genera-select.php?id='+id);
        });
    });
</script>
<script type="text/javascript">
$(document).ready(function() {
$("#datos").validate({
     rules: {
	         rut_emp:{
			         required: true,
					 number:true
		         },
			 dv_emp:{
				     required: true
					 
				 },
			 fantasia:{
				    required: true
				 },
			razonsoc:{
					required: true
				},	 
			giro:{
					required: true
				},
			contacto:{
					required: true
				},
			region_clte:{
					required: true
				},
			comuna_clte:{
					required: true
				},
			dire_emp:{
					required: true
				},
			fono_emp:{
					required: true
				}		
			 },
	messages: {
		    rut_emp: {
				  required: "*"
				 },
			dv_emp:{
				 required: "*"
				},
		  	fantasia:{
				 required: "*"
				},
			razonsoc:{
				 required: "*"
				},
		   giro:{
				 required: "*"
				},
		  contacto:{
				 required: "*"
				},
			region_clte:{
				 required: "*"
				},
			comuna_clte:{
				 required: "*"
				},
			dire_emp:{
				 required: "*"
				},
			fono_emp:{
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
        <li class=""><a href="clientes.php" title="Nuevo Cliente">Nuevo Cliente</a></li>
        <li class=""><a href="" title="Nueva Empresa">Nueva Empresa</a></li>
        <li class=""><a href="tip_cli.php" title="Editar Cliente">Actualizar Cliente</a></li>
		<li class=""><a href="mantenedores.php" title="Volver al Inicio">Volver</a></li>
	</ul>	
</div>
<div class="fondo_clte"> </div>
<form id="datos" name="datos" method="post" action="add_emp.php">
<table width="100%" border="0" class="tbl_clte" bordercolor="#FFFFFF">
  <tr>
    <td>Rut</td>
    <td>
      <input name="rut_emp" type="text" id="rut_emp" size="10" maxlength="8" />
      <input name="dv_emp" type="text" id="dv_emp" size="1" maxlength="1" /></td>
    <td>Nombre Fantasia:</td>
    <td><input name="fantasia" type="text" id="fantasia" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td>Razon Social:</td>
    <td><input name="razonsoc" type="text" id="razonsoc" size="40" maxlength="40" /></td>
    <td>Giro:</td>
    <td><input name="giro" type="text" id="giro" size="40" maxlength="40" /></td>
    </tr>
  <tr>
    <td>Contacto:</td>
    <td><input name="contacto" type="text" id="contacto" size="40" maxlength="40" /></td>
    <td>Telefono</td>
    <td><input name="fono_emp" type="text" id="fono_emp" size="10" maxlength="9" /></td>
    </tr>
  <tr>
    <td>Region</td>
    <td><select name="region_clte" id="region_clte">
      <option  selected="selected" value="">Seleccione Region</option>
       <?php
       $perfil= mysql_query("select * from region",$Db);
       while ($Rs=mysql_fetch_array($perfil))
       {
       ?>
         <option value="<?php echo $Rs["CODIGO_R"]; ?>"><?php echo $Rs["GLOSA_R"]; ?></option>
         <?php
       }
      ?>
    </select></td>
    <td>Comuna</td>
    <td><select name="comuna_clte" id="comuna_clte">
     <option selected="selected">Seleccione Comuna</option>
    </select></td>
    </tr>
  <tr>
    <td>Direccion</td>
     <td><input  name="dire_emp" type="text" size="30"/>   </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
   </tr>
   <tr>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
   </tr>
  <tr> 
   <td>&nbsp;</td>
   <td><input type="submit" name="graba" id="graba" value="Grabar" />
     <input type="reset" name="Limpia" id="Limpia" value="Limpiar" /></td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
</table>
 </form>
</body>
</html>