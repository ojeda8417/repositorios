<?php 
   
   require_once("class/config.php");
   
   if(isset($_SESSION["backend_id"])){ 

   	require_once("class/configuracionModulo.php");

   	$config= new Configuracion();

   	$datos=$config->get_configuracion();

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
					
					<div class="panel-configuracion">
						 <ol class="breadcrumb">
							  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>configuracion.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Configuración</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>agregar_configuracion.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Agregar Configuración</a></li>
						</ol>
					</div>

					<div class="panel panel-default">
						
						<div class="panel-heading">
							<h3 class="panel-title">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>	Formulario de Configuración
							</h3>
						</div>

						<div class="panel-body">
							 
							 <table class="table" id="myTable">
							 	
							 	<thead>
							 		<tr>
							 			<th>Rif de empresa</th>
							 			<th>Nombre de empresa</th>
							 			<th>Dirección de empresa</th>
							 			<th>Teléfono de empresa</th>
							 			<th>Cédula de gerente</th>
							 			<th>Nombre de gerente</th>
							 			<th>Apellido de gerente</th>
							 			<th>Correo de gerente</th>
							 			<th>Teléfono de gerente</th>
							 			<th>Iva</th>
							 			<th>Acciones</th>
							 		</tr>
							 	</thead>

							 	<tbody>
							 		<?php for($i=0; $i<sizeof($datos);$i++) {?>
							 		<tr>
							 			<td><?php echo $datos[$i]["rif_empresa"];?></td>
							 			<td><?php echo $datos[$i]["nom_empresa"];?></td>
							 			<td><?php echo $datos[$i]["direc_empresa"];?></td>
							 			<td><?php echo $datos[$i]["tlf_empresa"];?></td>
							 			<td><?php echo $datos[$i]["ced_gerente"];?></td>
							 			<td><?php echo $datos[$i]["nom_gerente"];?></td>
							 			<td><?php echo $datos[$i]["ape_gerente"];?></td>
							 			<td><?php echo $datos[$i]["correo_gerente"];?></td>
							 			<td><?php echo $datos[$i]["tlf_gerente"];?></td>
							 			<td><?php echo $datos[$i]["iva"];?></td>
							 			<td><a class="btn btn-success" href="<?php echo Conectar::ruta();?>editar_configuracion.php?id_configuracion=<?php echo $datos[$i]["codigo"];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a> <a class="btn btn-danger" href="<?php echo Conectar::ruta();?>eliminar_configuracion.php?id_configuracion=<?php echo $datos[$i]["codigo"];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></td>
							 		</tr>
							 		<?php } ?>
							 	</tbody>
							 </table>

						</div>

					</div>
				</div><!--col-sm-8-->
			</div><!--row-->
		</div><!--container-fluid-->

	</div><!--container fluid-->
	
	<?php require_once("footer_js_tabla.php");?>

	<?php require_once("footer.php");?>
</body>
</html>

<?php
 
 } else {

 	 header("Location:".Conectar::ruta()."index.php");
 }
 ?>