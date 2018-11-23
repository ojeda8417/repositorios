<?php
  
  require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){

  	require_once("class/clientesModulo.php");

  	$clientes=new Clientes();

  	$datos=$clientes->get_clientes();
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
		 	 		
		 	 		<div class="panel-cliente">
		 	 			<ol class="breadcrumb">
						  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>clientes.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Clientes</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>agregar_cliente.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nuevo Cliente</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>reporte_clientes.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> listado de clientes en pdf</a></li>
						</ol>
		 	 		</div>

		 	 		<div class="panel panel-default">
		 	 			
                       <div class="panel-heading">
                       	 <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Consulta General de Clientes</h3>
                       </div>

                       <div class="panel-body">
                       	    
                       	    <table class="table" id="myTable">
                       	    	
                       	      <thead>
                       	      	<tr>
	                       	      	<th>Cédula</th>
	                       	      	<th>Nombres</th>
	                       	      	<th>Apellidos</th>
	                       	      	<th>Telefono</th>
	                       	      	<th>Dirección</th>
	                       	      	<th>Fecha</th>
	                       	      	<th>Acciones</th>
                       	        </tr>
                       	      </thead>
                             
                       	      <tbody>
                       	      	<?php for($i=0;$i<sizeof($datos);$i++){?>
                       	      	 <tr>
                       	      	 	<td><?php echo $datos[$i]["ced_cliente"];?></td>
                       	      	 	<td><?php echo $datos[$i]["nom_cliente"];?></td>
                       	      	 	<td><?php echo $datos[$i]["ape_cliente"];?></td>
                       	      	 	<td><?php echo $datos[$i]["tlf_cliente"];?></td>
                       	      	 	<td><?php echo $datos[$i]["direc_cliente"];?></td>
                       	      	 	<td><?php echo Conectar::invierte_fecha($datos[$i]["fecha"])?></td>
                       	      	 	<td><a class="btn btn-success" href="<?php echo Conectar::ruta();?>editar_cliente.php?id_cliente=<?php echo $datos[$i]["cod_cliente"];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>  <a class="btn btn-danger" href="<?php echo Conectar::ruta();?>eliminar_cliente.php?id_cliente=<?php echo $datos[$i]["cod_cliente"];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></td>
                       	      	 </tr>
                       	      	 <?php } ?>
                       	      </tbody>
                       	    </table>
                       </div>
		 	 		</div><!--panel default-->
		 	 	</div><!--col-sm-8-->
		 	 </div><!--row-->
		 </div><!--container-fluid-->
	</div>


	

	<?php require_once("footer_js_tabla.php");?>

	<?php require_once("footer.php");?>
</body>
</html>

<?php
  
  } else {

  	   header("Location:".Conectar::ruta()."index.php");
  	   
  }

?>