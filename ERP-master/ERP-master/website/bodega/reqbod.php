<?php
session_start();
/**
 * Created by PhpStorm.
 * User: lprietop
 * Date: 18/03/14
 * Time: 22:35
 */
if(($_SESSION["USUARIO"])==0)
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
$activo= $_SESSION["USUARIO"];
//echo $activo;
include("../lib/version.php");
include("../lib/conexion.php");
include("../lib/funciones.php");
$Db=Conectarse();

$UsrSQL= mysql_query("select * from usuario WHERE USUARIO='$activo'",$Db);

while($row=mysql_fetch_array($UsrSQL))
{
 $suc_usr= sucursal($row[6]);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script type="text/javascript" src="ajax.js"></script>
 <script language="javascript" type="text/javascript" src="../lib/jquery-1.9.1.js"></script>
 <script language="javascript" type="text/javascript" src="../lib/jquery.validate.js"></script>
 <script language="javascript" type="text/javascript" src="../lib/script.js"></script>
 <link rel="stylesheet" href="menu.css" type="text/css">
 <script type="text/javascript">
    function Limpia_texto(texto,texto1,texto2)
    {
      texto.value="";
      texto1.value="";
      texto2.value="";
    }
 </script>

 <script type="text/javascript">
     var ajax = new sack();
     var currentClientID=false;
     function getClientData()
     {
         var clientId = document.getElementById('cod').value.replace(/[^0-9]/g,'');
         if(clientId.length>=4 && clientId!=currentClientID){
             currentClientID = clientId
             ajax.requestFile = 'getClient.php?getClientId='+clientId;	// Specifying which file to get
             ajax.onCompletion = showClientData;	// Specify function that will be executed after file has been found
             ajax.runAJAX();		// Execute AJAX function
         }

     }

     function showClientData()
     {
         var formObj = document.forms['frm_usu'];
         eval(ajax.response);
     }

     function initFormEvents()
     {
         document.getElementById('cod').onblur = getClientData;
         document.getElementById('cod').focus();
     }
     window.onload = initFormEvents;
 </script>
 <title>Requerimiento de Productos</title>
</head>
<body>
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
    <ul class="menu flt">
        <li class=""><a  href="index_bod.php">Inicio</a></li>
        <li class=""><a href="" title="Ingrese Mercaderia">Ingreso Mercaderia</a></li>
        <li class=""><a href="" title="Egrese Mercaderia">Egreso Mercaderia</a></li>
        <li class=""><a href="" title="Crear Nuevo Producto">Crear Producto</a></li>
        <li class=""><a href="traspaso_b.php" title="Traspaso de Bodega">Traspaso de Bodega</a></li>
        <li class="current_page_item"><a href="reqbod.php" title="Realizar Pedido">Realizar Pedido</a></li>
        <li class=""><a href="" title="Consultar Stock">Consultar Stock</a></li>
        <li class=""><a href="logout.php" title="Salir del Sistema">Salir</a></li>
    </ul>
</div>
<form action="javascript:fn_agregar();" method="post" id="frm_usu">
<table class="tabla_bod" border="0">
    <tr>
        <td>Codigo:</td>
        <td>Glosa Producto:</td>
        <td>Cantidad:</td>
    </tr>
<tbody>
 <tr>
 <td><input type="text" id="cod" name="cod" value="" placeholder="Codigo" onclick="javascript: Limpia_texto(cod,glosa,cant);" ></td>
 <td><input type="text" name="glosa" id="glosa" size="50" maxlength="50" value="" placeholder=" Glosa"></td>
 <td><input type="text" name="cant" id="cant" size="15" maxlength="8" value="" placeholder="Cantidad" ></td>
 </tr>
 <tr>
    <td>Usuario:</td>
    <td>Sucursal:</td>
 </tr>
 <tr>
     <td><input type="text" name="usr" id="usr" readonly maxlength="10" value="<?php echo $_SESSION["USUARIO"]?>" placeholder="Usuario"></td>
     <td><input type="text" name="suc" id="suc" readonly size="50" maxlength="50" value="<?php echo $suc_usr; ?>" placeholder="Sucursal"></td>
     <td><br></td>
 </tr>
</tbody>
<tr>
    <td colspan="2"><input name="agregar" type="submit" id="agregar" value="Agregar"  /></td>
</tr>
</table>
</form>
<table id="grilla"  border="1" class="tabla_det">
<tbody>
<tr>
<td>Codigo Producto</td>
<td>Glosa Producto</td>
<td>Cantidad</td>
<td>Eliminar</td>
</tr>
</tbody>


</table>
<td><input type="submit" id="add_btn" name="Guarda" value="Guardar" onclick="javascript:fn_add_pedido()"/></td>

</body>



</html>