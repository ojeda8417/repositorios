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
?>
<html>
<head>
<title>Listado de Sucursales</title>
<?php
$consulta_suc=mysql_query("SELECT * FROM sucursales ORDER BY CODIGO_SUC ASC",$Db);
?>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
  <ul class="menu flt">
        <li class=""><a href="man_suc.php" title="Crear Sucursal">Crear Sucursal</a></li>
        <li class=""><a href="listado_suc.php" title="Editar Sucursal">Editar Sucursal</a></li>
		<li class=""><a href="man_suc.php" title="Volver">Volver</a></li>
	</ul>	
</div>

<div align="center">
<table id="gradient-style">
<tr>
<th scope="col">Nro Suc</th><!--codigo_suc -->
<th scope="col">Nombre</th><!--glosa_s -->
<th scope="col">Direccion</th><!--direc_s -->
<th scope="col">Telefono</th><!--Telef_s -->
<th scope="col">Administrador</th><!--admin_s -->
<th scope="col">Region</th><!--codigo_r -->
<th scope="col">Comuna</th><!--codigo_c -->
<th scope="col">Estado</th><!--estado -->
<th scope="col">Editar</th><!--sin valor -->
</tr>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_suc))
{
$reg_suc= region($row[1]);	

$com_suc=$row[2];

$suc_est=estado($row[7]);


?>
<td><?php echo $row[0];?></td>
<td><?php echo $row[3];?></td>
<td><?php echo $row[4];?></td>
<td><?php echo $row[5];?></td>
<td><?php echo $row[6];?></td>
<td><?php echo $reg_suc;?></td>
<?php $c_comuna=mysql_query("SELECT GLOSA_C FROM comuna WHERE CODIGO_C= '$com_suc' " ,$Db); 
$fila=mysql_fetch_array($c_comuna);
?>
<td><?php echo $fila[0];?></td>
<td><?php echo $suc_est;?></td>
<td> <a href="edita_suc.php?codsuc=<?php echo $row[0]?>"> <img src="../img/bedit.png" border="0" title="Editar Sucursal"> </a></td>
</tr>
<?php
}
?>
</table>
</div>

</body>
</html>