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
include("../lib/funcion_suc_bod.php");
include("../lib/conexion.php");
$Db=Conectarse();
?>
<html>
<head>
<title>Listado de Bodegas</title>
<?php
$consulta_bod=mysql_query("select * from bodegas where estado='1' order by codigo_suc asc",$Db);
?>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
  <ul class="menu flt">
        <li class="current_page_item"><a href="man_bod.php" title="Crear Bodega">Crear Bodega</a></li>
        <li class=""><a href="listado_bod.php" title="Editar Bodega">Editar Bodega</a></li>
		<li class=""><a href="mantenedores.php" title="Volver">Volver</a></li>
	</ul>	
</div>

<div align="center">
<table id="gradient-style">
<tr>
<th scope="col">Id</td>
<th scope="col">Sucursal</th>
<th scope="col">Nombre</th>
<th scope="col">Editar</th>
</tr>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_bod))
{
$suc= sucursal($row[1]);
?>
<td><?php echo $row[0];?></td>
<td><?php echo $suc;?></td>
<td><?php echo $row[2];?></td>
<td> <a href="edita_bod.php?id=<?php echo $row[0]?>"> <img src="../img/bedit.png" border="0" title="Editar Bodega"> </a></td>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>