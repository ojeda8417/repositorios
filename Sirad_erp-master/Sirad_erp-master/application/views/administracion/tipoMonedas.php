<aside class="right-side">
	<section class="content-header">
		<h1>
			Tipo de Moneda
			<small>Consultar</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion">Administración</a>
			</li>
			<li class="active">Tipo Moneda</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Monedas</small></h3>
						<div class="box-tools pull-right">
                            <button id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="tipomoneda_table" data-source = "<?php echo base_url();?>administracion/servicios/getTipoMonedas">
							<thead>
								<tr>
									<th>Nombre</th>
								  	<th>Monto S/.</th>
									<th>Estado</th>
							  	</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<div class="modal fade" id="modalTipoMoneda">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Registrar Tipo de Moneda</h4>
								</div>
								<form id="TipoMonedaForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/tipomonedas/registrar" action-2="<?php echo base_url();?>administracion/tipomonedas/editar">
									<input type="hidden" id="idTipoMoneda" name="idTipoMoneda">
									<div class="modal-body">
										<fieldset>
										  	<div class="form-group">
												<label class="col-lg-4 control-label" for="nom-moneda">Nombre de la Moneda</label>
												<div class="col-lg-8">
													<div class="input-group">
												  		<input class="form-control focused validate[required,custom[onlyLetterSp]]" id="desc_tipomoneda" name="desc_tipomoneda" type="text" data-prompt-position="topLeft">
														<span class="input-group-addon"><i class="fa fa-money"></i></span>
													</div>
												</div>
										  	</div>
										  <div class="form-group">
												<label class="col-lg-4 control-label" for="monto">Monto</label>
												<div class="col-lg-8">
													<div class="input-group">
											  			<input id="monto" name="monto" type="text" class="form-control validate[required,custom[number]]" data-prompt-position="topLeft">
														<span class="input-group-addon">.00</span>
													</div>
												</div>
										  	</div>
										  	<div class="form-group">
												<label class="col-lg-4 control-label" for="estado">Estado</label>
												<div class="col-lg-8">
											  		<select id="selectEstado" name="selectEstado" class="form-control">
														<option value="1">Habilitado</option>
														<option value="0">Inhabilitado</option>
													</select>
												</div>
										  	</div>
										</fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-flat btn-default btn-cancelarprov" data-dismiss="modal">Cancelar</button>
										<button id="btn-reg-tipomoneda" type="button" class="btn btn-flat btn-primary ">Registrar</button>
										<button id="btn-editar-tipomoneda" type="button" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
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
			