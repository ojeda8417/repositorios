<aside class="right-side">
	<section class="content-header">
		<h1>Zonas<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion">Administracion</a>
			</li>
			<li class="active">Zonas</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">						
						<div class="form-horizontal">
							<div class="box-tools pull-right">
	                            <button id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></a>
	                        </div>
	                        <div class="control-group">
								<label class="control-label" for="tipo"></label>
							</div>							
						</div>					
						<hr>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="zonas_table" data-source = "<?php echo base_url();?>administracion/servicios/getZonas">
						  	<thead>
							  	<tr>
								  	<th>Nombre</th>
								  	<th>Estado</th>
								  	<th>Ubigeo</th>
							  	</tr>
						  	</thead>   
						  	<tbody>
							</tbody>
						</table>
					</div>
					<!--MODALS-->
					<div class="modal fade" id="modalZonas">
						<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">x</button>
										<h4 class="modal-title">Registrar Zona</h4>
									</div>
									<form id="ZonasForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>administracion/zonas/registrar" action-2="<?php echo base_url();?>administracion/zonas/editar" data-source="<?php echo base_url();?>administracion/servicios/getUbigeo">
										<input type="hidden" id="idZonas" name="idZonas">
										<div class="modal-body">
											<fieldset>
												<div class="form-group">
												<label class="col-lg-4 control-label" for="nom-zona">Nombre de la Zona</label>
													<div class="col-lg-8">
														<input class="form-control focused validate[required,custom[onlyLetterNumberSp]]" id="desc" name="desc" type="text" data-prompt-position="topLeft">
													</div>
											  	</div>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="estado-zona">Estado</label>
													<div class="col-lg-8">
												  		<select id="selectEstado" name="selectEstado" class="form-control">
															<option value="1">Habilitado</option>
															<option value="0">Inhabilitado</option>
														</select>
													</div>
											  	</div>
											  	<h4 class="modal-title">Ubigeo</h4>
											  	<hr>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="dep-zona">Departamento</label>
													<div class="col-lg-8">
												  		<select id="dep" name="dep" class="form-control">
														</select>
													</div>
											  	</div>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="prov-zona">Provincia</label>
													<div class="col-lg-8">
												  		<select id="prov" name="prov" class="form-control">
														</select>
													</div>
											  	</div>
											  	<div class="form-group">
												<label class="col-lg-4 control-label" for="dis-zona">Distrito</label>
													<div class="col-lg-8">
												  		<select id="dist" name="dist" class="form-control">
														</select>
													</div>
											  	</div>
											</fieldset>
										</div>
										<div class="modal-footer">
											<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
											<button id="btn-reg-zonas" type="button" class="btn btn-primary ">Registrar</button>
												<button id="btn-editar-zonas" type="button" class="btn btn-primary " style="display:none">Guardar</button>
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