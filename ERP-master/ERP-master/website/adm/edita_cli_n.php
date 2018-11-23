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
include("../lib/funciones.php");
include("../lib/conexion.php");
$Db=Conectarse();

$rut_c= $_GET["rut"];

$con_cli=mysql_query("SELECT * FROM clientes WHERE RUT='$rut_c' AND TIPO_CLI='1'",$Db);
if($row=mysql_fetch_array($con_cli))
{
$rut_c=$row[0];
$dv_c=$row[1];
$reg_c=region($row[2]);
$com_c=$row[3];
$n1_c=$row[4];
$n2_c=$row[5];
$a1_c=$row[6];
$a2_c=$row[7];
$d_c=$row[8];
$tel_c=$row[9];
$t_c=1;
//$estado=$row[11];
}
$est_c=estado($row[11]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de Clientes</title>
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
	         rut_clte:{
			         required: true,
					 number:true
		         },
			 dv_clte:{
				     required: true
					 
				 },
			 nombre1:{
				    required: true
				 },
			nombre2:{
					required: true
				},	 
			ape_paterno:{
					required: true
				},
			ape_materno:{
					required: true
				},
			region_clte:{
					required: true
				},
			comuna_clte:{
					required: true
				},
			dire_clte:{
					required: true
				},
			estado:{
					required: true
				}			
			 },
	messages: {
		    rut_clte: {
				  required: "*"
				 },
			dv_clte:{
				 required: "*"
				},
		  	nombre1:{
				 required: "*"
				},
			nombre2:{
				 required: "*"
				},
		   ape_paterno:{
				 required: "*"
				},
		  ape_materno:{
				 required: "*"
				},
			region_clte:{
				 required: "*"
				},
			comuna_clte:{
				 required: "*"
				},
			dire_clte:{
				 required: "*"
				},
		     estado:{
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
        <li class=""><a href="" title="Nuevo Cliente">Nuevo Cliente</a></li>
        <li class=""><a href="cliente_emp.php" title="Nuevo Cliente Empresa">Nueva Empresa</a></li>
        <li class=""><a href="tip_cli.php" title="Editar Cliente">Actualizar Cliente</a></li>
		<li class=""><a href="mantenedores.php" title="Volver al Inicio">Volver</a></li>
	</ul>	
</div>
<div class="fondo_clte"> </div>
<form id="datos" name="datos" method="post" action="update_cli_n.php">
<table width="100%" border="0" class="tbl_clte" bordercolor="#FFFFFF">
  <tr>
    <td>Rut</td>
    <td>
      <input name="rut_clte" type="text" id="rut_clte" readonly size="10" maxlength="8"  value="<?php echo $rut_c; ?>"/>
      <input name="dv_clte" type="text" id="dv_clte"  readonly="readonly" size="1"  value="<?php echo $dv_c; ?>" maxlength="1" /></td>
    <td>Primer Nombre</td>
    <td><input name="nombre1" type="text" id="nombre1" size="20" maxlength="20" value="<?php echo $n1_c; ?>" /></td>
  </tr>
  <tr>
    <td>Segundo Nombre</td>
    <td><input name="nombre2" type="text" id="ape_paterno" size="40" maxlength="40" value="<?php echo $n2_c; ?>" /></td>
    <td>Apellido Paterno</td>
    <td><input name="ape_paterno" type="text" id="ape_materno" size="40" maxlength="40"  value="<?php echo $a1_c; ?>"/></td>
    </tr>
  <tr>
    <td>Apellido Materno</td>
    <td><input name="ape_materno" type="text" id="apem_clte" size="40" maxlength="40" value="<?php echo $a2_c; ?>" /></td>
    <td>Telefono</td>
    <td><input name="fono_clte" type="text" id="fono_clte" size="10" maxlength="9" value="<?php echo $tel_c; ?>" /></td>
    </tr>
  <tr>
    <td>Region</td>
    <td><select name="region_clte" id="region_clte">
      <option  selected="selected" value=""><?php echo $reg_c; ?></option>
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
    <?php $c_comuna=mysql_query("SELECT GLOSA_C FROM comuna WHERE CODIGO_C= '$com_c' " ,$Db); 
     $fila=mysql_fetch_array($c_comuna);
    ?>
    <td><select name="comuna_clte" id="comuna_clte">
     <option value=""><?php echo $fila[0];?></option>
    </select></td>
    </tr>
  <tr>
    <td>Direccion</td>
     <td><input  name="dire_clte" type="text" size="30" value="<?php echo $d_c; ?>"/>   </td>
    <td>Estado:</td>
      <td><select name="estado" id="estado"/> 
           <option  selected="selected" value=""><?php echo $est_c;  ?></option>
           <option value="0">INACTIVO</option>
           <option value="1">ACTIVO</option>
           
          </select>
      </td>
   </tr>
   <tr>
      
       <td>&nbsp;</td>
      <td>&nbsp;</td>
   </tr>
  <tr> 
   <td>&nbsp;</td>
   <td><input type="submit" name="graba" id="graba" value="Grabar" />
     <input type="reset" name="Limpia" id="Limpia" value="Limpiar" />
    </td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
  </tr>
</table>
 </form>
</body>
</html>