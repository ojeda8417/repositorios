<?php

require_once("class/config.php");

require_once("class/userModulo.php");

$usuario= new Usuarios();

 if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){

    $usuario->login();
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
<body class="pagina_index">
	
	 <div class="container-fluid">
	 	
	 	<div class="container">
	 		<div class="row">
	 			<div class="col-sm-8 col-sm-offset-3">
	 				<h2>SISTEMA DE CONTROL DE INVENTARIO Y VENTAS</h2>
	 			</div>
	 		</div><!--row-->
	 	</div><!--container-->

	 	<div class="container">
	 		<div class="row">
	 			<div class="col-sm-5 col-sm-offset-3">
	 				
	 				<form method="post" action="">
	 					
                     <div class="form-group">
                     	<label for="">Usuario</label>
                     	<input type="text" name="usuario" class="form-control" placeholder="usuario">
                     </div>

                     <div class="form-group">
                     	<label for="">Password</label>
                     	<input type="text" name="password" class="form-control" placeholder="password">
                     </div>

                    <input type="hidden" name="grabar" value="si">
                     <button type="submit" class="btn btn-default">ENVIAR</button>
	 				</form>
	 			</div>
	 		</div>
	 	</div>
	 </div><!--container-fluid-->
</body>
</html>