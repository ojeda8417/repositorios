
<?php

require_once("class/config.php");

 if(isset($_SESSION["backend_id"])){
   
   require_once("class/userModulo.php");
   
   $usuario=new Usuarios();

   $datos=$usuario->get_usuario();

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
    	 
    	<?php require_once("menu_principal.php"); ?>

    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-sm-3">
    				
    				<?php require_once("menu_lateral.php");?>
    			</div>

    			<div class="col-sm-8">
    				
    				<div class="panel-usuario">
    					<ol class="breadcrumb">
						  <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="<?php echo Conectar::ruta();?>home.php">Principal</a></li>
						  <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <a href="<?php echo Conectar::ruta();?>usuarios.php">Usuarios</a></li>
						  <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <a href="<?php echo Conectar::ruta();?>agregar_usuario.php">Nuevo Usuario</a></li>
						</ol>
    				</div><!--panel usuario-->

                   <div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"> </span>Consulta General de Usuarios</h3>
					  </div>

					  <div class="panel-body">
					     
					     <table class="table" id="myTable">
					     	  
					     	  <thead>
					     	   <tr>
						     	
						     	  	<th>Código</th>
						     	  	<th>Cédula</th>
						     	  	<th>Nombres</th>
						     	  	<th>Status</th>
						     	  	<th>Fecha</th>
						     	  	<th>Acciones</th>
					     	  </tr>
					     	  </thead>

					     	  <tbody>
					     	  	<?php for($i=0;$i<sizeof($datos);$i++){?>
					     	  <tr>
					     	  	<td><?php echo $datos[$i]["id"];?></td>
					     	  	<td><?php echo $datos[$i]["cedula"];?></td>
					     	  	<td><?php echo $datos[$i]["nombre"];?></td>
					     	  	<td><?php echo $datos[$i]["nivel"];?></td>
					     	  	<td><?php echo Conectar::invierte_fecha($datos[$i]["fecha_ingreso"])?></td>
					     	    <td><a class="btn btn-success" href="<?php echo Conectar::ruta();?>editar_usuario.php?id_usuario=<?php echo $datos[$i]["id"];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> Editar</a> <a class="btn btn-danger" href="<?php echo Conectar::ruta();?>eliminar_usuario.php?id_usuario=<?php echo $datos[$i]["id"];?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"> </span> Eliminar</a></td>
					     	  </tr>
					     	  <?php }?>
					     	  </tbody>
					     </table>
					  </div>
					</div>
    			</div><!--col-sm-8-->
    		</div><!--row-->
    	</div>

    	<?php require_once("footer_js_tabla.php");?>
    </div><!--container-fluid-->

    <?php require_once("footer.php");?>
	
</body>
</html>

<?php } else {

    header("Location:".Conectar::ruta()."index.php");
}?>