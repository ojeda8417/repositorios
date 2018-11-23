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
<title>Listado de Perfiles</title>
<?php
$consulta_perfil=mysql_query("SELECT * FROM perfiles order by CODIGO_P asc",$Db);
?>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
	    <li  class=" current_page_item"><a href="man_perfil.php" title="Nueva Perfil">Crear Perfil</a></li>
		<li class=""><a href="#" title="Editar Perfil">Editar Perfil</a></li>
		<li class=""><a href="mantenedores.php" title="Ir al Menu Principal">Volver</a></li>
	</ul>	
</div>
<div align="center">
<table id="gradient-style">
<tr>
<th scope="col">Nombre Perfil</th>
<th scope="col">Accede a</th>
<th scope="col">Estado</th>
<th scope="col">Editar</th>
</tr>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_perfil))
{
$usr_est=estado($row[3]);
?>
<td><?php echo strtoupper($row[1]);?></td>
<td><?php echo strtoupper($row[2]);?></td>
<td><?php echo strtoupper($usr_est);?></td>
<td> <a href="edita_perf.php?id=<?php echo $row[0]?>"> <img src="../img/bedit.png" border="0" title="Editar Perfil"> </a></td>
</tr>
<?php
}
?>
</table>
</div>

</body>
</html>