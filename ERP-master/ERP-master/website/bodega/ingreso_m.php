<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?PHP if(($_SESSION["USUARIO"])==0)
{
    ?>
    <script language='javascript' type="text/javascript">
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="ajax.js"></script>
<script language="javascript" type="text/javascript" src="../lib/jquery-1.9.1.js"></script>
<script language="javascript" type="text/javascript" src="../lib/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="../lib/script.js"></script>
<link rel="stylesheet" href="menu.css" type="text/css">
<title>Modulo Ingreso de Mercaderia <?php echo $version;  ?></title>
<link href="menu.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        var ajax = new sack();
        var currentClientID=false;
        function getClientData()
        {
            var clientId = document.getElementById('rut').value.replace(/[^0-9]/g,'');
            if(clientId.length>=4 && clientId!=currentClientID){
                currentClientID = clientId
                ajax.requestFile = 'getProv.php?getClientId='+clientId;
                // Specifying which file to get
                ajax.onCompletion = showClientData;
                // Specify function that will be executed after file has been found
                ajax.runAJAX();
                // Execute AJAX function
            }

        }

        function showClientData()
        {
            var formObj = document.forms['frm_bod'];
            eval(ajax.response);
        }

        function initFormEvents()
        {
            document.getElementById('rut').onblur = getClientData;
            document.getElementById('rut').focus();
        }
        window.onload = initFormEvents;
    </script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function(){
            $("#familia").change(function(event){
                var id = $("#familia").find(':selected').val();
                $("#subfam").load('genera-select.php?id='+id);
            });
        });
    </script>

</head>
<body>
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>
<div class="menubg flt">
    <ul class="menu flt">
        <li class=""><a  href="index_bod.php">Inicio</a></li>
        <li class="current_page_item"><a href="ingreso_m.php" title="Ingrese Mercaderia">Ingreso Mercaderia</a></li>
        <li class=""><a href="" title="Egrese Mercaderia">Egreso Mercaderia</a></li>
        <li class=""><a href="" title="Crear Nuevo Producto">Crear Producto</a></li>
        <li class=""><a href="traspaso_b.php" title="Traspaso de Bodega">Traspaso de Bodega</a></li>
        <li class=""><a href="reqbod.php" title="Pedidos">Realizar Pedido</a></li>
        <li class=""><a href="" title="Consultar Stock">Consultar Stock</a></li>
        <li class=""><a href="logout.php" title="Salir del Sistema">Salir</a></li>
    </ul>
</div>

<form name="frm_bod" id="frm_bod" action="" method="post">

<table class="tabla_bod_ing" width="70%" border="0" align="center" id="ingreso">
  <tr>
    <td colspan="6" id="encabezado" align="center">Datos de Ingreso de Mercaderia</td>
  </tr>
  <tr>
    <td>Rut Proveedor:</td>
    <td><input name="rut" type="text" id="rut" size="8" /> <input name="dv" type="text" id="dv" size="1" maxlength="1" /></td>
    <td>Nombre Proveedor:</td>
    <td><input type="text" name="nom_pr" id="nom_pr"/></td>
  </tr>
   <tr>
      <td>Tipo Documento:</td>
    <td> <select name="docto" id="docto">
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
    <td>Nro Documento:</td>
    <td><input type="text" name="nro_doc" size="8" maxlength="8" /> </td>
    </tr>
  <tr>
    <td>Familia:</td>
    <td><select name="familia" id="familia">
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
    <td><select name="subfam" id="subfam">
     <option selected="selected">Seleccione SubFamilia</option>
    </select></td>
    </tr>
  <tr>
    <td>Producto</td>
      <td><select name="prod" id="prod">

          </select></td>
    <td>Cantidad:</td>
    <td><input name="cant" type="text" id="cant" size="10" /></td>
    </tr>
     <tr>
         <td>Estado:</td>
         <td><select name="estado" id="estado">
                 <option value="0">Seleccione Estado</option>
                 <option value="1">NUEVO</option>
                 <option value="2">RESERVADO</option>
                 <option value="3">EN TRANSITO</option>
             </select></td>
     <td>Bodega:</td>
     <td><select name="bod" id="bod">
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
    <td>Fecha Ingreso:</td>
     <td><input name="fec_ing" type="text" id="fec_ing" size="10" readonly value="<?php echo $fecha= date("d/m/Y"); ?>" /></td>
    <td>Unidad de Medida:</td>
     <td><select name="um" id="um">
       <option  selected="selected" value="0">Seleccione Unidad</option>
             <?php
             $med= mysql_query("select * from MEDIDAS where ESTADO='1'",$Db);
             while ($Rs=mysql_fetch_array($med))
             {
             ?>
             <option value="<?php echo $Rs["COD_MEDIDA"]; ?>"><?php echo $Rs["GLOSA_MEDIDA"]; ?></option>
             <?php
             }
             ?>
         </select></td>
    </tr>
    <tr>
        <td>Estado:</td>
        <td><select name="bod_est" id="bod_est">
                <option value="0">Selecciones Estado</option>
                <option value="2">RECEPCIONADO</option>
                <option value="3">RECEPCION PARCIAL</option>
            </select></td>
    </tr>

    <tr>
     <td><input type="button" value="Agregar" />   </td>
    </tr>
</table>

    <table class="tabla_det_ing" id="det_ing" name="det_ing" border="0">

        <tr>
            <td colspan="6" id="encabezado" align="center">Detalle Ingreso de Mercaderia</td>
        </tr>

        <tr>
            <td>Codigo</td>
            <td>Glosa</td>
            <td>Tipo Unidad</td>
            <td>Cantidad</td>
            <td>Estado</td>
        </tr>
        <tr>
            <td><input type="button" value="Grabar" />   </td>
        </tr>

    </table>

</form>

</body>
</html>
