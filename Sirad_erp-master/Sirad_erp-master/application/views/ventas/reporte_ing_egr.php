<aside class="right-side">
	<section class="content-header">
		<h1>Reporte<small>Egresos e Ingresos</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>ventas">Ventas</a>
				</li>
				<li class="active">Reporte Egresos e Ingresos</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
						<div class="box-body">			
		<div id="IngresosForm" name="IngresosForm">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-2">
					<div class="input-group">
				    	<input type="text" class="form-control datepicker" name="date01" id="date01" value="<?php echo date("d/m/Y"); ?>"/>
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
				<div class="col-lg-2">	
					<button id="buscarfecha" type="button" class="col-lg-12 btn btn-info btn-flat btn-buscarp"> <i class="fa fa-search"></i>  Buscar</button>
				</div>
				<div class="col-lg-2">	
					<button id="pdfgen" type="button" class="col-lg-12 btn btn-success btn-flat" >Reporte</button>
				</div>
			</div>
			<div class="form-horizontal">
				<legend>Ingresos</legend>
			</div>
			<table id="ingresos_table" class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Cantidad Vendida</th>
						<th>Monto Facturado</th>
						<th>Monto cobrado</th>
						<th>Tipo</th>
						<th>Concepto</th>
						<th>Vendedor</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="form-horizontal">
				<legend>Egresos</legend>
			</div>
			<table id="egresos_table" class="table table-bordered" >
				<thead>
					<tr>
						<th>ID</th>
						<th>Monto cobrado</th>
						<th>Tipo</th>
						<th>Concepto</th>
						<th>Vendedor</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="form-horizontal">
				<legend>General</legend>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
					<th>Descripción</th>
					<th>Monto</th>
					</tr>
				</thead>
				<tbody>
				<tr>
					<td>Ingresos</td>
					<td id="TotalIngresos"></td>
				</tr>
				<tr>
					<td>Egresos</td>
					<td id="TotalEgresos"></td>
				</tr>
				<tr>
					<td>TOTAL</td>
					<td id="TotalGeneral"></td>
				</tr>
				</tbody>
			</table>			
		</div>
		<div class="modal  fade" id="exportmodal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h3>EXPORTAR</h3>
					</div>
					<div class="modal-body">
						<form method="post" id="CreatePDFForm" target="_blank">
							<input type="hidden" name="title" id="title"/>
							<!--<input type="hidden" name="reporteingegrtable" id="reporteingegrtable" value=""/> -->
							<input type="hidden" name="table_ingresos" id="table_ingresos" value=""/>
							<input type="hidden" name="table_egresos" id="table_egresos" value=""/>
							<input type="hidden" name="table_total" id="table_total" value=""/>
							<div class="row">
								<div class="col-lg-6">
									<div class="small-box bg-yellow">
										<div class="inner">
											<h3>PDF</h3>
											<p>.pdf</p>
										</div>
										<div class="icon">
											<i class="ion ion-document-text"></i>
										</div>
										<a href="#" id="pdfbutton" class="small-box-footer">
											Exportar
											<i class="fa fa-arrow-circle-right"></i>
										</a>
									</div>
								</div>
								<div class="col-lg-6">
									<!-- small box -->
									<div class="small-box small-box bg-green">
										<div class="inner">
											<h3>Excel</h3>
											<p>.xls</p>
										</div>
										<div class="icon">
											<i class="ion ion-pie-graph"></i>
										</div>
										<a href="#" id="xlsutton" class="small-box-footer">
											Exportar
											<i class="fa fa-arrow-circle-right"></i>
										</a>
									</div>
								</div>
							</div>
						</form>				
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