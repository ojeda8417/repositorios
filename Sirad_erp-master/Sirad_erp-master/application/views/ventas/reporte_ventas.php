<aside class="right-side">
	<section class="content-header">
		<h1>
			Reporte Ventas
			<small>Tienda/Zona</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>ventas">Ventas</a>
			</li>
			<li class="active">Reporte Ventas</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_1" data-toggle="tab">Ventas en Tienda</a>
						</li>
						<li>
							<a href="#tab_2" data-toggle="tab">Ventas en Zona</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div id="RepVentasForm" method="post" action-1="<?php echo base_url();?>ventas/servicios/reporte_ventas_bytienda">
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
											<div class="input-group">
												<input id="vendedor" type="text" class="form-control" placeholder="Vendedor">
												<span class="input-group-addon"><i class="fa  fa-user"></i></span>
											</div>
										</div>	
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<div class="input-group">
												<input id="cliente" type="text" class="form-control" placeholder="Cliente">
												<span class="input-group-addon"><i class="fa  fa-user"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">									
									<div class="col-lg-4">
										<div class="form-group">
											<label class="col-lg-4 control-label" for="selectTipoPag">Tipo de Pago</label>
											<div class="col-lg-8">
												<select id="selectTipoPag" name="selectTipoPag" class="form-control SelectAjax  validate[required]" data-source="<?php echo base_url();?>
													administracion/servicios/getConstantesByClase/2" attrval="cConstanteValor" attrdesc="cConstanteDesc" required>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label class="col-lg-3 control-label" for="estado">Estado</label>
											<div class="col-lg-9">															
												<select id="estado" name="estado" class="form-control  validate[required]" >
													<option value="-1">Seleccionar</option>
													<option value="2">Pagada</option>
													<option value="0">Anulada</option>
													<option value="1">Credito</option>
													<option value="3">Separación</option>
												</select>														
											</div>
										</div>
									</div>									
									<div class="col-lg-2">	
										<button id="buscarfecha" type="button" class="col-lg-12 btn btn-info btn-flat btn-buscarp"> <i class="fa fa-search"></i>  Buscar</button>
									</div>
									<div class="col-lg-2">	
										<button id="btn-rpt-tienda" type="button" class="col-lg-12 btn btn-success btn-flat" >Reporte</button>
									</div>
								</div>
							</div>
							<hr>
							<table id="ventas_table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Fecha Emisión</th>
										<th>Vendedor</th>
										<th>Cliente</th>
										<th>Tipo Pago</th>
										<th>Sub-Total S/.</th>
										<th>Descuento(%)</th>
										<th>IGV(%)</th>
										<th>Total Facturado S/.</th>
										<th>A Cuenta S/.</th>
										<th>Saldo S/.</th>
										<th>Estado</th>
									</tr>
								</thead>
								
								<tbody></tbody>
							</table>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_2">
							<div id="RepVentasZonasForm" method="post" action-1="<?php echo base_url();?>ventas/servicios/reporte_ventas_byzona">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<div class="input-daterange input-group">
											    <input type="text" class="form-control" name="start" id="date01zona" value="<?php echo date("d/m/Y"); ?>"/>
											    <span class="input-group-addon">Hasta</span>
											    <input type="text" class="form-control" name="end" id="date02zona" value="<?php echo date("d/m/Y"); ?>"/>
											</div>
										</div>
									</div>
									<div class="col-lg-3">								
										<div class="form-group">
											<div class="input-group">
												<input id="vendedorZona" type="text" class="form-control" placeholder="Vendedor">
												<span class="input-group-addon"><i class="fa  fa-user"></i></span>
											</div>
										</div>	
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<div class="input-group">
												<input id="clienteZona" type="text" class="form-control" placeholder="Cliente">
												<span class="input-group-addon"><i class="fa  fa-user"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label class="col-lg-4 control-label" for="selectTipoPag_byZona">Tipo de Pago</label>
											<div class="col-lg-8">
												<select id="selectTipoPag_byZona" name="selectTipoPag_byZona" class="form-control SelectAjaxTipo  validate[required]" data-source="<?php echo base_url();?>
													administracion/servicios/getConstantesByClase/2" attrval="cConstanteValor" attrdesc="cConstanteDesc" required>
												</select>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label class="col-lg-3 control-label" for="estado">Estado</label>
											<div class="col-lg-9">															
												<select id="estadoZona" name="estadoZona" class="form-control  validate[required]" >
													<option value="-1">Seleccionar</option>
													<option value="2">Pagada</option>
													<option value="0">Anulada</option>
													<option value="1">Crédito</option>
													<option value="3">Separación</option>
												</select>														
											</div>
										</div>
									</div>	
									<div class="col-lg-2">	
										<button id="buscarfechazona" type="button" class="col-lg-12 btn btn-info btn-flat btn-buscarp"> <i class="fa fa-search"></i>  Buscar</button>
									</div>
									<div class="col-lg-2">	
										<button id="btn-rpt-zona" type="button" class="col-lg-12 btn btn-success btn-flat" >Reporte</button>
									</div>
								</div>
								<hr>
								<div class="box-body table-responsive">							
									<table id="ventas_table_zona" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Fecha Emisión</th>
												<th>Vendedor</th>
												<th>Cliente</th>
												<th>Tipo Pago</th>
												<th>Sub-Total S/.</th>
												<th>Descuento(%)</th>
												<th>IGV(%)</th>
												<th>Total Facturado S/.</th>
												<th>A Cuenta S/.</th>
												<th>Saldo S/.</th>
												<th>Estado</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- nav-tabs-custom -->
				<!--------------MODAL EXPORTAR------------------>
				<div class="modal fade" id="exportmodal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">EXPORTAR</h4>
							</div>
							<div class="modal-body">
								<form method="post" target="_blank" id="CreatePDFForm">
									<input type="hidden" name="title" id="title"/>
									<input type="hidden" name="table_venta" id="table_venta"/>
									<div class="row">
										<div class="col-lg-6">
											<!-- small box -->
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
										<!-- ./col -->
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
										<!-- ./col -->
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
</div>