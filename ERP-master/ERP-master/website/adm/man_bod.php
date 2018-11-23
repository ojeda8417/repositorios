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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de Bodegas<?php echo $version; ?></title>
<script type="text/javascript">
$(document).ready(function() {
$("#datos").validate({
     rules: {
			nombre:{
				  required:true
				},
			sel_suc:{
				  required:true
				},
			estado:{
				  required:true
				}		 	 	
			 },
	messages: {
		  
		   nombre:{
			     required: "*"
			      },
		   sel_suc:{
			     required: "*"
			      },
		   estado:{
			    required: "*"
			 }
		} 
    
})
})
</script>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
  <ul class="menu flt">
        <li class="current_page_item"><a href="mant_bod.php" title="Crear Bodega">Crear Bodega</a></li>
        <li class=""><a href="listado_bod.php" title="Editar Bodega">Editar Bodega</a></li>
		<li class=""><a href="mantenedores.php" title="Volver">Volver</a></li>
	</ul>	
</div>
<div class="fondo_bod"></div>
<form name="datos" id="datos" action="add_bod.php" method="post">
<table border="0" class="grilla_usr">
  <tr>
    <td>Nombre:</td>
    <td>
      <input name="nombre" type="text" id="nombre" maxlength="50" />
   </td>
  </tr>
  <tr>
    <td>Sucursal:</td>
    <td><select name="sel_suc" id="sel_suc">
      <option selected="selected" value="0">Seleccione Sucursal</option>
            <?php
            $doc= mysql_query("select * from SUCURSALES where ESTADO='1'",$Db);
            while ($Rs=mysql_fetch_array($doc))
            {
                ?>
                <option value="<?php echo $Rs["CODIGO_SUC"]; ?>"><?php echo $Rs["GLOSA_S"]; ?></option>
            <?php
            }
            ?>
    </select></td>
  </tr>
   <tr>
    <td>Estado:</td>
    <td><select name="estado" id="estado">
      <option selected="selected" value="">Seleccione Estado</option>
      <option value="1">ACTIVO</option>
      <option value="0">INACTIVO</option>
      </select></td>
  </tr>
   <tr>
    <td> <br> </td>
   </tr>
   <tr>
     <td colspan="2"><button type="submit" ><img src="../img/disk.png" alt=""/> Guardar</button> 
      <button type="reset" class=""><img src="../img/delete.gif"alt=""/> Borrar</button></td>
   </tr>
   
</table>

</form>


</body>
</html>