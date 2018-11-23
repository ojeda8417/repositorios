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
include("../lib/version.php");
include("../lib/conexion.php");
$Db=Conectarse();	
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de Sucursales<?php echo $version ?></title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../lib/jquery-1.5.2.js"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<script language="javascript" type="text/JavaScript">
    $(document).ready(function(){
        $("#reg_suc").change(function(event){
            var id = $("#reg_suc").find(':selected').val();
            $("#com_suc").load('genera-select.php?id='+id);
        });
    });
</script>
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
  <ul class="menu flt">
        <li class=""><a href="" title="Crear Sucursal">Crear Sucursal</a></li>
        <li class=""><a href="listado_suc.php" title="Editar Sucursal">Editar Sucursal</a></li>
		<li class=""><a href="mantenedores.php" title="Volver">Volver</a></li>
	</ul>	
</div>
<div class="nva_suc"></div>
<form name="suc" action="add_suc.php" method="post">
<table border="0" class="tbl_imp">
  <tr>
    <td width="auto">Codigo:</td>
    <td width="auto"><input name="cod" type="text" id="cod" size="10" maxlength="10" /></td>
  </tr>
  <tr>
    <td>Nombre:</td>
    <td>
      <input name="nombre" type="text" id="nombre" maxlength="50" />
   </td>
  </tr>
  <tr>
    <td>Direccion:</td>
    <td><input name="direc_suc" type="text" id="direc_suc" size="40" maxlength="40" /></td>
  </tr>
  <tr>
    <td>Telefono:</td>
    <td> <input name="telefono" type="text" id="telefono" maxlength="7"/> </td>
  </tr>
  <tr>
    <td>Jefe Local:</td>
    <td> <input name="jlocal" type="text" id="jlocal" size="40" maxlength="20"/> </td>
  </tr>
  <tr>
    <td>Region:</td>
    <td><select name="reg_suc" id="reg_suc">
    <option selected="selected" value="">Seleccione Region</option>
    <?php
       $sucursal= mysql_query("select * from REGION",$Db);
       while ($Rs=mysql_fetch_array($sucursal))
       {
       ?>
         <option value="<?php echo $Rs["CODIGO_R"]; ?>"><?php echo $Rs["GLOSA_R"]; ?></option>
         <?php
       }
      ?>
    </select></td>
  </tr>
  <tr>
    <td>Comuna:</td>
    <td><select name="com_suc" id="com_suc">
     <option selected="selected">Seleccione Comuna</option>
    </select></td>
  </tr>
   <tr>
   <td><br></td>
   </tr>
   <tr>
    <td colspan="2"><button type="submit" ><img src="../img/disk.png" alt=""/> Guardar</button> 
      <button type="reset" class=""><img src="../img/delete.gif" alt=""/> Borrar</button></td>
    </tr>
</table>
</form>

</body>
</html>