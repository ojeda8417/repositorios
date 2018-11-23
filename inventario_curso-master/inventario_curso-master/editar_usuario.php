<?php

 require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){
     
     require_once("class/userModulo.php");
   
   	$usuario=new Usuarios();

    $datos= $usuario->get_usuario_por_id($_GET["id_usuario"]);

    if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
       
       $usuario->editar_usuario();
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

					<div class="panel-usuario">
						<ol class="breadcrumb">
						  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>usuarios.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>agregar_usuario.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Agregar Usuario</a></li>
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
                           <h2>el usuario se ha editado</h2>
                           <?php
                           break;
                         }
                       }
					?>

					<div class="panel panel-default">
						 
						 <div class="panel-heading">
						 	<h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Editar de Usuarios</h3>
						 </div>

						 <div class="panel-body">
						 	 <form action="" method="post" class="form-horizontal">
						
						   <div class="form-group">
							<label for="" class="col-sm-2 control-label">Cédula</label>
							<div class="col-sm-6">
								<input type="text" name="cedula" class="form-control" placeholder="ingrese su cedula" value="<?php echo $datos[0]["cedula"];?>">
							</div>
						    </div>
						                           
                           <div class="form-group">
							<label for="" class="col-sm-2 control-label">Nombres</label>
							<div class="col-sm-6">
								<input type="text" name="nombre" class="form-control" placeholder="ingrese su nombre" value="<?php echo $datos[0]["nombre"];?>">
							</div>
						    </div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Cargo</label>
							<div class="col-sm-6">
								<input type="text" name="cargo" class="form-control" placeholder="ingrese su cargo" value="<?php echo $datos[0]["cargo"];?>">
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Usuario</label>
							<div class="col-sm-6">
								<input type="text" name="usuario" class="form-control" placeholder="ingrese su usuario" value="<?php echo $datos[0]["usuario"];?>">
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-6">
								<input type="text" name="password" class="form-control" placeholder="ingrese su password" value="<?php echo $datos[0]["password"];?>">
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Repita Password</label>
							<div class="col-sm-6">
								<input type="text" name="password2" class="form-control" placeholder="repita su password" value="<?php echo $datos[0]["password2"];?>">
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Pregunta Secreta</label>
							<div class="col-sm-6">
								<select name="pregunta" class="form-control" id="">
									
									<option value="0">SELECCIONE</option>
									<option value="NOMBRE DE MASCOTA" <?php if($datos[0]["pregunta"]=='NOMBRE DE MASCOTA'){echo "selected='selected'";}?>>NOMBRE DE MASCOTA</option>
									<option value="NOMBRE DE LA MADRE" <?php if($datos[0]["pregunta"]=='NOMBRE DE LA MADRE'){echo "selected='selected'";}?>>NOMBRE DE LA MADRE</option>
									<option value="MEJOR AMIGO DE LA INFANCIA" <?php if($datos[0]["pregunta"]=='MEJOR AMIGO DE LA INFANCIA'){echo "selected='selected'";}?>>MEJOR AMIGO DE LA INFANCIA</option>
									<option value="EQUIPO DE FUTBOL FAVORITO" <?php if($datos[0]["pregunta"]=='EQUIPO DE FUTBOL FAVORITO'){echo "selected='selected'";}?>>EQUIPO DE FUTBOL FAVORITO</option>
									<option value="NOMBRE DE TU MEJOR PROFESOR" <?php if($datos[0]["pregunta"]=='NOMBRE DE TU MEJOR PROFESOR'){echo "selected='selected'";}?>>NOMBRE DE TU MEJOR PROFESOR</option>
								</select>
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Respuesta Secreta</label>
							<div class="col-sm-6">
								<input type="text" name="respuesta" class="form-control" placeholder="ingrese respuesta" value="<?php echo $datos[0]["respuesta"];?>">
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">Nivel Acceso</label>
							<div class="col-sm-6">
								
								<select name="nivel" class="form-control" id="">

									<option value="0">SELECCIONE</option>
									<option value="ADMINISTRADOR" <?php if($datos[0]["nivel"]=='ADMINISTRADOR'){echo "selected='selected'";}?>>ADMINISTRADOR</option>
									<option value="ASISTENTE" <?php if($datos[0]["nivel"]=='ASISTENTE'){echo "selected='selected'";}?>>ASISTENTE</option>
									
								</select>
							</div>
							</div>

							<input type="hidden" name="grabar" value="si">
                            
                            <input type="hidden" name="id" value="<?php echo $_GET["id_usuario"];?>">

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