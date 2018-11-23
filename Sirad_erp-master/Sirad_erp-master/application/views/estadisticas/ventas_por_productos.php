<aside class="right-side">
	<section class="content-header">
		<h1>Ventas por Productos<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>estadisticas">Estadísticas</a>
			</li>
			<li class="active">Ventas por Productos</li>
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
							<div class="col-lg-9">
								<div class="form-group">
									<div class="input-daterange input-group">
									    <input type="text" class="form-control" name="start" id="date01" value="<?php echo date("d/m/Y"); ?>"/>
									    <span class="input-group-addon">Hasta</span>
									    <input type="text" class="form-control" name="end" id="date02" value="<?php echo date("d/m/Y"); ?>"/>
									</div>
								</div>
							</div>
							
							<div class="col-lg-3">	
								<button id="btn-rpt-porprod" type="button" class="col-lg-12 btn btn-success btn-flat" >Generar</button>
							</div>
						</div></br>
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
											['Element', '', { role: 'style' }],
										    ['Copper', 8.94, '#b87333'],            // RGB value
											['Silver', 10.49, 'silver'],            // English color name
											['Gold', 19.30, 'gold'],
											['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
										    ]);

									        var options = {
									          title: 'Ventas por Productos',
									          hAxis: {title: 'Productos', titleTextStyle: {color: 'red'}}
									        };

									        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
									        chart.draw(data, options);
									      }
									    </script>

								</div>
								<div class="col-lg-6 col-lg-offset-1 control-label">
									<div class="modal-body">
										<div id="chart_div" style="width: 900px; height: 500px;">
										</div>
									</div>
								</div>
							</div>
						</div>		
					</div>
					
				</div>
			</div>
		</div>
	</section>
</aside>
</div>











