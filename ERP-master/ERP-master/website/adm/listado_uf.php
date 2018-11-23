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
<title>Listado de UF</title>
<link href="menu.css" rel="stylesheet" type="text/css">
<script  src="../lib/ajax.js" type="text/javascript" ></script>
<script src="../lib/jquery-1.5.2.js" type="text/javascript"></script>

</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>

<div class="menubg flt">
	<ul class="menu flt">
        <li class="current_page_item"><a href="conf_uf.php" title="Cargar Archivo UF">Subir UF</a></li>
        <li class=""><a href="xls/add_uf.php" title="Cargar UF Mensual">Procesar UF</a></li>
         <li class=""><a href="" title="Revisar UF Cargada">Revisar UF Cargada</a></li>
        <li class=""><a href="configura.php" title="Volver Al inicio">Volver</a></li>
      
	</ul>	
</div>
<div align="center" id="content">

<div id="contenido">
<?php include('paginador.php')?>
</div>
</div>

</body>
</html>