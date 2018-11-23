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
<title>Listado de Proveedores</title>
<?php
$consulta_suc=mysql_query("SELECT * FROM proveedores ORDER BY RUT_P ASC",$Db);
?>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
  <ul class="menu flt">
        <li class=""><a href="man_prov.php" title="Nuevo Proveedor">Nuevo Proveedor</a></li>
        <li class=""><a href="listado_prov.php" title="Actualizar Proveedor">Actualizar Proveedor</a></li>
		<li class=""><a href="man_prov.php" title="Volver">Volver</a></li>
	</ul>	
</div>

<div align="center">
<table id="gradient-style" >
<tr>
<th scope="col">Rut</th><!--codigo_suc -->
<th scope="col">Razon Social</th><!--direc_s -->
<th scope="col">Fantasia</th><!--Telef_s -->
<th scope="col">Region</th><!--admin_s -->
<th scope="col">Comuna</th><!--codigo_r -->
<th scope="col">Direccion</th><!--codigo_c -->
<th scope="col">Telefono</th><!--sin valor -->
<th scope="col">Contacto</th><!--sin valor -->
<th scope="col">Estado</th><!--estado -->
<th scope="col">Editar</th><!--sin valor -->
</tr>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_suc))
{


$reg_suc= region($row[2]);
$com_suc=$row[3];

$est_p=estado($row[10]);

?>
<td><?php echo $row[0] ."-".$row[1] ;?></td>
<td><?php echo $row[4];?></td>
<td><?php echo $row[5];?></td>
<td><?php echo $reg_suc;;?></td>
<?php $c_comuna=mysql_query("SELECT GLOSA_C FROM comuna WHERE CODIGO_C= '$com_suc' " ,$Db); 
$fila=mysql_fetch_array($c_comuna);
?>
<td><?php echo  $fila[0];?></td>

<td><?php echo $row[7];?></td>
<td><?php echo $row[8];?></td>
<td><?php echo $row[9];?></td>
<td><?php echo $est_p;?></td>
<td> <a href="edita_prov.php?id=<?php echo $row[0]?>"> <img src="../img/bedit.png" border="0" title="Editar Sucursal"> </a></td>
</tr>
<?php
}
?>
</table>
</div>

</body>
</html>