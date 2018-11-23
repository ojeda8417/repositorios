<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Usuarios
			<small>Consultar</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion">Administración</a>
			</li>
			<li class="active">Usuarios</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<div id="rootwizard">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li>
								<a href="#tab1" data-toggle="tab">DATOS</a>
							</li>
							<li>
								<a href="#tab2" data-toggle="tab">PERMISOS</a>
							</li>
							<li>
								<a href="#tab3" data-toggle="tab">LOCALES</a>
							</li>
						</ul>
						<form id="UsuarioForm" action-1="<?php echo base_url();?>auth/create_user" action-2="<?php echo base_url();?>auth/edit_user" action-3="<?php echo base_url();?>auth/activate" action-4="<?php echo base_url();?>auth/deactivate">							
							<div class="tab-content">
								<div class="tab-pane" id="tab1">
									<div class="row">
										<div class="form-horizontal">
											<div class="col-lg-6 col-md-offset-3">
												<div class="form-group" style="padding-top: 10px;">
													<label class="col-lg-4 control-label" for="trabajador">Trabajador</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input id="trabajador" name="nPersonal_id" type="hidden">
															<input id="user_id" name="user_id" type="hidden" >
															<input id="email" name="email" type="hidden">
															<input class="form-control validate[required]" id="nombre_trabajador" type="text" readonly>
															<div id="btn-trabajador" class="btn btn-info btn-flat input-group-addon btn-buscarc"> <i class="fa fa-search" style="color:white;"></i>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-4 control-label" for="username">Usuario ID</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input class="form-control validate[required] validate[custom[onlyLetterNumberSp]]" id="username" name="username" type="text" title="El usuario puede contener leras y números" maxlength="20">
															<span class="input-group-addon"><i class="fa fa-user"></i></span>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-lg-4 control-label" for="contrasena">Contraseña</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input class="form-control validate[required] validate[minSize[8]]" id="password" name="password" type="password">
															<span class="input-group-addon"><i class="fa fa-key"></i></span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-4 control-label" for="recontrasena">Re. Contraseña</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input class="form-control validate[equals[password]]" type="password" name="password2" id="password2">
															<span class="input-group-addon"><i class="fa fa-key"></i></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab2">
									<div class="row">
										<div class="col-lg-3 col-md-offset-1">
											<h4 class="top-block">Ventas</h4>
											<?php foreach ($groups_ventas as $group):?>
											<div class="form-group">
												<label>
		                                            <input type="checkbox" class="flat-blue validate[required] validate[minCheckbox[1]]" id="group<?php echo $group['id'];?>" name="groups[]" value="<?php echo $group['id'];?>">
		                                            <?php echo $group['description'];?>
		                                        </label>
		                                    </div>
											<?php endforeach?>
										</div>
										<div class="col-lg-3 col-md-offset-1">
											<h4 class="top-block">Logística</h4>
											<?php foreach ($groups_logistica as $group):?>
												<div class="form-group">
													<label>
			                                            <input type="checkbox" class="flat-blue validate[required] validate[minCheckbox[1]]" id="group<?php echo $group['id'];?>" name="groups[]" value="<?php echo $group['id'];?>">
			                                            <?php echo $group['description'];?>
			                                        </label>
			                                    </div>
											<?php endforeach?>
										</div>
										<div class="col-lg-3 col-md-offset-1">
											<h4 class="top-block">Administración</h4>
											<?php foreach ($groups_administracion as $group):?>
												<div class="form-group">
													<label>
			                                            <input type="checkbox" class="flat-blue validate[required] validate[minCheckbox[1]]" id="group<?php echo $group['id'];?>" name="groups[]" value="<?php echo $group['id'];?>">
			                                            <?php echo $group['description'];?>
			                                        </label>
			                                    </div>
											<?php endforeach?>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab3">
									<div style="padding-top: 1em;">
										<?php $count = 0; ?>
										<?php foreach ($locales as $local):?>
											<?php if($count == 0): ?>
												<div class="row">
											<?php endif ?>
											<div class="col-lg-3 col-md-offset-1">
												<div class="form-group">
													<label>
														<input class="flat-blue validate[minCheckbox[1]]" type="checkbox" id="local<?php echo $local['nLocal_id'];?>" name="locales[]" value="<?php echo $local['nLocal_id'];?>" name="groups[]" style="opacity: 0;">
														<?php echo $local["cLocalDesc"];?>
													</label>
												</div>
											</div>
											<?php $count++;  ?>
											<?php if($count == 3):?>
												</div>
												<?php $count = 0;?>
											<?php endif ?>
										<?php endforeach?>
									</div>
								</div>
							</div>
							<div class="box box-info">
								<div class="box-body">
									<ul class="pager wizard">
										<li class="previous">
											<a class="btn btn-default" href="#">Atrás</a>
										</li>
										<li class="next">
											<a class="btn btn-default" href="#">Siguiente</a>
										</li>
										<li >
											<a style="float:right" id="btn_cancelar" href="#">Cancelar</a>
										</li>
										<li class="next finish current" id="btn-reg-usuario" style="display:none;">
											<a class="btn btn-info" href="javascript:;">Registrar</a>
										</li>
										<li class="next finish" id="btn-update-usuario" style="display:none;">
											<a class="btn btn-info" href="javascript:;">Guardar</a>
										</li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Usuarios</small></h3>
					</div>
					<div class="box-body">
						<table id="usuarios_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>administracion/servicios/get_usuarios">
							<thead>
								<tr>
									<th>Usuario ID</th>
									<th>Trabajador</th>
									<th>Último Login</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>						
			<div class="modal fade" id="modalBuscarTrabajador">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Trabajadores</h4>
						</div>
						<div class="modal-body">
							<table id="select_trabajador_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>administracion/servicios/get_trabajadores_nouser">
								<thead>
									<tr>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>DNI</th>
										<th>Teléfono</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="#" data-dismiss="modal" class="btn btn-flat btn-default">Cancelar</a>
							<a  id="select_trabajador" href="#" class="btn btn-flat btn-primary">Seleccionar</a>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="comfir_desactivar">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3>Atención</h3>
						</div>
						<div class="modal-body">
							<div class="alert alert-error">
								<p> <i class="icon icon-alert icon-red"></i>
									Desea desactivar a
									<span id="show_user"></span>
									?
								</p>
							</div>

						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Close</a>
							<a id="btn_drop_usuario" href="#" class="btn" data-dismiss="modal">Aceptar</a>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="is_admin">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3>Atención</h3>
						</div>
						<div class="modal-body">
							<div class="alert alert-error">
								<p>
									<i class="icon icon-alert icon-red"></i>
									No puede desactivar a este usuario.
								</p>
							</div>

						</div>
						<div class="modal-footer">
							<a id="btn_drop_usuario" href="#" class="btn" data-dismiss="modal">Aceptar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
</div>