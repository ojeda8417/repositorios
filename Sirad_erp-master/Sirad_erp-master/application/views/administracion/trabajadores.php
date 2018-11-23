<aside class="right-side">
	<section class="content-header">
		<h1>Trabajadores<small>Consultar</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>administracion/">Administración</a>
				</li>
				<li class="active">Trabajadores</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Lista <small>de Trabajadores</small></h3>
							<div class="box-tools pull-right">
	                            <button id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
	                        </div>
						</div>
						<div class="box-body table-responsive">						
							<table class="table table-striped table-bordered bootstrap-datatable datatable" id="trabajadores_table" data-source="<?php echo base_url();?>administracion/servicios/gettrabajadores">
							  	<thead>
								  	<tr>
									  	<th>Nombres</th>
									  	<th>Apellidos</th>
									  	<th>DNI</th>
									  	<th>Teléfono</th>								  	
									  	<th>Estado</th>
								  	</tr>
							  	</thead>
							  	<tbody>
							  	</tbody>
						  	</table>
						  </div>
					  	<!--MODALS--> 
						<div class="modal fade" id="modalTrabajadores">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 id='regTrabajador' class="modal-title">Registrar Trabajador</h4>
										<h4 id='editTrabajador'>Modificar Trabajador</h4>
									</div>
									<form id="TrabajadoresForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>administracion/trabajadores/registrar" action-2="<?php echo base_url();?>administracion/trabajadores/editar">
										<input type="hidden" id="idTrabajadores" name="idTrabajadores">
										<div class="modal-body">
											<fieldset>
											  <div class="form-group">
												<label class="col-lg-4 control-label" for="nom-trabajador">Nombres</label>
												<div class="col-lg-8">
													<div class="input-group">													
													  <input class="form-control  focused validate[required,custom[onlyLetterSp]]" maxlength="50" title="Este campo debe ser sólo letras" id="nombres" name="nombres" type="text"  data-prompt-position="topLeft">
													  <span class="input-group-addon"><i class="fa fa-user"></i></span>	
													</div>
												</div>
											  </div>
											  <div class="form-group">
												<label class="col-lg-4 control-label" for="ape-trabajador">Apellidos</label>
												<div class="col-lg-8">
													<div class="input-group">
													  <input class="form-control focused validate[required,custom[onlyLetterSp]]" maxlength="50"  title="Este campo debe ser sólo letras" id="apellidos" name="apellidos" type="text" data-prompt-position="topLeft">
													  <span class="input-group-addon"><i class="fa fa-user"></i></span>		
													</div>
												</div>
											  </div>
											  <div class="form-group">
												<label class="col-lg-4 control-label" for="fec-trabajador">Fecha de Nacimiento</label>
												<div class="col-lg-8">
													<div class="input-group">													
													  	<input type="text" placeholder="dd/mm/YYYY"  maxlength="10" title="Debe ingresar un formato de fecha correcto" class="form-control datepicker validate[required,custom[date]]" id="fechanacimiento" name="fechanacimiento" >
														<div class="input-group-addon"><i class="fa fa-calendar"></i></div>												
													</div>
												</div>
											  </div>					  
											   <div class="form-group">
												<label class="col-lg-4 control-label" for="edad-trabajador">Edad</label>
												<div class="col-lg-8">
													<div class="input-group">
													  <input class="form-control focused validate[required,custom[onlyNumberSp]]" maxlength="2" title="Este campo sólo admite números" id="edad" name="edad" type="text" data-prompt-position="topLeft">
													  <span class="input-group-addon"><i class="fa fa-male"></i></span>	
													</div>
												</div>
											  </div>
											 <div class="form-group">
												<label class="col-lg-4 control-label" for="dni-trabajador">DNI</label>
												<div class="col-lg-8">
													<div class="input-group">
													  <input class="form-control focused validate[required,custom[onlyNumberSp]] validate[minSize[8]]" maxlength="8" title="Este campo debe tener 8 números" id="dni" name="dni" type="text" data-prompt-position="topLeft">
													  <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>	
													</div>
												</div>
											  </div>
											  <div class="form-group">
												<label class="col-lg-4 control-label" for="tel-trabajador">Teléfono</label>
												<div class="col-lg-8">
													<div class="input-group">
													  <input class="form-control focused validate[required,custom[onlyLetterNumber]]" placeholder="999999999"  maxlength="12" id="telefono" name="telefono" type="text" data-prompt-position="topLeft">
													  <div class="input-group-addon"><i class="fa fa-phone"></i></div> 	
													</div>
												</div>
											  </div>
											  <div class="form-group">
												<label class="col-lg-4 control-label" for="email-trabajador">Email</label>
												<div class="col-lg-8">
													<div class="input-group">
													  <input class="form-control focused validate[required,custom[email]]" maxlength="100" placeholder="example@domain.com" id="email" name="email" type="email" data-prompt-position="topLeft">
													  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>	
													</div>
												</div>
											  </div>					  
											  <div class="form-group">
												<label class="col-lg-4 control-label" for="sexo-trabajador">Sexo</label>
												<div class="col-lg-8">
												  <select id="sexo" name="sexo" class="form-control validate[required]" data-prompt-position="topLeft"> 
													<option value="M">M</option>
													<option value="F">F</option>
												  </select>
												</div>
											  </div>	
											   <div class="form-group">
												<label class="col-lg-4 control-label" for="cargo-trabajador">Cargo</label>
												<div class="col-lg-8">
												  <select id="cargo" class="form-control SelectAjax validate[required]" name="cargo" data-source="<?php echo base_url();?>administracion/servicios/getcargos" attrval="nCargo_id" attrdesc="nCargoDesc" data-prompt-position="topLeft">
												  </select>
												</div>
											  </div>					  
											  <div class="form-group">
												<label class="col-lg-4 control-label" for="estado-trabajador">Estado</label>
												<div class="col-lg-8">
												  <select id="estado" name="estado" class="form-control validate[required]" data-prompt-position="topLeft">
													<option value="1">Habilitado</option>
													<option value="0">Inhabilitado</option>
												  </select>
												</div>
											  </div>
											</fieldset>
										</div>
										<div class="modal-footer">
												<button type="reset" class="btn btn-flat btn-default btn-cancelarprov" data-dismiss="modal">Cancelar</button>
												<button id="btn-reg-trabajadores" class="btn btn-flat btn-primary ">Registrar</button>
												<button id="btn-editar-trabajadores" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
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
		