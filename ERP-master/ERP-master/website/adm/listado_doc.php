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
<html>
<head>
<title>Listado de Documentos</title>
<?php
$consulta_doc=mysql_query("select * from documentos where estado='1' order by codigo_d asc",$Db);
?>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
        <li class=""><a href="conf_doc.php" title="Crear Documento">Crear Nuevo Documento</a></li>
        <li class="current_page_item"><a href="" title="Editar Documento">Editar Documento</a></li>
        <li class=""><a href="configura.php" title="Volver Al inicio">Volver</a></li>
      
	</ul>	
</div>

<div align="center">
<table id="gradient-style">
<tr>
<th scope="col">Id</th>
<th scope="col">Nombre</th>
<th scope="col">Editar</th>
</tr>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_doc))
{

?>
<td><?php echo $row[0];?></td>
<td><?php echo $row[1];?></td>
<td> <a href="edita_doc.php?id=<?php echo $row[0]?>"> <img src="../img/bedit.png" border="0" title="Editar Documento"> </a></td>
</tr>
<?php
}
?>
</table>
</div>

</body>
</html>