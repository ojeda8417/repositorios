<?php

   require_once("class/config.php");

   if(isset($_SESSION["backend_id"])){
   
       
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
     				
     				<h2>Sistema de control de inventarios y ventas</h2>
     				<p class="justify">El   inventario es uno de los factores principales que determinan cómo   trabajan las empresas y obtienen beneficios; es saludable e importante   para todas las empresas el operar y administrar bien sus inventario. El   enfoque y el objetivo del control de inventarios es mantener un nivel   óptimo del inventario y su inversión</p>
     			</div>
     		</div><!--row-->
     	</div><!--container-->

     	<?php require_once("footer.php");?>
     </div><!--container-fluid-->
    
</body>
</html>

<?php
  } else {

  	 header("Location:".Conectar::ruta()."index.php");
  }
?>