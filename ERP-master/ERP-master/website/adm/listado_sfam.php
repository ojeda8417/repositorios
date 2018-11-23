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

$fam=$_POST["fam"];
include("../lib/conexion.php");
include("../lib/funciones.php");
$Db=Conectarse();
$consulta_sfam=mysql_query("SELECT * FROM subfamilia WHERE CODIGO_F='$fam' order by CODIGO_SF asc",$Db);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
<html>
<head>
<title>Listado de SubFamilias</title>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
      <li class="current_page_item"><a href="man_subfam.php" title="Crear Nueva Familia">Crear SubFamilia</a></li>
      <li class=""><a href="sel_subfam.php" title="Editar Familia">Editar SubFamilia</a></li>
      <li class=""><a href="man_subfam.php" title="Volver Al inicio">Volver</a></li>
      
	</ul>	
</div>

<div align="center">
<table id="gradient-style">
<tr>
<th scope="col">Codigo SF</th>
<th scope="col">Nombre SF</th>
<th scope="col">Estado</th>
<th scope="col">Editar</th>
</tr>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_sfam))
{

$fam_est=estado($row[3]);

?>
<td><?php echo strtoupper($row[0]);?></td>
<td><?php echo strtoupper($row[2]);?></td>
<td><?php echo strtoupper($fam_est);?></td>

<td> <a href="edita_sfam.php?id=<?php echo $row[0]?>"> <img src="../img/bedit.png" border="0" title="Editar 
SubFamilia"> </a></td>
</tr>
<?php
}
?>
</table>
</div>

</body>
</html>