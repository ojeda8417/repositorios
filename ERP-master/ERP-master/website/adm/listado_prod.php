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
<title>Listado de Usuarios</title>
<?php
$consulta_prod=mysql_query("SELECT * FROM productos ORDER BY CODIGO_F ASC",$Db);

?>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
    <li class="current_page_item"><a href="man_prod.php" title="Crear Producto">Crear Producto</a></li>
      <li class=""><a href="listado_prod.php" title="Editar Producto">Editar Producto</a></li>
      <li class=""><a href="mantenedores.php" title="Volver Al inicio">Volver</a></li>
	</ul>	
</div>

<div align="center">
<table id="gradient-style" >
<thead>
<tr>
<th scope="col">Codigo</th>
<th scope="col">Familia</th>
<th scope="col">SubFamilia</th>
<th scope="col">Proveedor</th>
<th scope="col">Nombre</th>
<th scope="col">Medida</th>
<th scope="col">Alta</th>
<th scope="col">Estado</th>
<th scope="col">Editar</th>
</tr>
</thead>
<tfoot>
</tfoot>
<tbody>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_prod))
{
$fami=familia($row[1]);
$sfam=sfamilia($row[2]);
$med=medida_($row[5]);
$est_pr=estado($row[7]);
?>
<td><?php echo $row[0];?></td>
<td><?php echo $fami;?></td>
<td><?php echo $sfam;?></td>
<td><?php echo $row[3];?></td>
<td><?php echo $row[4];?></td>
<td><?php echo $med;?></td>
<td><?php echo $row[6];?></td>
<td><?php echo $est_pr;?></td>
<td> <a href="edita_prod.php?id=<?php echo $row[0]?>"> <img src="../img/bedit.png" border="0" title="Editar Producto"> </a></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>

</body>
</html>