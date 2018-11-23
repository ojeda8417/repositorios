<aside class="right-side">
	<section class="content-header">
		<h1>Locales<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/">Administración</a>
			</li>
			<li class="active">Locales</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Locales</small></h3>
						<div class="box-tools pull-right">
                            <button id="btn-reg"  class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="locales_table" data-source = "<?php echo base_url();?>administracion/servicios/getLocales">
						  	<thead>
								<tr>
								  	<th>Nombre</th>
								  	<th>Teléfono</th>
								  	<th>Dirección</th>
								  	<th>Tipo de Rubro</th>								  	
								  	<th>Estado</th>
							  	</tr>
						  	</thead>   
							<tbody>
							</tbody>
						</table>
					</div>
					<!--MODALS-->	
					<div class="modal fade" id="modalLocales">
						<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">x</button>
										<h4 id='regLocal' class="modal-title">Registrar Local</h4>
										<h4 id='editLocal' class="modal-title">Modificar Local</h4>


									</div>
									<form id="LocalesForm" class="form-horizontal" method="post"  action-1="<?php echo base_url();?>administracion/locales/registrar" action-2="<?php echo base_url();?>administracion/locales/editar" data-source="<?php echo base_url();?>administracion/servicios/getUbigeo">
										<input type="hidden" id="idlocal" name="idlocal">
										<div class="modal-body">
											<fieldset>
												<div class="form-group">
												<label class="col-lg-4 control-label" for="nom-tienda">Nombre</label>
													<div class="col-lg-8">
														<div class="input-group">
												  			<input class="form-control focused validate[required]" id="nombre_tienda" name="nombre_tienda" type="text" data-prompt-position="topLeft">
												  			<span class="input-group-addon"><i class="fa ion-home"></i></span>
												  		</div>
													</div>
											  	</div>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="estado-tienda">Estado</label>
													<div class="col-lg-8">
												  		<select id="estado" name="estado" class="form-control validate[required]">
															<option value="1">Habilitado</option>
															<option value="0">Inhabilitado</option>
														</select>
													</div>
											  	</div>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="dir-tienda">Dirección</label>
													<div class="col-lg-8">
														<div class="input-group">
												  			<input class="form-control focused validate[required]" id="direccion" name="direccion" type="text" maxlength="150" data-prompt-position="topLeft">
															<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
														</div>
													</div>
											  	</div>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="tel-tienda">Teléfono</label>
													<div class="col-lg-8">
														<div class="input-group">
													  		<input class="form-control focused validate[required,custom[onlyLetterNumber]]" id="telefono" name="telefono" type="text" placeholder="999999999" title="Sólo números de 9 dígitos" maxlength="11" data-prompt-position="topLeft">
															<div class="input-group-addon"><i class="fa fa-phone"></i></div>
														</div>
													</div>
											  	</div>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="tipRubro-tienda">Tipo de Rubro</label>
													<div class="col-lg-8">
												  		<select id="tiprub" name="tiprub" class="form-control SelectAjax validate[required]" data-source="<?php echo base_url();?>administracion/servicios/getConstantesByClase/3" attrval="cConstanteValor" attrdesc="cConstanteDesc">
												  		</select>
													</div>
											  	</div>
											  	<h4 class="modal-title">Ubigeo</h4>
											  	<hr>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="dep-tienda">Departamento</label>
													<div class="col-lg-8">
												  		<select id="dep" name="dep" class="form-control validate[required]">
														</select>
													</div>
											  	</div>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="pro-tienda">Provincia</label>
													<div class="col-lg-8">
												  		<select id="prov" name="prov" class="form-control validate[required]">
														</select>
													</div>
											  	</div>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="dis-tienda">Distrito</label>
													<div class="col-lg-8">
												  		<select id="dist" name="dist" class="form-control validate[required]">
														</select>
													</div>
											  	</div>
											</fieldset>
										</div>
										<div class="modal-footer">
											<button type="reset" class="btn btn-flat btn-default" data-dismiss="modal">Cancelar</button>
											<button id="btn-reg-local" type="button" class="btn btn-flat btn-primary ">Registrar</button>
											<button id="btn-editar-local" type="button" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
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



			