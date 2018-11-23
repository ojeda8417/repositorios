<aside class="right-side">
	<section class="content-header">
		<h1>Orden de Materiales <small> Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica">Logistica</a>
			</li>
			<li class="active">Orden de Materiales</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
	                    <h4 class="box-title">Ver Datos</h4>
	                    <div class="box-tools pull-right">
							<div class="col-lg-8">
								<input id="pdfgen" type="button" value="Reporte" class="btn btn-success" />
							</div>
						</div>
                	</div>
					<div class="box-body">
						<div class="form-horizontal">
							<fieldset>
								<div class="row-fluid">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-lg-4 control-label" for="fecRegistro">Fecha de Registro</label>
											<div class="col-lg-8">
												<span id="fec_reg" class="help-inline"><?php echo $OrdComMatFecReg;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="nroOrdeCompras">Código del Documento</label>
											<div class="col-lg-8">
												<span id="codigo" class="help-inline"><?php echo $serieNummeroOrdMat;?></span>					
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="nroOrdeCompras">Código Interno</label>
											<div class="col-lg-8">
												<span id="codigo" class="help-inline"><?php echo $serNumOrdCompraMat;?></span>					
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="nroOrdeCompras">Tipo de Documento</label>
											<div class="col-lg-8">
												<span id="tipodoc" class="help-inline"><?php echo $nOrdTipoDocumento;?></span>					
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="registrador">Registrador</label>
											<div class="col-lg-8">
												<span id="registrador" class="help-inline"><?php echo $cPersonalNom;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="proveedor">Proveedor</label>
											<div class="col-lg-8">
												<span id="proveedor" class="help-inline" ><?php echo $cProveedorRazSocial;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="observacion">Observaciones</label>
											<div class="col-lg-8">
												<span id="observaciones" class="help-inline"><?php echo $cOrdComMatObsv;?></span>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-lg-4 control-label" for="subtotal">Subtotal</label>
											<div class="col-lg-8">
												<span id="subtotal" class="help-inline"><?php echo "S/ ".$nOrdComMatSubTotal;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="subtotal">IGV</label>
											<div class="col-lg-8">
												<span id="igv" class="help-inline" style="margin-top:5px;"><?php echo $nOrdComMatIGV."  %";?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="descuento">Descuento</label>
											<div class="col-lg-8">
												<span id="descuento" class="help-inline" style="margin-top:5px;"><?php echo $nOrdComMatDesct." %";?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="subtotal">Total</label>
											<div class="col-lg-8">
												<span id="total" class="help-inline"><?php echo "S/  ".$nOrdComMatTotal;?></span>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<hr>
						<h3>Detalle Orden de Materiales</h3>
						<hr>
						<div class="box-body table-responsive">
							<table id="materiales_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url()."logistica/servicios/get_log_detordcomprasMateriales/".$nOrdenComMat_id;?>">
								<thead>
									<tr>
										<th>Material</th>
										<th>Cantidad</th>
										<th>Prec. Unitario S/.</th>
										<th>Importe S/.</th>
										<th>Orden de Pedido</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="box-footer">
							<a href="<?php echo base_url();?>logistica/views/cons_ordencompra_mat/" class="btn btn-success"> <i class="icon icon-white icon-arrowthick-w"></i>Volver</a>
						</div>
					</div>
					
					<div class="modal fade" id="exportmodal">
						<div class="modal-dialog">
							<div class="modal-content">
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
										<div class="row">
											<div class="col-lg-6">
									            <!-- small box -->
									            <div class="small-box bg-yellow">
													<div class="inner">
									                    <h3>
									                        PDF
									                    </h3>
									                    <p>
									                        .pdf
									                    </p>
									                </div>
									                <div class="icon">
				                    					<i class="ion ion-document-text"></i>
				                					</div>
									                <a id="pdfbutton" class="small-box-footer">
									                    Exportar <i class="fa fa-arrow-circle-right"></i>
									                </a>
												</div>
											</div>
											<div class="col-lg-6">
									            <!-- small box -->
									            <div class="small-box small-box bg-green">
									                <div class="inner">
									                    <h3>
									                        Exel
									                    </h3>
									                    <p>
									                       .xls
									                    </p>
									                </div>
									                <div class="icon">
									                    <i class="ion ion-pie-graph"></i>
									                </div>
									                <a id="xlsutton" class="small-box-footer">
									                    Exportar <i class="fa fa-arrow-circle-right"></i>
									                </a>
									            </div>
									        </div><!-- ./col -->
										</div>
									</form>
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