<aside class="right-side">
	<section class="content-header">
		<h1>Cargos<small>Consultar</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>administracion">Administración</a>
				</li>
				<li class="active">Cargos</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Cargos</small></h3>
						<div class="box-tools pull-right">
                            <button id="btn-reg"  class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="cargos_table" data-source = "<?php echo base_url();?>administracion/servicios/getCargos">
							<thead>
								<tr>
									<th>Nombre del Cargo</th>
									<th>Estado</th>
								</tr>
							</thead>   
							<tbody>
							</tbody>
						</table>
					</div>
					<!--MODALS-->
					<div class="modal fade" id="modalCargo">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="regCargos" class="modal-title">Registrar Cargo</h4>
									<h4 id="editCargos" class="modal-title">Modificar Cargo</h4>
								</div>
								<form id="CargoForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/cargos/registrar" action-2="<?php echo base_url();?>administracion/cargos/editar">
									<input type="hidden" id="idCargo" name="idCargo">
									<div class="modal-body">
										<fieldset>
										  	<div class="form-group">
												<label class="col-lg-4 control-label" for="nom-cargo">Nombre de Cargo</label>
												<div class="col-lg-8">
													<div class="input-group">
												  		<input class="form-control focused validate[required,custom[onlyLetterSp]]" id="nom_cargo" name="nom_cargo" type="text" data-prompt-position="topLeft">
														<span class="input-group-addon"><i class="fa fa-tag"></i></span>
													</div>
												</div>
										  	</div>
										  	<div class="form-group">
												<label class="col-lg-4 control-label" for="estado">Estado</label>
												<div class="col-lg-8">
											  		<select id="selectEstado validate[required]" name="selectEstado" class="form-control" >
														<option value="1">Habilitado</option>
														<option value="0">Inhabilitado</option>
													</select>
												</div>
										  	</div>
										</fieldset>
									</div>								
									<div class="modal-footer">
										<button type="reset" class="btn btn-flat btn-default btn-cancelarprov" data-dismiss="modal">Cancelar</button>
										<button id="btn-reg-cargo" type="button" class="btn btn-flat btn-primary ">Registrar</button>
										<button id="btn-editar-cargo" type="button" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
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
			