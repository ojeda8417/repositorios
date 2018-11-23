<?php
  
  require_once("class/config.php");

   if(isset($_SESSION["backend_id"])){

   	require_once("class/entradasModulo.php");

   	$entrada=new Entradas();

   	$datos= $entrada->get_entradas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php require_once("head.php");?>
	<?php require_once("header_css_tabla.php");?>
</head>
<body>

	<div class="container-fluid">
		  
		  <?php require_once("menu_principal.php");?>

		  <div class="container-fluid">
		  	 
		  	 <div class="row">
		  	 	<div class="col-sm-3">
		  	 		 
		  	 		<?php require_once("menu_lateral.php"); ?>
		  	 	</div>

		  	 	<div class="col-sm-8">
		  	 		 
		  	 		 <div class="panel-entrada">
		  	 		 	 <ol class="breadcrumb">
							  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>entradas.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Entradas</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>agregar_entrada.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Nueva Entradas</a></li>
							  <li><a href="<?php echo Conectar::ruta()?>reporte_entrada.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Orden de Entrada</a></li>
							 
						</ol>
		  	 		 </div>

		  	 		 <div class="panel panel-default">
		  	 		 	 
		  	 		 	 <div class="panel-heading">
		  	 		 	 	 <h3 class="panel-title"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Consulta General de Compras de Productos</h3>
		  	 		 	 </div>

		  	 		 	 <div class="panel-body">
		  	 		 	 	   
		  	 		 	 	   <table class="table" id="myTable">
		  	 		 	 	   	   
		  	 		 	 	   	   <thead>
		  	 		 	 	   	   	  <tr>
		  	 		 	 	   	   	  	<th>Código</th>
		  	 		 	 	   	   	  	<th>Producto</th>
		  	 		 	 	   	   	  	<th>Precio</th>
		  	 		 	 	   	   	  	<th>Cantidad</th>
		  	 		 	 	   	   	  	<th>Proveedor</th>
		  	 		 	 	   	   	  	<th>Ingreso</th>
		  	 		 	 	   	   	  	<th>Acciones</th>
		  	 		 	 	   	   	  </tr>
		  	 		 	 	   	   </thead>

		  	 		 	 	   	   <tbody>

		  	 		 	 	   	   	 <?php for($i=0;$i<sizeof($datos);$i++){?>
		  	 		 	 	   	   	<tr>
		  	 		 	 	   	   		<td><?php echo $datos[$i]["cod_material"];?></td>
		  	 		 	 	   	   		<td><?php echo $datos[$i]["material"];?></td>
		  	 		 	 	   	   		<td><?php echo $datos[$i]["precio_orden"];?></td>
		  	 		 	 	   	   		<td><?php echo $datos[$i]["cantidad"];?></td>
		  	 		 	 	   	   		<td><?php echo $datos[$i]["rif_proveedor"];?></td>
		  	 		 	 	   	   		<td><?php echo Conectar::invierte_fecha($datos[$i]["fecha_ingreso"]);?></td>
		  	 		 	 	   	   		<td><a class="btn btn-success" href="<?php echo Conectar::ruta();?>editar_entrada.php?id_entrada=<?php echo $datos[$i]["id_orden_compras"];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a> <a class="btn btn-danger" href="<?php echo Conectar::ruta();?>eliminar_entrada.php?id_entrada=<?php echo $datos[$i]["id_orden_compras"];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></td>
		  	 		 	 	   	   	</tr>
		  	 		 	 	   	   	<?php }?>
		  	 		 	 	   	   </tbody>
		  	 		 	 	   </table>
		  	 		 	 </div>		 		  	
		  	 		 	</div>
		  	 	</div>
		  	 </div>
		  </div>
	</div>

	<?php require_once("footer_js_tabla.php");?>

	<?php require_once("footer.php");?>
	
</body>
</html>

<?php } else {

	header("Location:".Conectar::ruta()."index.php");
}?>