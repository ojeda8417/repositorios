<aside class="right-side">
	<section class="content-header">
		<h1>Cronograma de Pagos<small>Consultar</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>ventas">Ventas</a>
				</li>
				<li class="active">Cronograma de Pagos</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body table-responsive">
						<table id="deudores_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>ventas/servicios/get_clientemorosos">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombres y Apellidos</th>
									<th>DNI</th>
									<th>Zona</th>
									<th>Dirección</th>
									<th>Total Crédito S/.</th>
									<th>Total Pago Realizado S/.</th>
									<th>Saldo S/.</th>
									<th>Estado</th>
									<th>Responsable</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<!-----MODAL EXPORTAR------>
					<div class="modal hide fade" id="exportmodal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h3>EXPORTAR</h3>
						</div>
					<div class="modal-body">
							<form method="post" target="_blank" id="CreatePDFForm">
									<input type="hidden" name="nombrearchivo" id="nombrearchivo"/>
									<input type="hidden" name="title" id="title"/>
									<input type="hidden" name="table_clientes" id="table_clientes"/>
								<div class="sortable row-fluid ui-sortable">
									<a id="pdfbutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a PDF.">
										<span class="icon32 icon-color icon-pdf"></span>
										<div>PDF</div>
									</a>
									<a id="xlsutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a Excel.">
										<span class="icon32 icon-color icon-xls"></span>
										<div>Excel</div>
									</a>
							  	</div>
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
</div>