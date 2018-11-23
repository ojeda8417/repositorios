<?php session_start();?>
<?PHP if(($_SESSION["USUARIO"])==0)
    /**
     * Created
     * Date: 09-07-14
     * Time: 08:31 PM
     */
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
        <li class=""><a href="" title="Configuracion de Sistema">Listado Usuarios</a></li>
        <li class=""><a href="" title="Listado Proveedores">Listado Proveedores</a></li>
        <li class=""><a href="" title="Listado Clientes">Listado Clientes</a></li>
        <li class=""><a href="logout.php" title="Salir del sistema">Salir</a></li>
    </ul>
</div>
</body>
</html>
