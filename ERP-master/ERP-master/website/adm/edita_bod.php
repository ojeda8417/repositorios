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
include("../lib/conexion.php");
$Db=Conectarse();

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de Sucursales</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
  <ul class="menu flt">
        <li class=""><a href="mant_bod.php" title="Crear Bodega">Crear Bodega</a></li>
        <li class="current_page_item"><a href="#" title="Editar Bodega">Editar Bodega</a></li>
		<li class=""><a href="mantenedores.php" title="Volver">Volver</a></li>
	</ul>	
</div>
<div class="fondo_bod"></div>
<form name="" action="" method="post">
<table border="0" class="grilla_usr">
  <tr>
    <td width="52">Codigo:</td>
    <td width="335"><input name="cod" type="text" id="cod" size="10" maxlength="10" disabled="true" value="2" /></td>
  </tr>
  <tr>
    <td>Nombre:</td>
    <td>
      <input name="nombre" type="text" id="nombre" maxlength="50"  disabled="true" value="BODEGA VITACURA"/>
   </td>
  </tr>
  <tr>
    <td>Sucursal:</td>
    <td><select name="sucursal" id="select">
      <option value="1">CASA MATRIZ</option>
      <option value="2">SUCURSAL VITACURA</option>
    </select></td>
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
     <td colspan="2"><button type="submit" ><img src="../img/disk.png" alt=""/> Guardar</button> 
      <button type="reset" class=""><img src="../img/delete.gif"alt=""/> Borrar</button></td>
   </tr>
   
</table>

</form>


</body>
</html>