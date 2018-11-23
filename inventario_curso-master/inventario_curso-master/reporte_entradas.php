
<?php

  require_once("class/config.php"); 

  if(isset($_SESSION["backend_id"]) and isset($_SESSION["nombre"]) and isset($_SESSION["cedula"])){

require_once("class/entradasModulo.php");
require_once("class/proveedoresModulo.php");
require_once("class/configuracionModulo.php");

$proveedores=new Proveedores();

$informacion_empresa=new Configuracion();

$entradas= new Entradas();


$datos=$proveedores->get_proveedores_por_rif();

$datos_empresa=$informacion_empresa->get_configuracion();

$orden_compra=$entradas->get_orden_compras_por_fecha();

$total_productos=$entradas->get_cant_productos_por_fecha();


ob_start(); 

   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/favicon.ico">
<link type="text/css" rel="stylesheet" href="<?php echo Conectar::ruta();?>public/dompdf/css/print_static.css"/>
<style type="text/css">

.Estilo7 {font-size: 12px}
.Estilo8 {
  font-size: 10px;
  font-weight: bold;
}
.Estilo9 {font-size: 10px}
.Estilo10 {font-size: 9px; font-weight: bold; }
.Estilo11 {color: #FFFFFF}

</style>
</head>
<table style="width: 100%;" class="header">
<tr>
<td width="54%" height="111"><h1 style="text-align: left; margin-right:20px;"><img src="public/images/logo_vertical.jpg" width="340" height="109"  /></h1></td>
<td width="46%"><table style="width: 100%; font-size: 8pt;">
  <tr>
    <td><strong>RIF EMPRESA: </strong> <?php echo $datos_empresa[0]["rif_empresa"]; ?></td>
  </tr>
  <tr>
    <td><strong>EMPRESA: </strong> <?php echo $datos_empresa[0]["nom_empresa"]; ?></td>
  </tr>
  <tr>
    <td width="43%"><strong>VENDEDOR</strong></td>
  </tr>
  <tr>
    <td><strong>RIF/CEDULA: </strong><?php echo $_SESSION["cedula"]; ?></td>
  </tr>
  <tr>
    <td><strong>NOMBRE: </strong><?php echo $_SESSION["nombre"]; ?></td>
  </tr>
  <tr>
    <td><strong>FECHA-HORA IMPRESO: </strong>
      <?php echo $fecha=date("d-m-Y h:i:s A"); ?></td>
  </tr>
  <tr></tr>
</td>
</table>
</tr>
</table>

  <div align="center" style="color:black; font-weight:bolder; font-size:14px;">REPORTE DE ORDEN DE COMPRAS DE PRODUCTOS  </div>
<table width="101%" class="change_order_items">
<tbody>
<tr>
  <th colspan="5">DATOS PERSONALES DEL PROVEEDOR </th>
  </tr>
<tr>
<th width="5%" bgcolor="#317eac"><span class="Estilo11">RIF</span></th>
<th width="15%" bgcolor="#317eac"><span class="Estilo11">NOMBRES</span></th>
<th width="12%" bgcolor="#317eac"><span class="Estilo11">TELEFONO</span></th>
<th width="38%" bgcolor="#317eac"><span class="Estilo11">DIRECCIÓN</span></th>
<th width="30%" bgcolor="#317eac"><span class="Estilo11">CONTACTO</span></th>
</tr>


<tr class="even_row">
<td><div align="center"><span class=""><?php echo $datos["rif_proveedor"];?></span></div></td>
<td style="text-align: center"><div align="center"><span class=""><?php echo $datos["nombre_proveedor"];?></span></div></td>
<td style="text-align: center"><div align="center"><span class=""><?php echo $datos["tlf_proveedor"];?></span></div></td>
<td style="text-align: right"><div align="center"><span class=""><?php echo $datos["direc_proveedor"];?></span></div></td>
<td style="text-align:center"><div align="center"><span class=""><?php echo $datos["nom_contacto"];?></span></div></td>
</tr>

</tbody>

</table>
</div>


  <div style="font-size: 7pt">
<table width="102%" class="change_order_items">
  <tr>
    <td colspan="6"><div align="center"><strong>LISTA DE PRODUCTOS DE ORDEN DE COMPRAS </strong></div></td>
  </tr>
  <tbody>
    <tr>
      <th width="12%" bgcolor="#317eac"><span class="Estilo11">CÓDIGO</span></th>
      <th width="25%" bgcolor="#317eac"><span class="Estilo11">DESCRIPCIÓN MATERIAL </span></th>
      <th width="10%" bgcolor="#317eac"><span class="Estilo11">PRECIO</span></th>
      <th width="10%" bgcolor="#317eac"><span class="Estilo11">CANTIDAD</span></th>
      <th width="25%" bgcolor="#317eac"><span class="Estilo11">MONTO * PRODUCTOS</span></th>
      <th width="18%" bgcolor="#317eac"><span class="Estilo11">FECHA ENTREGA </span></th>
      </tr>
        <?php
         $pagoTotal=0;

         for($i=0;$i<sizeof($orden_compra);$i++){

          $decision=$orden_compra[$i]["precio_orden"] * $orden_compra[$i]["cantidad"];

          $pagoTotal= $pagoTotal + $decision;
         ?>
    <tr class="even_row">
      <td style="text-align: center"><span class=""><?php echo $orden_compra[$i]["cod_material"];?></span></td>
      <td style="text-align: center"><span class=""><?php echo $orden_compra[$i]["material"];?></span></td>
       <td style="text-align: center"><span class=""><?php echo $orden_compra[$i]["precio_orden"];?></span></td>
      <td style="text-align: center"><span class=""><?php echo $orden_compra[$i]["cantidad"];?></span></td>
      <td style="text-align: center"><span class=""><?php echo $orden_compra[$i]["cantidad"] * $orden_compra[$i]["precio_orden"];?></span></td>
      <td style="text-align: center"><span class=""><?php echo $fecha=date("d-m-Y",strtotime($orden_compra[$i]["fecha_ingreso"])); ?></span></td>

    </tr>

       <?php } ?>

     <!--comienzo de la suma de productos y monto total-->
   <tr class="even_row">
  <td colspan="6" style="text-align: center"><table style="width: 100%; font-size: 8pt;">
   
  <tr>
    <td class="even_row" style="text-align: center">&nbsp;</td>
    <td class="odd_row" style="text-align: right; border-right-style: none;">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="84%" class="even_row" style="text-align: center">
      <div align="right"><strong><span style="text-align: right;">TOTAL COMPRA:</span></strong></div>
    </td>
    <td width="16%" class="odd_row" style="text-align: right; border-right-style: none;">
      <div align="center"><strong>
      <?php 

        echo $pagoTotal;

      ?>
      BS.</strong>
      </div>
    </td>
  </tr>
  
  <tr>
    <td class="even_row" style="text-align: center"><div align="right"><strong><span style="text-align:right;">TOTAL EXISTENCIA PRODUCTOS:</span></strong></div></td>
    <td class="odd_row" style="text-align: right; border-right-style: none;"><div align="center"><strong>
      <?php 
      
      echo $total_productos["total"];

      ?>
    </strong></div>
  </td>
  </tr> 
  
    </td>
  </tr>     
       <!--termina la suma de productos y monto total-->

  </tbody>
</table>

<table style="border-top: 1px solid black; padding-top: 2em; margin-top: 2em;">
  <tr>
    <td style="padding-top: 0em"><span class="Estilo9"><strong>REVISADO POR :</strong></span></td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-top: 0em"><span class="Estilo10"><span id="result_box" lang="es" xml:lang="es">ESTE REPORTE  NO TENDRÁ FUERZA O EFECTO HASTA QUE SEA REVISADO Y FIRMADO POR UN FUNCIONARIO DE LA EMPRESA </span></span></td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-top: 0em">&nbsp;</td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-top: 0em"><span class="Estilo8">REALIZADO EL DIA <?php echo date("d")?> DE <?php echo Conectar::convertir(date('m'))?> DEL <?php echo date("Y")?></span></td>
    <td style="text-align: center; padding-top: 0em;">&nbsp;</td>
  </tr>
</table>

</div>



  <?php
  
  $salida_html = ob_get_contents();
  ob_end_clean(); 

    require_once("public/dompdf/dompdf_config.inc.php");       
    $dompdf = new DOMPDF();
    $dompdf->load_html($salida_html);
    $dompdf->render();
    $dompdf->stream("Listado de Clientes.pdf", array('Attachment'=>'0'));


  } else{

     require_once("index.php");
  }
    
?>