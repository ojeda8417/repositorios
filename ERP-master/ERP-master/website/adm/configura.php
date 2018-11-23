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
<title> Configuracion de Sistema<?php echo $version ?></title>
<link href="menu.css" rel="stylesheet" type="text/css" />

</head>

<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>

<div class="menubg flt">
	<ul class="menu flt">
        <li class=""><a href="conf_imp.php" title="Crear Impuestos">Impuestos</a></li>
        <li class=""><a href="conf_doc.php" title="Crear Documentos">Documentos</a></li>
        <li class=""><a href="conf_fp.php" title="Crear Formas de Pagos">Formas de Pagos</a></li>
        <li class=""><a href="conf_mon.php" title="Crear Monedas">Monedas</a></li>
         <li class=""><a href="conf_uf.php" title="Crear UF">Unidad de Fomento</a></li>
        <li class=""><a href="index_adm.php" title="Volver Al inicio">Volver</a></li>
      
	</ul>	
</div>
<div class="back_usr"></div>
</body>
</html>