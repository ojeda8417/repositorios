<?php

 require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){

  	require_once("class/proveedoresModulo.php");

    $proveedor= new Proveedores();

    $datos=$proveedor->get_proveedor_por_id($_GET["id_proveedor"]);
  
  if(isset($_POST["grabar"]) and $_POST["grabar"]=="si") {

    $proveedor->editar_proveedor();
    exit();

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php require_once("head.php");?>
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
							  <li><a href="<?php echo Conectar::ruta();?>"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Reporte Pedidos</a></li>
						</ol>
		  			</div>

		  			<?php if(isset($_GET["m"])){

                        switch($_GET["m"]){

                        	case "1";
                        	?>
                        	<h2>los campos estan vacios</h2>
                        	<?php
                        	break;

                        	case "2";
                        	?>
                        	<h2>se ha editado el proveedor</h2>
                        	<?php
                        	break;
                        }


		  			}?>


		  			<div class="panel panel-default">
		  				 
		  				 <div class="panel-heading">
		  				 	<h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar Proveedor</h3>
		  				 </div>

		  				 <div class="panel-body">
		  				 	  
		  				 	  <form class="form-horizontal" action="" method="post">
		  				 	  	  
		  				 	  	  <div class="form-group">
		  				 	  	  	
		  				 	  	  	<label for="" class="control-label col-sm-2">Rif Proveedor</label>
		  				 	  	  	<div class="col-sm-6">
		  				 	  	  		<input type="text" name="rif_proveedor" class="form-control" placeholder="rif proveedor" value="<?php echo $datos[0]["rif_proveedor"];?>">
		  				 	  	  	</div>
		  				 	  	  </div>

		  				 	  	   <div class="form-group">
		  				 	  	  	
		  				 	  	  	<label for="" class="control-label col-sm-2">Nombre Proveedor</label>
		  				 	  	  	<div class="col-sm-6">
		  				 	  	  		<input type="text" name="nombre_proveedor" class="form-control" placeholder="nombre proveedor" value="<?php echo $datos[0]["nombre_proveedor"];?>">
		  				 	  	  	</div>
		  				 	  	  </div>

		  				 	  	   <div class="form-group">
		  				 	  	  	
		  				 	  	  	<label for="" class="control-label col-sm-2">Teléfono</label>
		  				 	  	  	<div class="col-sm-6">
		  				 	  	  		<input type="text" name="tlf_proveedor" class="form-control" placeholder="telefono" value="<?php echo $datos[0]["tlf_proveedor"];?>">
		  				 	  	  	</div>
		  				 	  	  </div>

		  				 	  	   <div class="form-group">
		  				 	  	  	
		  				 	  	  	<label for="" class="control-label col-sm-2">Dirección Proveedor</label>
		  				 	  	  	<div class="col-sm-6">
		  				 	  	  		<input type="text" name="direc_proveedor" class="form-control" placeholder="direccion proveedor" value="<?php echo $datos[0]["direc_proveedor"];?>">
		  				 	  	  	</div>
		  				 	  	  </div>

		  				 	  	   <div class="form-group">
		  				 	  	  	
		  				 	  	  	<label for="" class="control-label col-sm-2">Email Proveedor</label>
		  				 	  	  	<div class="col-sm-6">
		  				 	  	  		<input type="text" name="email_proveedor" class="form-control" placeholder="email proveedor" value="<?php echo $datos[0]["email_proveedor"];?>">
		  				 	  	  	</div>
		  				 	  	  </div>

		  				 	  	   <div class="form-group">
		  				 	  	  	
		  				 	  	  	<label for="" class="control-label col-sm-2">Nombre de contacto</label>
		  				 	  	  	<div class="col-sm-6">
		  				 	  	  		<input type="text" name="nom_contacto" class="form-control" placeholder="nombre de contacto" value="<?php echo $datos[0]["nom_contacto"];?>">
		  				 	  	  	</div>
		  				 	  	  </div>

		  				 	  	  <input type="hidden" name="grabar" value="si">
                                  
                                  <input type="hidden" name="id" value="<?php echo $_GET["id_proveedor"];?>">
		  				 	  	 
		  				 	  	  <button type="submit" class="btn btn-default col-sm-offset-3">REGISTRAR</button>

		  				 	  </form>
		  				 </div>
		  			</div>
		 			
		 		</div><!--col sm 8-->
		 	</div><!--row-->
		 </div><!--container fluid-->
	</div>

	<?php require_once("footer.php");?>
	
</body>
</html>

<?php } else {

	header("Location:".Conectar::ruta()."index.php");
}?>