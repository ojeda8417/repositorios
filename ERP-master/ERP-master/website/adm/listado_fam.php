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
include("../lib/funciones.php");
$Db=Conectarse();
?>
<html>
<head>
<title>Listado de Familias</title>
<?php
$consulta_fam=mysql_query("SELECT * FROM familia order by CODIGO_F asc",$Db);
?>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
      <li class="current_page_item"><a href="man_fam.php" title="Crear Nueva Familia">Crear Familia</a></li>
      <li class=""><a href="listado_fam.php" title="Editar Familia">Editar Familia</a></li>
      <li class=""><a href="man_fam.php" title="Volver Al inicio">Volver</a></li>
      
	</ul>	
</div>

<div align="center">
<table id="gradient-style">
<tr>
<th scope="col">Codigo</th>
<th scope="col">Nombre Familia</th>
<th scope="col">Estado</th>
<th scope="col">Editar</th>
</tr>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_fam))
{
$fam_est=estado($row[2]);
?>
<td><?php echo strtoupper($row[0]);?></td>
<td><?php echo strtoupper($row[1]);?></td>
<td><?php echo strtoupper($fam_est);?></td>

<td> <a href="edita_fam.php?id=<?php echo $row[0]?>"> <img src="../img/bedit.png" border="0" title="Editar Familia"> </a></td>
</tr>
<?php
}
?>
</table>
</div>

</body>
</html>