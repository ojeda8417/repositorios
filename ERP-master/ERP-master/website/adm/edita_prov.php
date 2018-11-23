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

$id_pro=$_GET["id"];
$consulta_prov=mysql_query("SELECT * FROM proveedores WHERE RUT_P='$id_pro'",$Db);
while ($row=mysql_fetch_array($consulta_prov))
{
$dv= $row[1];  
$val_r= $row[2]; 
$reg= region($row[2]); 
$com= $row[3];  
$rsoc= $row[4];  
$nfan= $row[5];  
$giro= $row[6];  
$dir= $row[7];  
$tel= $row[8];
$con= $row[9];
$val_e= $row[10];
$est_p=estado($row[10]);
}



?>

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
			estado:{
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
			estado:{
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
        <li class=""><a href="man_prov.php" title="Nuevo Cliente">Nuevo Proveedor</a></li>
        <li class=""><a href="listado_prov.php" title="Editar Cliente">Actualizar Proveedor</a></li>
		<li class=""><a href="mantenedores.php" title="Volver al Inicio">Volver</a></li>
	</ul>	
</div>
<div class="fondo_prov"> </div>
<form id="datos" name="datos" method="post" action="update_prov.php">
<table width="100%" border="0" class="tbl_clte" >
  <tr>
    <td>Rut</td>
    <td>
 <input name="rut_emp" readonly type="text" id="rut_emp" size="10" maxlength="8" value="<?php echo $id_pro; ?>" />
 <input name="dv_emp" readonly type="text" id="dv_emp" size="1" maxlength="1" value="<?php echo $dv; ?>" /></td>
    <td>Nombre Fantasia:</td>
    <td><input name="fantasia" type="text" id="fantasia" size="35" maxlength="35" value="<?php echo $nfan; ?>" /></td>
  </tr>
  <tr>
    <td>Razon Social:</td>
  <td><input name="razonsoc" type="text" id="razonsoc" size="40" maxlength="40" value="<?php echo $rsoc; ?>"/></td>
    <td>Giro:</td>
    <td><input name="giro" type="text" id="giro" size="35" maxlength="40" value="<?php echo $giro; ?>" /></td>
    </tr>
  <tr>
    <td>Contacto:</td>
    <td><input name="contacto" type="text" id="contacto" size="40" maxlength="40" value="<?php echo $con; ?>"/></td>
    <td>Telefono</td>
    <td><input name="fono_emp" type="text" id="fono_emp" size="10" maxlength="9" value="<?php echo $tel; ?>" /></td>
    </tr>
  <tr>
    <td>Region</td>
    <td><select name="region_clte" id="region_clte">
      <option  selected="selected" value="<?php echo $val_r;?>"><?php echo $reg?></option>
       <?php
       $perfil= mysql_query("select * from region",$Db);
       while ($Rs=mysql_fetch_array($perfil))
       {
       ?>
         <option value="<?php echo $Rs["CODIGO_R"]; ?>"><?php echo strtoupper($Rs["GLOSA_R"]); ?></option>
         <?php
       }
      ?>
    </select></td>
    <td>Comuna</td>
    <td><select name="comuna_clte" id="comuna_clte">
      <?php $c_comuna=mysql_query("SELECT GLOSA_C FROM comuna WHERE CODIGO_C= '$com' " ,$Db); 
     $fila=mysql_fetch_array($c_comuna);
    ?>
      <option selected="selected" value="<?php echo $com;?>"><?php echo $fila[0];?></option>
    </select></td>
    </tr>
   <tr>
    <td>Direccion</td>
     <td><input  name="dire_emp" type="text" size="30" value="<?php echo $dir?>"/></td>
      <td>Estado:</td>
      <td><select name="estado">
     <option selected="selected" value="<?php echo $val_e;?>"><?php echo $est_p; ?> </option>
      <option value="0">INACTIVO</option>
      <option value="1">ACTIVO</option>
    </select>
    </td>
   </tr>
  <tr> 
   <td><br/></td>
   <td><input type="submit" name="graba" id="graba" value="Grabar" />
     <input type="reset" name="Limpia" id="Limpia" value="Limpiar" /></td>
  </tr>
</table>
 </form>
</body>
</html>