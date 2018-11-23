<aside class="right-side">
	<section class="content-header">
		<h1>Salida Productos<small>Ver</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>logistica">Logistica</a>
				</li>
				<li class="active">Salida de Productos</li>
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
						<div id="RegistrarSalidaForm" class="form-horizontal" method="post">
							<fieldset>
								<div class="row-fluid">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-lg-4 control-label" for="documento">Documento</label>
											<div class="col-lg-8">
												<span class="help-inline" style="margin-top:5px;" id="serie_nro"><?php echo $cSalProdSerie."-".$cSalProdNro;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="registrador">Registrador</label>
											<div class="col-lg-8">
												<span class="help-inline" style="margin-top:5px;" id="registrador"><?php echo $registrador;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="motivo">Motivo</label>
											<div class="col-lg-8">
												<span class="help-inline" style="margin-top:5px;" id="motivo"><?php echo $DescMotivo;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="tienda">Tienda</label>
											<div class="col-lg-8">
												<span class="help-inline" style="margin-top:5px;" id="local"><?php echo $cLocalDesc;?></span>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-lg-4 control-label" for="fecha">Fecha</label>
											<div class="col-lg-8">
												<span class="help-inline" style="margin-top:5px;" id="fec_reg"><?php echo $dSalProdFecReg;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="solicitante">Solicitante</label>
											<div class="col-lg-8">
												<span class="help-inline" style="margin-top:5px;" id="solicitante"><?php echo $solicitante;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="observaciones">Observaciones</label>
											<div class="col-lg-8">
												<span class="help-inline" style="margin-top:5px;" id="observacion"><?php echo $cSalProdObsv;?></span>
											</div>
										</div>
									</div>
								</div>
								
							</fieldset>
						</div>
						<hr>
						<h3>Detalle Salida Productos</h3>
						<hr>
						<div class="box-body table-responsive">
							<table id="salida_productos_table" name="salida_productos_table" class="table table-striped table-bordered bootstrap-datatable datatable"  data-source="<?php echo base_url()."logistica/servicios/get_log_detsalprod/".$nSalProd_id;?>">
								<thead>
									<tr>
										<th>Producto</th>
										<th>Cantidad</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
								<tfoot>
									<tr>
										<th>Total</th>
										<th id="totalprod"></th>
									</tr>
								</tfoot>
							</table>
						</div>												
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url();?>logistica/views/cons_salidaproductos/" class="btn btn-success"><i class="icon icon-white icon-arrowthick-w"></i>
							Volver
						</a>
					</div>				
					<!----------------Modal EXPORTAR-------------------->
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
<!--/fluid-row-->