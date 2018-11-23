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
<?php 
$fecha= date("d/m/Y");
?>
<script src="../lib/jquery-1.5.2.js" type="text/javascript"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>

<title>Mantenedor de Usuarios<?php echo $version ?></title>
<head>
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
			fecha_alta:{
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
			  fecha_alta:{
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
<link href="../css/fs.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<?php $fecha= date("d/m/Y"); ?>
<div class="menubg flt">
  <ul class="menu flt">
	    <li  class=" current_page_item"><a href="#" title="Nuevo Usuario">Crear Usuario</a></li>
		<li class=""><a href="listado_usr.php" title="Editar Usuario">Editar Usuario</a></li>
		<li class=""><a href="mantenedores.php" title="Ir al Menu Principal">Volver</a></li>
	</ul>	
</div>
<div class="fondo_user"> </div>
<form id="datos" name="datos" method="post" action="add_usr.php">
<table border="0" class="tbl_imp">
  <tr>
    <td width="133">Rut:</td>
    <td width="173"><input name="rut" type="text" id="rut" size="10" maxlength="8" /> <input name="dv" type="text" size="2" maxlength="1"  id="dv"/></td>
  </tr>
  <tr>
    <td>Nombres:</td>
    <td>
      <input name="nombre" type="text" id="nombre" maxlength="50" class="textbox" />
   </td>
  </tr>
  <tr>
    <td>Apellidos:</td>
    <td><input name="apellido" type="text" id="apellido" maxlength="50" class="textbox" /></td>
  </tr>
  <tr>
    <td>Fecha de Alta:</td>
    <td><input name="fecha_alta" type="text" id="fecha_alta" readonly  maxlength="10" value="<?php echo $fecha; ?>"></td>
  </tr>
  <tr>
    <td>Ingrese Password:</td>
    <td><input name="clave" type="password" id="clave" maxlength="8"/></td>
  </tr>
  <tr>
    <td>Perfil de Usuario:</td>
    <td><select name="sel_usr" id="sel_usr">
    <option selected="selected" value="">Seleccione Perfil</option>
         <?php
           $perfil= mysql_query("select * from perfiles where ESTADO ='1'",$Db);
            while ($Rs=mysql_fetch_array($perfil))
            {
             ?>
           <option value="<?php echo $Rs["CODIGO_P"]; ?>"><?php echo $Rs["GLOSA_P"]; ?></option>
            <?php
             }
            ?>
    </select>
    </td>
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
        <td>Sucursal Origen:</td>
        <td><select name="sel_suc" id="sel_suc">
                <option selected="selected" value="">Seleccione Sucursal</option>
                <?php
                $perfil= mysql_query("select * from sucursales where ESTADO ='1'",$Db);
                while ($Rs=mysql_fetch_array($perfil))
                {
                    ?>
                    <option value="<?php echo $Rs["CODIGO_SUC"]; ?>"><?php echo $Rs["GLOSA_S"]; ?></option>
                <?php
                }
                ?>
            </select>
        </td>
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
