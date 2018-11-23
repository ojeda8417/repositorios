<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<?PHP if(($_SESSION["USUARIO"])==0)
{
?>
<script language='JavaScript'>
    alert("Se Debe Loguear Para Ingresar Al Sistema");
    //Mensaje de error
    window.location = "../index.html"
    //redireccionamos
</script>
<?php
exit;
}
include("../lib/version.php");
include("../lib/conexion.php");
$Db=Conectarse();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Modulo Traspaso de Bodega <?php echo $version  ?></title>
<link href="menu.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="login">Bienvenido Usuario:<br>
    <?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
    <ul class="menu flt">
        <li class=""><a  href="index_bod.php">Inicio</a></li>
        <li class=""><a href="ingreso_m.php" title="Ingrese Mercaderia">Ingreso Mercaderia</a></li>
        <li class=""><a href="" title="Egrese Mercaderia">Egreso Mercaderia</a></li>
        <li class=""><a href="" title="Crear Nuevo Producto">Crear Producto</a></li>
        <li class="current_page_item"><a href="traspaso_b.php" title="Traspaso de Bodega">Traspaso de Bodega</a></li>
        <li class=""><a href="reqbod.php" title="Pedidos">Realizar Pedido</a></li>
        <li class=""><a href="" title="Consultar Stock">Consultar Stock</a></li>
        <li class=""><a href="logout.php" title="Salir del Sistema">Salir</a></li>
    </ul>
</div>

<form action="" method="post">
<table border="0" align="center" class="tabla_req">
  <tr>
    <td  id="encabezado" colspan="6" align="center">Datos Origen</td>
  </tr>
  <tr>
    <td width="131">Sucursal Origen:</td>
    <td width="192"><select name="suc_ori" id="suc_ori">
            <option  selected="selected" value="0">Seleccione Sucursal</option>
            <?php
            $bod= mysql_query("select * from sucursales where ESTADO='1'",$Db);
            while ($Rs=mysql_fetch_array($bod))
            {
                ?>
                <option value="<?php echo $Rs["CODIGO_SUC"]; ?>"><?php echo $Rs["GLOSA_S"]; ?></option>
            <?php
            }
            ?>
    </select></td>
    <td>Bodega Origen:</td>
    <td><select name="bod_ori" id="bod_ori">
            <option  selected="selected" value="0">Seleccione Bodega</option>
            <?php
            $bod= mysql_query("select * from bodegas where ESTADO='1'",$Db);
            while ($Rs=mysql_fetch_array($bod))
            {
                ?>
                <option value="<?php echo $Rs["CODIGO_B"]; ?>"><?php echo $Rs["GLOSA_B"]; ?></option>
            <?php
            }
            ?>
    </select></td>
    <tr>
    <td>Documento:</td>
      <td><select name="bod_doc" id="bod_doc">
              <option selected="selected" value="0">Seleccione Docto</option>
              <?php
              $doc= mysql_query("select * from DOCUMENTOS where ESTADO='1'",$Db);
              while ($Rs=mysql_fetch_array($doc))
              {
                  ?>
                  <option value="<?php echo $Rs["CODIGO_D"]; ?>"><?php echo $Rs["GLOSA_D"]; ?></option>
              <?php
              }
              ?>
      </select></td>
      <td>Nro Docto:</td>
      <td> <input type="text" name="nro_doc" id="nro_doc" maxlength="8" value=""/></td>
    </tr>
    <tr>
    <td>Familia:</td>
     <td><select name="bod_fam" id="bod_fam">
             <option selected="selected" value="0">Seleccione Familia</option>
             <?php
             $fam= mysql_query("select * from FAMILIA where ESTADO='1'",$Db);
             while ($Rs=mysql_fetch_array($fam))
             {
                 ?>
                 <option value="<?php echo $Rs["CODIGO_F"]; ?>"><?php echo $Rs["GLOSA_F"]; ?></option>
             <?php
             }
             ?>
    </select></td>
    <td>SubFamilia:</td>
    <td><select name="bod_sfam" id="bod_sfam">
      <option selected="selected" value="0">Elija SubFamilia</option>
    </select></td>
    </tr>
    <tr>
    <td>Producto:</td>
        <td><select name="bod_prod" id="bod_prod">
         <option selected="selected" value="0">Elija Producto</option>
            </select></td>
        <td>Cantidad:</td>
        <td> <input type="text" name="cant" id="cant" value="" size="6" maxlength="5"/></td>
    </tr>
    <tr>
        <td>Estado:</td>
        <td><select name="bod_est" id="bod_est">
                <option value="111">EN TRANSITO </option>
            </select></td>
    </tr>

  <tr>
  <td  id="encabezado" colspan="6" align="center">Datos Destino</td>
  <tr>
   <td>Sucursal Destino:</td>
   <td><select name="suc_dest" id="suc_dest">
     <option  selected="selected" value="0">Seleccione Sucursal</option>
           <?php
           $bod= mysql_query("select * from sucursales where ESTADO='1'",$Db);
           while ($Rs=mysql_fetch_array($bod))
           {
               ?>
               <option value="<?php echo $Rs["CODIGO_SUC"]; ?>"><?php echo $Rs["GLOSA_S"]; ?></option>
           <?php
           }
           ?>
   </select></td>
   <td>Bodega Destino:</td>
     <td><select name="bod_dest" id="bod_dest">
             <option  selected="selected" value="0">Seleccione Bodega</option>
             <?php
             $bod= mysql_query("select * from bodegas where ESTADO='1'",$Db);
             while ($Rs=mysql_fetch_array($bod))
             {
                 ?>
                 <option value="<?php echo $Rs["CODIGO_B"]; ?>"><?php echo $Rs["GLOSA_B"]; ?></option>
             <?php
             }
             ?>
     </select></td>
    </tr>
    <tr>
        <td>Fecha Mvto:</td>
        <td> <input size="8" type="text" name="nro_doc" id="nro_doc" value="<?php echo $fecha= date("d/m/Y"); ?>"/></td>
    </tr>
    <tr>
     <td></td>
    </tr>
  <tr>

    <td><input type="submit" name="button" id="button" value="Grabar" /></td>

</tr>
</table>
</form>

</body>
</html>
