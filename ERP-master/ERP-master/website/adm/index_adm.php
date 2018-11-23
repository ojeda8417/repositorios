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
<?php include("../lib/version.php"); ?>
<html>
<head>
<title>Administracion de Sistema<?php echo $version ?></title>

<link href="../adm/menu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
        <li class=""><a href="configura.php" title="Configuracion de Sistema">Configuracion</a></li>
        <li class=""><a href="mantenedores.php" title="Mantenedores de Sistema">Mantenedores</a></li>
        <li class=""><a href="informe.php" title="Informes de Sistema">Informes</a></li>
        <li class=""><a href="logout.php" title="Salir del sistema">Salir</a></li>
	</ul>	
</div>
</body>
</html>
