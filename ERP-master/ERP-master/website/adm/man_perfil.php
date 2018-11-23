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
<head>
<script src="../lib/jquery-1.5.2.js" type="text/javascript"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<title>Mantenedor de Perfiles<?php echo $version; ?></title>

<script type="text/javascript">
$(document).ready(function() {
$("#datos").validate({
     rules: {
	         codigo:{
			         required: true,
					 number: true
		         },
			 menu:{
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
		    codigo: {
				  required: "*",
				  number: "*"
				 },
			menu:{
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
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
	    <li  class=" current_page_item"><a href="#" title="Nueva Perfil">Crear Perfil</a></li>
		<li class=""><a href="listado_perf.php" title="Editar Perfil">Editar Perfil</a></li>
		<li class=""><a href="mantenedores.php" title="Ir al Menu Principal">Volver</a></li>
	</ul>	
</div>
<div class="fondo_perfil"></div>
<form id="datos" name="datos" method="post" action="add_perf.php">
<table border="0" class="grilla_usr">
  <tr>
    <td >Codigo:</td>
    <td ><input name="codigo" type="text" id="codigo" size="10" maxlength="8" /></td>
  </tr>
  <tr>
    <td>Nombre:</td>
    <td>
      <input name="nombre" type="text" id="nombre" maxlength="50" />
   </td>
  </tr>
  <tr>
      <td>Acceso a:</td>
      <td> <select name="menu"> 
        <option selected="selected" value="">Seleccione Menu</option>
        <option value="11">ADMINISTRACION</option>
        <option value="BODEGA">BODEGA</option>
        <option value="VENTAS">VENTAS</option>
        <option value="CONTAB">CONTABILIDAD</option>
        <option value="RRHH">RRHH</option>
     
     </select>  </td>
  </tr>
  <tr>
    <td>Estado:</td>
    <td><select name="sel_estado" id="sel_estado">
      <option selected="selected" value="">Seleccione Estado</option>
      <option value="1">ACTIVO</option>
      <option value="0">INACTIVO</option>
      </select></td>
  </tr>
   <tr>
    <td><br></td>
   </tr>
   <tr>
    <td colspan="2"><button type="submit" ><img src="../img/disk.png" alt=""/> Guardar</button> 
      <button type="reset" class=""><img src="../img/delete.gif"alt=""/> Borrar</button></td>
    </tr>
</table>
</form>
</body>
</html>
