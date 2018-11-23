<aside class="right-side">
	<section class="content-header">
		<h1>
			SALIDA DE PRODUCTOS: REGISTRAR
			<small>Registrar</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>administracion/">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/">Logística</a>
			</li>
			<li class="active">Salida de Productos</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<form id="RegistrarSalidaForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>logistica/salidaproductos/registrar">
							<input type="hidden" name="idRegistrado" id="idRegistrado" value="<?php echo $this->session->userdata('trabajador')["nPersonal_id"];?>">
							<input type="hidden" name="idLocal" id="idLocal" value="<?php echo $local["nLocal_id"] ?>
							">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-lg-4 control-label" for="registrador">Registrador</label>
										<div class="col-lg-8">
											<input id="registrador_id" name="registrador_id" type="hidden" value="<?php echo $this->session->userdata('trabajador')["nPersonal_id"] ?>">
											<div class="input-group">												
												<input class="form-control" id="registrador" name="registrador" type="text" readonly value="<?php echo $this->session->userdata('trabajador')["cPersonalNom"]." ".$this->session->userdata('trabajador')["cPersonalApe"] ?>">
												<span id="spandesc" class="input-group-addon"><i class="fa fa-user"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="motivo">Motivo</label>
										<div class="col-lg-8">
											<select class="form-control validate[required]" id="motivo" name="motivo">
												<option value="1">Traslado</option>
												<option value="2">Para Tienda</option>
												<option value="3">Otros</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="tienda">Tienda</label>
										<div class="col-lg-8">
											<input id="tienda_id" name="tienda_id" type="hidden" value="<?php echo $local["nLocal_id"] ?>">
											<div class="input-group">
												<input class="form-control" id="tienda" name="tienda" type="text" readonly value="<?php echo $local["cLocalDesc"] ?>">
												<span id="spandesc" class="input-group-addon"><i class="fa  fa-home"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-lg-4 control-label" for="fecha">Fecha</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input class="form-control validate[required]" id="fecha" name="fecha" type="text" readonly value="<?php echo date("d/m/y"); ?>">
												<span id="spandesc" class="input-group-addon"><i class="fa  fa-calendar"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="solicitante">Solicitante</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input class="form-control validate[required]" id="solicitante" name="solicitante" type="text" readonly data-prompt-position="topLeft">
												<input id="solicitante_id" name="solicitante_id" type="hidden"  >
												<div id="btn-buscar-trabajador" class="btn btn-info btn-flat input-group-addon btn-solicitante">
	                                                <i class="fa fa-search" style="color:white;"></i>
	                                            </div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="observaciones">Observaciones</label>
										<div class="col-lg-8">
											<textarea id="observaciones" name="observaciones" class="form-control validate[required]"></textarea>
										</div>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<h3>Detalle Salida Productos</h3>
						<hr>
						<form id="AgregarProductoForm" class="form-horizontal">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-lg-4 control-label" for="producto">Producto</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input id="producto_id" name="producto_id" type="hidden">
												<input class="form-control validate[required]" id="producto" name="producto" type="text" readonly>
												<div id="btn-productos" class="btn btn-info btn-flat input-group-addon btn-buscarp">
	                                                <i class="fa fa-search" style="color:white;"></i>
	                                            </div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-lg-3 control-label" for="cantidad">Cantidad</label>
										<div class="col-lg-3">
											<div class="input-group">
												<input class="form-control validate[required,custom[onlyNumberSp]]" id="cantidad" name="cantidad" type="text" min=1 style="margin: 0 18px 0 0;" data-prompt-position="topLeft">
												<span id="spandesc" class="input-group-addon"><i class="ion-ios7-information-outline"></i></span>
											</div>
										</div>
										<div class="col-lg-6">
											<button type="submit" class="btn btn-flat btn-primary col-lg-12" id="btn-agregar-detalle" name="btn-agregar-detalle">
											<i class="icon-plus icon-white"></i>
											Agregar
											</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<table id="salida_productos_table" name="salida_productos_table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nombre</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url();?>logistica/views/cons_salidaproductos/" class="btn btn-flat btn-default"> <i class="icon icon-white icon-arrowthick-w"></i>
							Volver
						</a>
						<button id="enviar_salida_producto" type="button" class="btn btn-flat btn-primary" style="float: right;">
							<i class="icon icon-white icon-save"></i>
							Guardar
						</button>
					</div>
				</div>

				<!--MODAL PRODUCTOS-->
				<div class="modal fade" id="modalBuscarProducto">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Productos</h3>
							</div>
							<div class="modal-body">
								<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/servicios/getProductosLog">
									<thead>
										<tr>
											<th>Producto</th>
											<th>Stock</th>
											<th>Pre. Costo</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn btn-flat btn-default" data-dismiss="modal">Cancelar</a>
								<a  id="select_producto" href="#" class="btn btn-flat btn-primary">Seleccionar</a>
							</div>
						</div>
					</div>
				</div>
					
				<!--Modal TRABAJADOR-->
				<div class="modal fade" id="modalBuscarTrabajador">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Trabajadores</h3>
							</div>
							<div class="modal-body">
								<table id="select_trabajador_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/servicios/get_trabajadores_activos">
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
				
				<div class="modal fade" id="agregarproductos">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Atención! </h4>
							</div>
							<div class="modal-body">
								<div class="alert alert-danger alert-dismissable">
									<p>
										Necesitas agregar Productos
									</p>
								</div>
							</div>
							<div class="modal-footer clearfix">
								<a href="#" class="btn" data-dismiss="modal">Aceptar</a>
							</div>
						</div><!-- /.modal-content -->
	            	</div><!-- /.modal-dialog -->
				</div>

			</div>
		</div>
	</section>
</aside>
</div>