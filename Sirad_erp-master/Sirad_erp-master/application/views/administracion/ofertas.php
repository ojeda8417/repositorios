<aside class="right-side">
	<section class="content-header">
		<h1>Ofertas<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/">Administración</a>
			</li>
			<li class="active">Ofertas</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Ofertas</small></h3>
						<div class="box-tools pull-right">
                            <button id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>														
					<div class="box-body table-responsive">
						<table id="ofertas_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>administracion/servicios/getOfertas">
							<thead>
								<tr>
									<th>Fecha Inicio</th>
									<th>Descripción</th>
									<th>Descuento (%)</th>
									<th>Fecha Vencimiento</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>						
					<!--MODALS-->	
					<div class="modal fade" id="OfertaModal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">x</button>
									<h4 class="modal-title">Registrar Oferta</h4>
								</div>
								<form id="OfertasForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/ofertas/registrar" action-2="<?php echo base_url();?>administracion/views/editar_ofertas/">
									<div  class="modal-body">
										<fieldset>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="fec-ini">Fecha de Inicio</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input type="text" class="form-control datepicker validate[required,custom[date]]" id="fecha_ini" name="fecha_ini" data-prompt-position="topLeft">
														<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="fec-ven">Fecha de Vencimiento</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input type="text" class="form-control datepicker validate[required,custom[date]]" id="fecha_fin" name="fecha_fin" data-prompt-position="topLeft">
														<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="descripcion">Descripción</label>
												<div class="col-lg-8">
													<textarea class="form-control validate[required]" name="descripcion" maxlength="200" id="descripcion" rows="2" data-prompt-position="topLeft"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="descuento">Venta Descuento</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input class="form-control focused validate[required,custom[onlyNumberSp]]" name="descuento" id="descuento" type="text" data-prompt-position="topLeft">
														<span class="input-group-addon">%</span>
													</div>
												</div>
											</div>								
										</fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-flat btn-default" data-dismiss="modal">Cancelar</button>
										<button id="enviar_oferta_btn" type="button" class="btn btn-flat btn-primary">Guardar</button>
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