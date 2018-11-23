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
include("../lib/funcion_region.php");
include("../lib/conexion.php");
$Db=Conectarse();	
$id= $_GET["codsuc"];
$consulta_suc=mysql_query("select * from sucursales where CODIGO_SUC='$id'",$Db);
if($row=mysql_fetch_array($consulta_suc))
{
$id=$row[0];
$reg=$row[1];
$com=$row[2];
$nombre=$row[3];
$dir=$row[4];
$tel=$row[5];
$admin=$row[6];
$estado=$row[7];
}
if($row[7]==0)
{
$suc_est="INACTIVA";
}
if($row[7]==1)
{
$suc_est="ACTIVA";
}
$reg_suc=region($row[1]);
$suc_comuna=mysql_query("SELECT GLOSA_C FROM comuna WHERE CODIGO_C='$com'",$Db);
if($row1=mysql_fetch_array($suc_comuna))
{
$n_com=$row1[0];	
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de Sucursales</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../lib/jquery-1.5.2.js"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
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
<form name="suc" action="update_suc.php" method="post">
<table border="0" class="tbl_imp">
  <tr>
    <td width="auto">Codigo:</td>
    <td width="auto"><input name="cod"  readonly type="text" id="cod" size="10" maxlength="10" value="<?php echo $id;?>" /></td>
  </tr>
  <tr>
    <td>Nombre:</td>
    <td>
      <input name="nombre" type="text" id="nombre" maxlength="50" value="<?php echo $nombre;?>"  />
   </td>
  </tr>
  <tr>
    <td>Direccion:</td>
    <td><input name="direc_suc" type="text" id="direc_suc" size="40" maxlength="40" value="<?php echo $dir;?>" /></td>
  </tr>
  <tr>
    <td>Telefono:</td>
    <td> <input name="telefono" type="text" id="telefono" maxlength="7"/value="<?php echo $tel;?>" > </td>
  </tr>
  <tr>
    <td>Jefe Local:</td>
    <td> <input name="jlocal" type="text" id="jlocal" size="40" maxlength="20" value="<?php echo $admin;?>" /> </td>
  </tr>
  <tr>
    <td>Region:</td>
    <td><select name="reg_suc" id="reg_suc">
     <option selected="selected" value="<?php echo $reg ?>"><?php echo $reg_suc ?></option>
    
      <?php
       $sucursal= mysql_query("select * from region",$Db);
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
     <option selected="selected" value="<?php echo $com ?>"><?php echo $n_com ?></option>
      
    </select></td>
  </tr>
    <tr>
   <td>Estado:</td>
   <td><select name="estado" id="estado">
    <option value="<?php echo $row[7]; ?>"><?php echo $suc_est ?></option>
       <option value="1">ACTIVA</option>
         <option value="0">INACTIVA</option>
    </select>
   </td>
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