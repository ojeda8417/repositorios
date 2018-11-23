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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Mantenedores de Sistema<?php echo $version ?></title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>

<div class="menubg flt">
	<ul class="menu flt">
        <li class=""><a href="man_com.php" title="Mantencion de Comunas">Comunas</a></li>
        <li class=""><a href="clientes.php" title="Mantencion de Clientes">Clientes</a></li>
		<li  class=""><a href="man_bod.php" title="Mantencion de Bodegas">Bodegas</a></li>
        <li class=""><a href="man_fam.php" title="Mantencion de Familias">Familias</a></li>
        <li class=""><a href="man_perfil.php" title="Mantencion de Perfiles">Perfiles</a></li>
		<li class=""><a href="man_prod.php" title="Mantencion de Producto">Productos</a></li>
        <li class=""><a href="man_prov.php" title="Mantencion de Proveedores">Proveedores</a></li>
        <li class=""><a href="man_subfam.php" title="Mantencion de Subfamilias">Subfamilias</a></li>
        <li class=""><a href="man_suc.php" title="Mantencion de Sucursales">Sucursales</a></li>
        <li class=""><a href="man_usr.php" title="Mantencion de Usuarios">Usuarios</a></li>
		<li class=""><a href="index_adm.php" title="Volver al Inicio">Volver</a></li>
	</ul>	
</div>
<div class="back_usr"></div>
</body>
</html>