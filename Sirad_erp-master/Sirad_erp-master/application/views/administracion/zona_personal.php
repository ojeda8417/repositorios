<aside class="right-side">
	<section class="content-header">
		<h1>Zona Personal<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion">Administracion</a>
			</li>
			<li class="active">Zona Personal</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<form id="ZonapersonalForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>administracion/zona_personal/registrar" action-2="<?php echo base_url();?>administracion/zona_personal/editar" action-3="<?php echo base_url();?>administracion/zona_personal/eliminar"data-source="<?php echo base_url();?>administracion/servicios/getUbigeo">
							<input type="hidden" id="idZonapersonal" name="idZonapersonal">
								<fieldset>
									<div class="box-content">
										<div class="col-lg-4 col-lg-offset-4" >
											<div class="form-group">										
												<div class="input-group">
													<input class="form-control" id="nombre_trabajador" type="text" placeholder="Trabajador" readonly>
		                                            <div class="btn btn-info btn-flat input-group-addon btn-trabajador">
		                                                <i class="fa fa-search"></i>
		                                            </div>
													<input id="id_trabajador" name="id_trabajador" type="hidden">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<input class="form-control" id="nombre_zona" type="text" readonly placeholder="Zona">
													<div class="btn btn-info btn-flat input-group-addon btn-zona">
		                                                <i class="fa fa-search"></i>
		                                            </div>
													<input id="id_zona" name="id_zona" type="hidden">
												</div>
											</div>
											<br/>
											<div class="form-actions  col-lg-offset-3">
												<button id="btn-reg-usuario" type="button" class="btn btn-primary ">Asignar</button>
												<button id="btn-editar-zona" type="button" class="btn btn-primary " style="display:none">Editar</button>
												<button type="reset" class="btn" id="btn-cancelar">Cancelar</button>
												<button id="btn-eliminar" type="button" class="btn btn-primary " style="display:none">Eliminar</button>
												<button type="reset" class="btn" id="btn-regreso" style="display:none">Cancelar</button>
											</div>
										</div>
									</div>
									
								</fieldset>
							</form>
						</div>
						<div class="box-body table-responsive">
							<table class="table table-striped table-bordered bootstrap-datatable datatable" id="zonapersonal_table" data-source="<?php echo base_url();?>
								administracion/servicios/getZonasPersonal">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Encargado</th>
										<th>Ubigeo</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<!--MODALS-->
						<div class="modal fade" id="modalEliminar">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Eliminar</h4>
									</div>
									<form id="eliminarForm" class="form-horizontal" method="post" action="">
										<div class="modal-body">
											<input id="zonaper_id" name="zonaper_id" type="hidden" required>
											<div class="alert alert-danger alert-dismissable">
												¿Desea realmente <strong>Eliminar</strong>
												este registro?
											</div>
										</div>
										<div class="modal-footer">
											<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
											<a  id="btn-eliminar-todo" href="#" class="btn btn-primary">Eliminar</a>
										</div>
									</form>
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
										<table id="select_trabajador_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>administracion/servicios/get_trabajadores_sinzona">
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
										<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
										<a  id="select_trabajador" href="#" class="btn btn-primary">Seleccionar</a>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="modalBuscarZona">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Zonas<h4 class="modal-title">
									</div>
									<div class="modal-body">
										<table id="select_zona_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>administracion/servicios/get_zonas_activos">
											<thead>
												<tr>
													<th>Nombre</th>
													<th>Ubigeo</th>
												</tr>
											</thead>
											<tbody></tbody>
											<tfoot>
												<tr>
													<th class="input">
														<input type="text" style="width: auto" value="nombre" class="search_init" />
													</th>
													<th class="input">
														<input type="text"style="width: auto" value="ubigeo" class="search_init" />
													</th>
												</tr>
											</tfoot>
										</table>
									</div>
									<div class="modal-footer">
										<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
										<a id="select_zona" href="#" class="btn btn-primary">Seleccionar</a>
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
