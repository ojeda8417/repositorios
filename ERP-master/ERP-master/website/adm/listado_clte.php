<?php
include("../lib/conexion.php");
$Db=Conectarse();
?>
<html>
<head>
<title>Listado de Usuarios</title>
<?php
$consulta_usuarios=mysql_query("SELECT * FROM USUARIO ORDER BY USUARIO ASC",$Db);
?>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>

<<div class="menubg flt">
	<ul class="menu flt">
        <li class=""><a href="clientes.php" title="Nuevo Cliente">Nuevo Cliente</a></li>
        <li class=""><a href="" title="Nuevo Cliente Empresa">Nuevo Cliente Empresa</a></li>
        <li class=""><a href="" title="Editar Cliente">Actualizar Cliente</a></li>
	  <li class=""><a href="mantenedores.php" title="Volver al Inicio">Volver</a></li>
	</ul>	
</div>

<div align="center">
<table border="1" class="listado_usr" >
<tr>
<td>Rut</td>
<td>Dv</td>
<td>Nombre</td>
<td>Apellido</td>
<td>Tipo de Usuario</td>
<td>Editar</td>
</tr>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_usuarios))
{
if($row[1]==1)
{
$tip_usr="ADMINISTRADOR";
}
if($row[1]==2)
{
$tip_usr="BODEGUERO";
}
if($row[1]==3)
{
$tip_usr="VENDEDOR";
}
if($row[1]==4)
{
$tip_usr="CAJERO";
}
if($row[4]==0)
{
$usr_est="INACTIVO";
}
if($row[4]==1)
{
$usr_est="ACTIVO";
}
?>
<td><?php echo $row[0];?></td>
<td><?php echo $row[2];?></td>
<td><?php echo $usr_est;?></td>
<td><?php echo $row[3];?></td>
<td><?php echo $tip_usr;?></td>
<td> <a href="edita_usr.php?rut=<?php echo $row[0];?>"> <img src="../img/user_edit.gif" border="0" title="Editar Cliente"> </a></td>
</tr>
<?php
}
?>
</table>
</div>

</body>
</html>