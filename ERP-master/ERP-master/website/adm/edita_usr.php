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
$rut_usr= $_GET["rut"];
//echo $rut_usr;
$consurut = mysql_query("SELECT * FROM usuario WHERE USUARIO='$rut_usr'",$Db);

if($row=mysql_fetch_array($consurut))
{
$rut_edita=$row[0];

$tip_usr=usuario($row[0]);

if($row[4]==0)
{
$usr_est="INACTIVO";
}
if($row[4]==1)
{
$usr_est="ACTIVO";
}
}

?>
<head>
<script src="../lib/jquery-1.5.2.js" type="text/javascript"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<title>Sistema de Bodega 1.0.1 Beta Modulo Administracion</title>

<script type="text/javascript">
$(document).ready(function() {
$("#datos").validate({
     rules: {
	         rut:{
			         required: true,
					 number: true
		         },
			 dv:{
				     required: true
				 },
			 nombre:{
				    required: true
				 },
			apellido:{
				    required: true
				},
			clave:{
				   required:true
				},
			sel_usr:{
				  required:true
				},
			sel_estado:{
				  required:true
				}		 	 	
			 },
	messages: {
		    rut: {
				  required: "*",
				  number: "*"
				 },
			dv:{
				 required: "*"
				},
		   nombre:{
			     required: "*"
			   },
		   apellido:{
			     required: "*"
			    
			   },
		  clave:{
			    required: "*"
			  },
		 sel_usr:{
			   required: "*"
			 },
		 sel_estado:{
			   required: "*"
			 }
		
		} 
    
})
})
</script>
<link href="../adm/menu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
	    <li  class=""><a href="man_usr.php" title="Nuevo Usuario">Crear Usuario</a></li>
		<li class="current_page_item"><a href="" title="Editar Usuario">Editar Usuario</a></li>
		<li class=""><a href="man_usr.php" title="Ir al Menu Principal">Volver</a></li>
	</ul>	
</div>
<div class="actu_user"></div>
<form id="actu_datos" name="actu_datos" method="post" action="update_usr.php">
<table border="0" class="grilla_usr">
  <tr>
    <td width="133">Usuario:</td>
    <td width="873"><input name="rut" type="text" id="rut" size="10" maxlength="8" readonly  value="<?php echo $rut_edita; ?>"/></td>
  </tr>
  <tr>
    <td>Ingrese Password:</td>
    <td> <input name="clave" type="password" id="clave" maxlength="6"/> </td>
  </tr>
  <tr>
    <td>Perfil de Usuario:</td>
    <td><select name="sel_usr" id="sel_usr">
    <option selected="selected" value="<?php echo $row[1]; ?>"><?php echo $tip_usr;?></option>
      <?php
           $perfil= mysql_query("select * from PERFILES where estado ='1'",$Db);
            while ($Rs=mysql_fetch_array($perfil))
            {
             ?>
           <option value="<?php echo $Rs["CODIGO_P"]; ?>"><?php echo $Rs["GLOSA_P"]; ?></option>
            <?php
             }
            ?>
    </select></td>
  </tr>
  <tr>
    <td>Estado:</td>
    <td>
    <select name="sel_estado" id="sel_estado">
    <option selected="selected" value="<?php echo $row[4]; ?>"><?php echo $usr_est; ?></option>
    <option value="1">ACTIVO</option>
    <option value="0">INACTIVO</option>
    <option value="9999">BAJA</option>
    </select>
    </td>
  </tr>
   <tr>
    <td colspan="2"><button type="submit" ><img src="../img/disk.png" alt=""/> Actualizar</button> 
      <button type="reset" class=""><img src="../img/delete.gif"alt=""/> Borrar</button>
    </tr>
</table>

</form>
</body>
</html>
