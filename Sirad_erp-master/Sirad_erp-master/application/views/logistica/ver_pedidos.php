<noscript>
	<div class="alert alert-block span10">
		<h4 class="alert-heading">Warning!</h4>
		<p>
			Necesitas tener
			<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
			habilitado para usar este sitio.
		</p>
	</div>
</noscript>
	<div id="content" class="span10">
			<!-- content starts -->
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>logistica/">Logística</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>logistica/views/cons_pedidos/">Pedidos</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>PEDIDOS: VER DATOS</h2>
					</div>
					<div class="row-fluid">
						<div class="span6">
						</div>
						<div class="span6">
							<input id="pdfgen" name="pdfgen" type="button" value="Reporte" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
						</div>
					</div>
					<div class="box-content">
						<div class="form-horizontal">
							<fieldset>
								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="codigo">N° de Pedido</label>
											<div class="controls">
												<span id="codigo" class="help-inline" style="margin-top:5px;"><?php echo $cOrdPedSerie;?></span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="registrador">Registrador</label>
											<div class="controls">
												<span id="registrador" class="help-inline" style="margin-top:5px;"><?php echo $nomape;?></span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="tienda">Tienda</label>
											<div class="controls">
											  	<span id="tienda" class="help-inline" style="margin-top:5px;"><?php echo $cLocalDesc;?></span>
											</div>
										</div>
									</div>
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="fechapedido">Fecha de Pedido</label>
											<div class="controls">
												<span id="fechapedido" class="help-inline" style="margin-top:5px;"><?php echo $dOrdPedFecReg;?></span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="fechaentrega">Fecha de Entrega</label>
											<div class="controls">
												<span class="help-inline" id="fechaentrega" style="margin-top:5px;"><?php echo $dOrdePedFecEnt;?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="observaciones">Observaciones</label>
									<div class="controls">
										<span id="observaciones" class="help-inline" style="margin-top:5px;"><?php echo $cOrdPedObsv;?></span>
									</div>
								</div>
							</fieldset>
						</div>
						<hr>
						<h3>Detalle Pedido</h3>
						<hr>
						<table id="productos_table" class="table table-striped table-bordered bootstrap-datatable datatable" 
						data-source="<?php echo base_url()."logistica/servicios/get_log_detordpedido/".$nOrdPed_id;?>">
							<thead>
								<tr>
									<th>Producto</th>
									<th>Cant. Total</th>
									<th>Cant. Aceptada</th>
									<th>Estado</th>						  
								</tr>
							</thead>   
							<tbody>
							</tbody>
							<tfoot>
								<tr>
									<th >Total</th>
									<th id="totalprod" colspan="3"></th>
								</tr>
					</tfoot>
						</table>			
						<div class="form-actions">
							<a href="<?php echo base_url();?>logistica/views/cons_pedidos/" class="btn btn-success"><i class="icon icon-white icon-arrowthick-w"></i> Volver</a>
						</div>
					</div>
					<div class="modal hide fade" id="exportmodal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h3>EXPORTAR</h3>
						</div>
						<div class="modal-body">
							<form method="post" target="_blank" id="CreatePDFForm">
								<input type="hidden" name="nombrearchivo" id="nombrearchivo"/>
								<input type="hidden" name="title" id="title"/>
								<input type="hidden" name="table_resumen" id="table_resumen"/>
								<input type="hidden" name="table_producto" id="table_producto"/>
								<input type="hidden" name="table_total" id="table_total"/>
								<div class="sortable row-fluid ui-sortable">
									<a id="pdfbutton" name="pdfbutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a PDF.">
										<span class="icon32 icon-color icon-pdf"></span>
										<div>PDF</div>
									</a>
					
									<a id="xlsbutton" name="xlsbutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a Excel.">
										<span class="icon32 icon-color icon-xls"></span>
										<div>Excel</div>
									</a>
								</div>
							</form>				
						</div>
					</div>
				</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				