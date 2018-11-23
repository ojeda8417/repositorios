<?php

 require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){

    if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
       
       require_once("class/clientesModulo.php");

       $usuario=new Clientes();

       $usuario->agregar_cliente();
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

					<div class="panel-cliente">
						<ol class="breadcrumb">
						  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>clientes.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Clientes</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>agregar_cliente.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Agregar Cliente</a></li>
						   <li><a href="<?php echo Conectar::ruta();?>reporte_clientes.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> listado de clientes en pdf</a></li>
						</ol>
					</div>

					<?php 

                       if(isset($_GET["m"])){
                         
                         switch($_GET["m"]){

                           case "1";
                           ?>
                           <h2>Los campos estan vacios</h2>
                           <?php
                           break;

                           case "2";
                           ?>
                           <h2>el cliente se ha agregado</h2>
                           <?php
                           break;
                         }
                       }
					?>

					<div class="panel panel-default">
						 
						 <div class="panel-heading">
						 	<h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Registro de Clientes</h3>
						 </div>

						 <div class="panel-body">
						 	 <form action="" method="post" class="form-horizontal">
						
						   <div class="form-group">
							<label for="" class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-6">
								<input type="text" name="nombre" class="form-control" placeholder="ingrese su nombre">
							</div>
						    </div>
						                           
                           <div class="form-group">
							<label for="" class="col-sm-2 control-label">Apellido</label>
							<div class="col-sm-6">
								<input type="text" name="apellido" class="form-control" placeholder="ingrese su apellido">
							</div>
						    </div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Cédula</label>
							<div class="col-sm-6">
								<input type="text" name="cedula" class="form-control" placeholder="ingrese su cedula">
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Teléfono</label>
							<div class="col-sm-6">
								<input type="text" name="telefono" class="form-control" placeholder="ingrese su telefono">
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Dirección</label>
							<div class="col-sm-6">
								<input type="text" name="direccion" class="form-control" placeholder="ingrese su direccion">
							</div>
							</div>

							
							<input type="hidden" name="grabar" value="si">

							<button class="btn btn-default col-sm-offset-2">REGISTRAR</button>
                          
                          </form>
						</div><!--panel-body-->
					    
						 </div>
					</div>

					
				</div><!--col-sm-8-->
			</div><!--row-->
		</div><!--container-fluid-->
	</div>

	<?php require_once("footer.php");?>
	
</body>
</html>

<?php } else {

	header("Location:".Conectar::ruta()."index.php");
}?>