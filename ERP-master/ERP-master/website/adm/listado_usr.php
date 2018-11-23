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
$consulta_usuarios=mysql_query("SELECT * FROM usuario where ESTADO <> '999' order by usuario ASC",$Db);
?>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
      <li class=""><a href="man_usr.php" title="Nuevo Usuario">Crear Usuario</a></li>
	  <li class="current_page_item"><a href="#" title="Editar Usuario">Editar Usuario</a></li>
	  <li class=""><a href="man_usr.php" title="Ir al Menu Principal">Volver</a></li>
	</ul>	
</div>

<div align="center">
<table id="gradient-style">
<tr>
<th scope="col">Usuario</th>
<th scope="col">Password</th>
<th scope="col">Estado</th>
<th scope="col">Ingreso</th>
<th scope="col">Perfil</th>
<th scope="col">Editar</th>
</tr>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_usuarios))
{
$tip_usr=usuario($row[0]);
$usr_est=estado($row[4]);
?>
<td><?php echo $row[0];?></td>
<td><?php echo $row[2];?></td>
<td><?php echo $usr_est;?></td>
<td><?php echo $row[3];?></td>
<td><?php echo $tip_usr;?></td>
<td> <a href="edita_usr.php?rut=<?php echo $row[0]?>"> <img src="../img/user_edit.gif" border="0" title="Editar Usuario"> </a></td>
</tr>
<?php
}
?>
</table>
</div>

</body>
</html>