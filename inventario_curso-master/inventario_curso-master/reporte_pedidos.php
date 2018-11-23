<?php
   
   require_once("class/config.php");
     
      require_once("class/proveedoresModulo.php");

       $proveedores= new Proveedores();

       $proveedor=$proveedores->get_proveedores();
   
    
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

		 	  	 <div class="panel-proveedor">
		  				 <ol class="breadcrumb">
							  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>proveedores.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Proveedores</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>agregar_proveedor.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nuevos Proveedores</a></li>
							  <li><a href="<?php echo Conectar::ruta()?>pedidos.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Pedidos</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>agregar_pedido.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Nuevos Pedidos</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>reporte_pedidos.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Reporte Pedidos</a></li>
						</ol>
		  			</div>


		  			<div class="panel panel-default">
		  				 
		  				 <div class="panel-heading">
		  				 	<h3 class="panel-title">
		  				 		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		  				 	Formulario de Consulta de Pedidos de Productos a Proveedores
		  				 	</h3>
		  				 </div>

		  				 <div class="panel-body">
		  				 	 
		  				 	 <form action="<?php echo Conectar::ruta();?>reporte_pedido.php" target="_blank" class="form-horizontal formulario-reporte-pedidos" method="post">
		  				 	 	
		  				 	 	<div class="form-group">
		  				 	 		<label for="" class="col-sm-2 control-label">Búsqueda Desde</label>
		  				 	 		<div class="col-sm-6">

		  				 	 			 <select name="dia" class="form-control">
						                    <option value="">DIA</option>
						                    <option value="01">01</option>
						                    <option value="02">02</option>
						                    <option value="03">03</option>
						                    <option value="04">04</option>
						                    <option value="05">05</option>
						                    <option value="06">06</option>
						                    <option value="07">07</option>
						                    <option value="08">08</option>
						                    <option value="09">09</option>
						                    <option value="10">10</option>
						                    <option value="11">11</option>
						                    <option value="12">12</option>
						                    <option value="13">13</option>
						                    <option value="14">14</option>
						                    <option value="15">15</option>
						                    <option value="16">16</option>
						                    <option value="17">17</option>
						                    <option value="18">18</option>
						                    <option value="19">19</option>
						                    <option value="20">20</option>
						                    <option value="21">21</option>
						                    <option value="22">22</option>
						                    <option value="23">23</option>
						                    <option value="24">24</option>
						                    <option value="25">25</option>
						                    <option value="26">26</option>
						                    <option value="27">27</option>
						                    <option value="28">28</option>
						                    <option value="29">29</option>
						                    <option value="30">30</option>
						                    <option value="31">31</option>
						                  </select>

						                  <select name="mes" class="form-control">
						                    <option value="">MES</option>
						                    <option value="01">ENERO</option>
						                    <option value="02">FEBRERO</option>
						                    <option value="03">MARZO</option>
						                    <option value="04">ABRIL</option>
						                    <option value="05">MAYO</option>
						                    <option value="06">JUNIO</option>
						                    <option value="07">JULIO</option>
						                    <option value="08">AGOSTO</option>
						                    <option value="09">SEPTIEMBRE</option>
						                    <option value="10">OCTUBRE</option>
						                    <option value="11">NOVIEMBRE</option>
						                    <option value="12">DICIEMBRE</option>
						                  </select>

						                  <select name="ano" class="form-control">
						                      <option value="">AÑO</option>
						                      <option value="2014">2014</option>
						                      <option value="2015">2015</option>
						                      <option value="2016">2016</option>
						                      <option value="2017">2017</option>
						                      <option value="2018">2018</option>
						                      <option value="2019">2019</option>
						                      <option value="2020">2020</option>
						                      <option value="2021">2021</option>
						                      <option value="2022">2022</option>
						                      <option value="2023">2023</option>
						                      <option value="2024">2024</option>
						                      <option value="2025">2025</option>
						                      <option value="2026">2026</option>
						                      <option value="2027">2027</option>
						                      <option value="2028">2028</option>
						                      <option value="2029">2029</option>
						                      <option value="2030">2030</option>
						                      <option value="2031">2031</option>
						                      <option value="2032">2032</option>
						                      <option value="2033">2033</option>
						                      <option value="2034">2034</option>
						                      <option value="2035">2035</option>
						                    </select>
		  				 	 			
		  				 	 		</div>
		  				 	 	</div>


		  				 	 	<div class="form-group">
		  				 	 		
		  				 	 		<label for="" class="col-sm-2 control-label">Búsqueda Hasta</label>
		  				 	 	    <div class="col-sm-6">
		  				 	 	    	 <select name="dia1" class="form-control">
						                    <option value="">DIA</option>
						                    <option value="01">01</option>
						                    <option value="02">02</option>
						                    <option value="03">03</option>
						                    <option value="04">04</option>
						                    <option value="05">05</option>
						                    <option value="06">06</option>
						                    <option value="07">07</option>
						                    <option value="08">08</option>
						                    <option value="09">09</option>
						                    <option value="10">10</option>
						                    <option value="11">11</option>
						                    <option value="12">12</option>
						                    <option value="13">13</option>
						                    <option value="14">14</option>
						                    <option value="15">15</option>
						                    <option value="16">16</option>
						                    <option value="17">17</option>
						                    <option value="18">18</option>
						                    <option value="19">19</option>
						                    <option value="20">20</option>
						                    <option value="21">21</option>
						                    <option value="22">22</option>
						                    <option value="23">23</option>
						                    <option value="24">24</option>
						                    <option value="25">25</option>
						                    <option value="26">26</option>
						                    <option value="27">27</option>
						                    <option value="28">28</option>
						                    <option value="29">29</option>
						                    <option value="30">30</option>
						                    <option value="31">31</option>
						                  </select>

						                  <select name="mes1" class="form-control">
						                    <option value="">MES</option>
						                    <option value="01">ENERO</option>
						                    <option value="02">FEBRERO</option>
						                    <option value="03">MARZO</option>
						                    <option value="04">ABRIL</option>
						                    <option value="05">MAYO</option>
						                    <option value="06">JUNIO</option>
						                    <option value="07">JULIO</option>
						                    <option value="08">AGOSTO</option>
						                    <option value="09">SEPTIEMBRE</option>
						                    <option value="10">OCTUBRE</option>
						                    <option value="11">NOVIEMBRE</option>
						                    <option value="12">DICIEMBRE</option>
						                  </select>

						                  <select name="ano1" class="form-control">
						                      <option value="">AÑO</option>
						                      <option value="2014">2014</option>
						                      <option value="2015">2015</option>
						                      <option value="2016">2016</option>
						                      <option value="2017">2017</option>
						                      <option value="2018">2018</option>
						                      <option value="2019">2019</option>
						                      <option value="2020">2020</option>
						                      <option value="2021">2021</option>
						                      <option value="2022">2022</option>
						                      <option value="2023">2023</option>
						                      <option value="2024">2024</option>
						                      <option value="2025">2025</option>
						                      <option value="2026">2026</option>
						                      <option value="2027">2027</option>
						                      <option value="2028">2028</option>
						                      <option value="2029">2029</option>
						                      <option value="2030">2030</option>
						                      <option value="2031">2031</option>
						                      <option value="2032">2032</option>
						                      <option value="2033">2033</option>
						                      <option value="2034">2034</option>
						                      <option value="2035">2035</option>
						                    </select>
		  				 	 	    </div>
		  				 	 	</div>


		  				 	 	<div class="form-group">
		  				 	 		
		  				 	 		<label for="" class="col-sm-2 control-label">Proveedor</label>
		  				 	 	    <div class="col-sm-6">
		  				 	 	    	<select name="rif_proveedor" class="form-control">
		  				 	 	    		
		  				 	 	    		<option value="0">SELECCIONE</option>
                                            
                                            <?php for($i=0;$i<sizeof($proveedor);$i++){
                                              
                                              ?>
                                                <option value="<?php echo $proveedor[$i]["rif_proveedor"];?>"><?php echo $proveedor[$i]["nombre_proveedor"];?></option>
                                              <?php

                                            }?>

		  				 	 	    	</select>
		  				 	 	    </div>
		  				 	 	</div>
                                
                                <input type="hidden" name="grabar" value="si">

                                 <button type="submit" class="btn btn-default col-sm-offset-2">CONSULTAR</button>
		  				 	 </form>
		  				 </div>

		  			</div>
		 	  	
		 	  </div><!--col sm 8-->
		 </div><!--row-->
	</div>

</div><!--container fluid-->
	  
	  <?php require_once("footer.php");?>
</body>
</html>

<?php } else {

	 header("Location:".Conectar::ruta()."index.php");
	 exit();
}?>