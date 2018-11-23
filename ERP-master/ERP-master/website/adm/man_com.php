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
<?php
include("../lib/conexion.php");
$Db=Conectarse();
?>
<head>
<title>Mantencion de Comunas <?php echo $version ?></title>
<link href="menu.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
	<ul class="menu flt">
        <li class="current_page_item"><a href="mantenedores.php" title="Agregar Comuna">Nueva Comuna</a></li>
        <li class=""><a href="mantenedores.php" title="Salir del sistema">Volver</a></li>
	</ul>	
</div>

   <p>&nbsp;</p>
   <form name="form1" method="post" action="add_com.php">
   <div class="fondo_com"></div>
   <table  border="0" class="tbl_imp">
     <tr>
       <td></td>
     </tr>
     <tr>
       <td>Region:  <select name="sel_reg" id="sel_reg">
         <option selected="selected" value="">Seleccione Una Region</option>
         <?php
    $perfil= mysql_query("select * from region",$Db);
    while ($Rs=mysql_fetch_array($perfil))
    {
    ?>
         <option value="<?php echo $Rs["CODIGO_R"]; ?>"><?php echo $Rs["GLOSA_R"]; ?></option>
         <?php
    }
    ?>
       </select></td>
     </tr>
     <tr>
       <td>Nueva Comuna: <input type="text" name="nom_com" id="nom_com"></td>
     </tr>
      <tr>
      </tr>
      <td><br></td>
     <tr>
       <td><button type="submit" ><img src="../img/disk.png" alt=""/> Guardar</button> 
<button type="reset" class=""><img src="../img/delete.gif" alt=""/> Borrar</button></td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
     </tr>
   </table>
   </form>
   <p>&nbsp;</p>
</body>
</html>