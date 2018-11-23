<aside class="right-side">
	<section class="content-header">
		<h1>Tipo IGV<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/">Administración</a>
			</li>
			<li class="active">Tipo IGV</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Tipos de IGV</small></h3>
						<div class="box-tools pull-right">
                            <button id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>
					<div class="box-body table-responsive">
						<table id="tipo_igv_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>administracion/servicios/getTipoIGV">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Porcentaje (%)</th>
									<th>Fecha Registro</th>
									<th>Estado</th>									
								</tr>
							</thead>   
							<tbody>
							</tbody>
						</table>
					</div>
					<!--MODALS-->		
					<div class="modal fade" id="modalTipoIGV">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Registrar Tipo IGV</h4>
								</div>
								<form id="TipoIGV_Registrar" class="form-horizontal" method="post" action-1="<?php echo base_url();?>administracion/tipoigvs/registrar" action-2="<?php echo base_url();?>administracion/tipoigvs/editar">
									<input type="hidden" id="idTipoIGV" name="idTipoIGV">
									<div class="modal-body">
										<fieldset>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="tipoigv">Tipo IGV</label>
												<div class="col-lg-8">
													<div class="input-group">
											  			<input class="form-control focused validate[required,custom[onlyLetterNumberSp]]" id="tipo" name="tipo" type="text" data-prompt-position="topLeft">
														<span class="input-group-addon"><i class="fa fa-tag"></i></span>
													</div>
												</div>
										  	</div>
										  	<div class="form-group">
												<label class="col-lg-4 control-label" for="porcentaje">Porcentaje</label>
												<div class="col-lg-8">
													<div class="input-group">
											  			<input id="porc" name="porc" type="text" class="form-control validate[required,custom[number]]" data-prompt-position="topLeft">
														<span class="input-group-addon">%</span>
													</div>
												</div>
										  	</div>
										  	<div class="form-group">
												<label class="col-lg-4 control-label" for="estado">Estado</label>
												<div class="col-lg-8">
											  		<select id="estado" name="estado" style="margin: 0 18px 0 0;" class="form-control input focused">
													<option value="1">Habilitado</option>
													<option value="0">Deshabilitado</option>
												</select>
												</div>
										  	</div>
										</fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-flat btn-default btn-cancelarprov" data-dismiss="modal">Cancelar</button>
										<button id="btn-tipoigv-reg" type="submit" class="btn btn-flat btn-primary ">Registrar</button>
										<button id="btn-tipoigv-edi" type="button" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
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