<?php session_start();?>
<?PHP if(($_SESSION["USUARIO"])==0)
{
?>
<script language='JavaScript'>
alert("SIN HACER LOG-IN, NO PUEDE ACCEDER AL SISTEMA");
//Mensaje de error
window.location = "../index.html"
//redireccionamos
</script>
<?php
exit;
}
?>
<?php
include("../lib/conexion.php");
$Db=Conectarse();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mantenedor de Clientes</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../lib/jquery-1.5.2.js"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#region_clte").change(function(event){
            var id = $("#region_clte").find(':selected').val();
            $("#comuna_clte").load('genera-select.php?id='+id);
        });
    });
</script>
<script type="text/javascript">
$(document).ready(function() {
$("#datos").validate({
     rules: {
	         rut_clte:{
			         required: true,
					 number:true
		         },
			 dv_clte:{
				     required: true
					 
				 },
			 nombre1:{
				    required: true
				 },
			nombre2:{
					required: true
				},	 
			ape_paterno:{
					required: true
				},
			ape_materno:{
					required: true
				},
			region_clte:{
					required: true
				},
			comuna_clte:{
					required: true
				},
			dire_clte:{
					required: true
				}		
			 },
	messages: {
		    rut_clte: {
				  required: "*"
				 },
			dv_clte:{
				 required: "*"
				},
		  	nombre1:{
				 required: "*"
				},
			nombre2:{
				 required: "*"
				},
		   ape_paterno:{
				 required: "*"
				},
		  ape_materno:{
				 required: "*"
				},
			region_clte:{
				 required: "*"
				},
			comuna_clte:{
				 required: "*"
				},
			dire_clte:{
				 required: "*"
				}		
		} 
    
})
})
</script>
</head>
<body>
<!--Mostramos el usuario que inicio sesion... -->
<div id="login">Bienvenido Usuario:<br>
<?php echo $_SESSION["USUARIO"];?></div>

<div class="menubg flt">
	<ul class="menu flt">
        <li class=""><a href="listado_cli.php" title="Cliente Natural">Cliente Natural</a></li>
       <li class=""><a href="listado_cli_emp.php" title="Cliente Empresa">Cliente Empresa</a></li>
		<li class=""><a href="Clientes.php" title="Volver al Inicio">Volver</a></li>
	</ul>	
</div>



</body>
</html>