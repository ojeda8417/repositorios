<?php

  require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){

     require_once("class/proveedoresModulo.php");

     $proveedor= new Proveedores();

     $datos=$proveedor->get_proveedores();
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

		  			<?php require_once("menu_lateral.php");?>
		  			
		  		</div>

		  		<div class="col-sm-8">

		  			<div class="panel-proveedor">
		  				 <ol class="breadcrumb">
							  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>proveedores.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Proveedores</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>agregar_proveedor.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nuevos Proveedores</a></li>
							  <li><a href="<?php echo Conectar::ruta()?>pedidos.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Pedidos</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>agregar_pedido.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Nuevos Pedidos</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>reporte_pedidos.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Reporte Pedidos</a></li>
						</ol>
		  			</div>

		  			<div class="panel panel-default">
		  				
		  				<div class="panel-heading">
		  					<h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Consulta General de Proveedores</h3>
		  				</div>

		  				<div class="panel-body">
		  					 
		  					 <table class="table" id="myTable">

		  					   <thead>
		  					 	 <tr>
			  					 	  <th>Cédula</th>
			  					 	  <th>Nombres</th>
			  					 	  <th>Teléfono</th>
			  					 	  <th>Dirección</th>
			  					 	  <th>Fecha</th>
			  					 	  <th>Acciones</th>
		  					 	 </tr>
                                </thead>

                                <tbody>

                                	<?php for($i=0;$i<sizeof($datos);$i++){?>
                                	
                                	<tr>
                                		<td><?php echo $datos[$i]["rif_proveedor"];?></td>
                                		<td><?php echo $datos[$i]["nombre_proveedor"];?></td>
                                		<td><?php echo $datos[$i]["tlf_proveedor"];?></td>
                                		<td><?php echo $datos[$i]["direc_proveedor"];?></td>
                                		<td><?php echo $datos[$i]["fecha"];?></td>
                                		<td><a class="btn btn-success" href="<?php echo Conectar::ruta();?>editar_proveedor.php?id_proveedor=<?php echo $datos[$i]["cod_proveedor"];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a> <a class="btn btn-danger" href="<?php echo Conectar::ruta();?>eliminar_proveedor.php?id_proveedor=<?php echo $datos[$i]["cod_proveedor"];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></td>
                                	</tr>

                                	<?php }?>
                                </tbody>

		  					 </table>
		  				</div>
		  			</div>
		  			
		  		</div><!--col sm  8-->
		  	</div><!--row-->
		  </div><!--container fluid-->
	</div>

	<?php require_once("footer_js_tabla.php");?>

	<?php require_once("footer.php");?>
	
</body>
</html>

<?php } else {

	header("Location:".Conectar::ruta()."index.php");
}?>