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
<head>
<title>Sistema de Bodega 1.0.2 Modulo de Administracion (Beta)</title>
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="../lib/jquery-1.5.2.js" type="text/javascript"></script>
<script src="../lib/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#datos").validate({
     rules: {
	         nombre_imp:{
			         required: true,
		         },
			 valor:{
				     required: true
					 
				 },
			 fecha:{
				    required: true
				 }

			 },
	messages: {
		    nombre_imp: {
				  required: "El Nombre es OBLIGATORIO"
				 },
			valor:{
				 required: "El Valor es OBLIGATORIO",
				 number: "Solo ingrese numeros"
				},
		   fecha:{
			     required: "La fecha es OBLIGATORIA"
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
<?php $fecha= date("d/m/Y"); ?>

<div class="menubg flt">
	<ul class="menu flt">
        <li class="current_page_item"><a href="#" title="Crear Impuesto">Crear Impuesto</a></li>
        <li class=""><a href="listado_imp.php" title="Editar Impuesto">Editar Impuesto</a></li>
        <li class=""><a href="configura.php" title="Volver Al inicio">Volver</a></li>
      
	</ul>	
</div>
<div class="fondo_imp"></div>
<form action="add_imp.php" name="datos" id="datos" method="post">

<table border="0" class="tbl_imp">
  <tr>
    <td>Nombre:</td>
    <td>
      <input name="nombre_imp" type="text" id="nombre_imp" size="30" maxlength="30"  class="textbox"/>
    </td>
  </tr>
  <tr>
    <td>Valor:</td>
    <td>
      <input name="valor" type="text" id="valor" size="4" maxlength="4" /> 
      %
    </td>
  </tr>
  <tr>
    <td>Fecha:</td>
    <td><input type="text" name="fecha" id="fecha" readonly value="<?php echo $fecha; ?>" /></td>
  </tr>
    <tr>
    <td colspan="2" align="center"><button type="submit" ><img src="../img/disk.png" alt=""/> Grabar</button> 
      <button type="reset" class=""><img src="../img/delete.gif"alt=""/> Borrar</button></td>
    </tr>
</table>
</form>
</body>
