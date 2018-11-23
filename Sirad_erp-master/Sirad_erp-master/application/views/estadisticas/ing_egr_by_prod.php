<aside class="right-side">
	<section class="content-header">
		<h1>Ingresos y Egresos por Producto<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>estadisticas">Estadísticas</a>
			</li>
			<li class="active">Ingresos y Egresos por Producto</li>
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
							<div class="col-lg-3">
								<div class="form-group">
									<label class="col-lg-2 control-label" for="anio">Año</label>
									<div class="col-lg-9">
										<div class="input-group">
											<input class="form-control " id="anio" name="anio" type="text" data-prompt-position="topLeft">
											<span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">								
								<div class="form-group">
									<label class="col-lg-2 control-label" for="mes">Mes</label>
									<div class="col-lg-9">															
										<select id="mes" name="mes" class="form-control  validate[required]" >
											<option value="1">Todos</option>
											<option value="2">Enero</option>
											<option value="3">Febrero</option>
											<option value="4">Marzo</option>
											<option value="5">Abril</option>
											<option value="6">Mayo</option>
											<option value="7">Junio</option>
											<option value="8">Julio</option>
											<option value="9">Agosto</option>
											<option value="10">Setiembre</option>
											<option value="11">Octubre</option>
											<option value="12">Noviembre</option>
											<option value="13">Diciembre</option>
										</select>														
									</div>
								</div>	
							</div>
							<div class="col-lg-3">	
								<label class="col-lg-0 col-sm-1 checkbox-inline" style="text-align:right;">
									<input id="semanai" name="semanai" style="float:none;" type="checkbox">
								</label>							
								<div class="form-group">
									<label class="col-lg-3 control-label" for="semana">Semana</label>
									<div class="col-lg-7">															
										<select id="semana" name="semana" class="form-control  validate[required]" >
											<option value="1">Todos</option>
											<option value="2">Semana1</option>
											<option value="3">Semana2</option>
											<option value="4">Semana3</option>
											<option value="5">Semana4</option>
										</select>														
									</div>
								</div>	
							</div>
							<div class="col-lg-3">	
								<button id="btn-rpt-ingegrprod" type="button" class="col-lg-12 btn btn-success btn-flat" >Generar</button>
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
								          ['Year', 'Ingresos', 'Egresos'],
								          ['2004',  1000,      400],
								          ['2005',  1170,      460],
								          ['2006',  660,       1120],
								          ['2007',  1030,      540]
								        ]);

								        var options = {
								          title: 'Ingresos y Egresos por Producto'
								        };

								        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
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











