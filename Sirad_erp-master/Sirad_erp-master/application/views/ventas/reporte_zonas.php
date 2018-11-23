<aside class="right-side">
	<section class="content-header">
		<h1>Reporte Zonas<small>Consultar</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>ventas">Ventas</a>
				</li>
				<li class="active">Reporte Zonas</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
	                    <div class="box-header well" data-original-title>
							<h2>Reporte de Zonas</h2>
							<div class="box-icon">
							</div>
						</div>
                	</div>
					<div class="box-body table-responsive">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="zonapersonal_table" data-source="<?php echo base_url();?>administracion/servicios/getZonasPersonal">
						  	<thead>
							  	<tr>
								  <th>Nombre</th>
								  <th>Encargado</th>
								  <th>Ubigeo</th>
							  	</tr>
						  	</thead>   
						    <tbody>
							</tbody>
						</table>
					</div>
				<div class="row-fluid sortable">		
					<div class="box">
						<div class="box-header well" data-original-title>
							<h2>Reporte de Clientes/Zonas</h2>
						</div>
						<div class="row-fluid">
							<div class="span6">
							</div>
							<div class="span6">
								<input id="pdfgen" type="button" value="Reporte General" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
							</div>
						</div>
						<div class="box-body table-responsive">
							<table class="table table-striped table-bordered bootstrap-datatable datatable" id="clientes_table">
								<thead>
									<tr>
										<th>Nombres</th>
									  	<th>Apellidos</th>
									  	<th>DNI</th>
									  	<th>Línea de Crédito</th>	  
								  	</tr>
							  	</thead>
						  	</table>  
						</div>
					</div><!--/span-->
					<div class="modal hide fade" id="exportmodal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h3>EXPORTAR</h3>
						</div>
						<div class="modal-body">
							<form method="post" target="_blank" id="CreatePDFForm">
								<input type="hidden" name="title" id="title"/>
									<input type="hidden" name="table_resumen" id="table_resumen"/>
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
				</div><!--/row-->
				</div>
			</div>
		</div>
	</section>
</aside>
</div>