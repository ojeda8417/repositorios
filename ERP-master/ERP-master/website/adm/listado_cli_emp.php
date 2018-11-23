<?php session_start();?>
<?php if(($_SESSION["USUARIO"])==0)
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

$consulta_prod=mysql_query("SELECT * FROM clientes WHERE TIPO_CLI='2'",$Db);
?>
<html>
<head>
<title>Mantenedor de Clientes</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
        <li class=""><a href="listado_cli.php" title="Cliente Natural">Cliente Natural</a></li>
        <li class=""><a href="listado_cli_emp.php" title="Cliente Empresa">Cliente Empresa</a></li>
		<li class=""><a href="clientes.php" title="Volver al Inicio">Volver</a></li>
	</ul>	
</div>
<div align="center">
<table id="gradient-style" >
<thead>
<tr>
<th scope="col">Rut</th>
<th scope="col">Fant</th>
<th scope="col">Ra Soc</th>
<th scope="col">Giro</th>
<th scope="col">Contac</th>
<th scope="col">Direcc</th>
<th scope="col">Telef</th>
<th scope="col">Reg</th>
<th scope="col">Com</th>
<th scope="col">Estado</th>
<th scope="col">Editar</th>
</tr>
</thead>
<tbody>
<tr>
<?php 
while ($row=mysql_fetch_array($consulta_prod))
{
$reg_cli=region($row[2]);
$com_suc=$row[3];
$esta_cli=estado($row[11]);
?>
<td><?php echo $row[0]."-".$row[1];?></td>
<td><?php echo $row[4];?></td>
<td><?php echo $row[5];?></td>
<td><?php echo $row[6];?></td>
<td><?php echo $row[7];?></td>
<td><?php echo $row[8];?></td>
<td><?php echo $row[9];?></td>
<td><?php echo $reg_cli;?></td>
<?php $c_comuna=mysql_query("SELECT GLOSA_C FROM comuna WHERE CODIGO_C= '$com_suc' " ,$Db); 
$fila=mysql_fetch_array($c_comuna);
?>
<td><?php echo $fila[0];?></td>
<td><?php echo $esta_cli;?></td>
<td> <a href="edita_cli_emp.php?rut=<?php echo $row[0]?>"> <img src="../img/bedit.png" border="0" title="Editar Cliente Empresa"> </a></td>
</tr>
<?php
}
?>
</tbody>
</table>

</div>

</body>
</html>