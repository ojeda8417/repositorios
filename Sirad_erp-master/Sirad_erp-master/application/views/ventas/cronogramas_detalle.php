<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $cClienteNom." ".$cClienteApe; ?>
            <small>CRÉDITOS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>ventas">Ventas</a></li>
            <li class="active">Cronograma de Pago</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                	<div class="box-body">
                		<table class="table table-striped table-bordered bootstrap-datatable datatable" id="creditos_table"
						data-source="<?php echo base_url().'ventas/servicios/get_detallecronograma_bycliente/'.$nCliente_id;?>">
						  <thead>
							  <tr>
								  <th>Fecha de la Venta</th>
								  <th>Monto Total S/.</th>
								  <th>Monto Pagado S/.</th>
								  <th>Nro de Cuotas</th>
								  <th></th>
								  <th></th>	
								  <th></th>							 
							  </tr>
						  </thead>
						  	<tbody>
						  	</tbody>
					  </table>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<a href="<?php echo base_url();?>ventas/views/cronogramas" class="btn btn-success btn-flat"><i class="fa fa-mail-reply"></i> Volver</a>
						</div>
    			</div><!-- /.box -->
    			<div class="modal fade" id="modalCuotas">
    				<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Cuotas</h4>
							</div>
							<div class="modal-body">
								<form id="PagarCuotasForm" class="form-horizontal" action-1="<?php echo base_url(); ?>ventas/cronogramas/pagarcuota">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-lg-4 control-label" for="amortizacion">A cuenta</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input class="form-control" id="monto" type="number" step="0.1" value="0" min="0">
														<div class="input-group-addon">
		                                            	S/.
		                                            	</div>
													</div>
													<input type="hidden" name="monto" id="montoapg">
													<input type="hidden" name="nVenta_id" id="nVenta_id">
													<input type="hidden" name="idcredito" id="idcredito">
												</div>										
											</div>
										</div>
										<div class="col-lg-6">
											<button id="pagar" class="btn btn-flat btn-warning btn-buscarc" style="margin: 0 18px;"><i class='ion ion-arrow-swap'></i> Pagar</button>
										</div>
									</div>
									
								</form>
								<table id="cuotas_table" class="table table-striped table-bordered bootstrap-datatable datatable">
								  	<thead>
										<tr>
										  	<th>Fecha de Pago</th>
										  	<th>Nro de Cuota</th>
										  	<th>Monto Pagar</th>
										  	<th>Monto Aplicado</th>
									  	</tr>
								  	</thead>   
								  	<tbody>		
								  	</tbody>
							  </table> 
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<a id='guardar_pago' href="#" class="btn btn-primary btn-guardar">Guardar</a>
							</div>
						</div>
					</div>
				</div>
				<!----Modal-->
				<div class="modal fade" id="vercronograma">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">¿Desea exportar el Cronograma?</h4>
							</div>
							<div class="modal-body">
								<form method="post" target="_blank" id="CreatePDFForm">
									<input type="hidden" name="nombrearchivo" id="nombrearchivo"/>
									<input type="hidden" name="tcronograma" id="tcronograma"/>
									<input type="hidden" name="tdetalle" id="tdetalle"/>
									<input type="hidden" name="tresumen" id="tresumen"/>
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
								                <a href="#" id="pdfbutton" class="small-box-footer">
								                    Exportar <i class="fa fa-arrow-circle-right"></i>
								                </a>
								            </div>
								        </div><!-- ./col -->
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
								                <a href="#" id="xlsutton" class="small-box-footer">
								                    Exportar <i class="fa fa-arrow-circle-right"></i>
								                </a>
								            </div>
								        </div><!-- ./col -->
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div>