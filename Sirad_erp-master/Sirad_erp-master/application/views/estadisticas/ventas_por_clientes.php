  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<aside class="right-side">
	<section class="content-header">
		<h1>Ventas por Clientes<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>estadisticas">Estadísticas</a>
			</li>
			<li class="active">Ventas por Clientes</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<!--<h3 class="box-title">Lista <small>de Productos</small></h3>-->
						
					</div>
					<div class="modal-body">
						
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-daterange input-group">
									    <input type="text" class="form-control" name="start" id="date01" value="<?php echo date("d/m/Y"); ?>"/>
									    <span class="input-group-addon">Hasta</span>
									    <input type="text" class="form-control" name="end" id="date02" value="<?php echo date("d/m/Y"); ?>"/>
									</div>
								</div>
							</div>
							<div class="col-lg-3">								
								<div class="form-group">
									<label class="col-lg-3 control-label" for="monto">Monto</label>
									<div class="col-lg-9">															
										<select id="monto" name="monto" class="form-control  validate[required]" >
											<option value="1">Mayor a 50</option>
											<option value="2">Mayor a 100</option>
											<option value="2">Mayor a 1000</option>
										</select>														
									</div>
								</div>	
							</div>
							<div class="col-lg-3">	
								<button id="btn-rpt-porcliente" type="button" class="col-lg-12 btn btn-success btn-flat" >Generar</button>
							</div>
						</div></br>
<<<<<<< Updated upstream
						<div class="form-horizontal">
							<legend>REPRESENTACIÓN GRÁFICA</legend>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="box-header">
								 							   
=======
						
						<div i="form_generar">
							<div class="form-horizontal">
								<legend>REPRESENTACIÓN GRÁFICA</legend>
							</div>
							<div class="row">
								<div class="col-lg-12">

									<div class="box-header">

									    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
									    <script type="text/javascript">

										    google.load("visualization", "1", {packages:["corechart"]});
										    google.setOnLoadCallback(drawChart);
										    function drawChart() {
										        var data = google.visualization.arrayToDataTable([
										          ['Task', 'Hours per Day'],
										          ['Cliente1',     11],
										          ['Cliente2',      2],
										          ['Cliente3',  2],
										          ['Cliente4', 2],
										          ['Cliente5',    7]
										        ]);

										       	var options = {
										          title: 'Ventas por Cliente',
										          'width':800,
                      							  'height':500
										        };

										        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
										        chart.draw(data, options);
										    }
									    </script>

									</div>
								<div class="col-lg-6 col-lg-offset-1 control-label">
									<div class="modal-body">
										<div id="piechart" style="width: 900px; height: 500px;"></div>
									</div>
>>>>>>> Stashed changes
								</div>
								</div>
<<<<<<< Updated upstream
							</div>
						</div>
=======
							</div>	
>>>>>>> Stashed changes
						</div>	
					</div>
					
				</div>
			</div>
		</div>
	</section>
</aside>
</div>











