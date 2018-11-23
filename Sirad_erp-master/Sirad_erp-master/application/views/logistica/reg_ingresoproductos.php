<aside class="right-side">
	<section class="content-header">
		<h1>
			Ingreso de Productos
			<small>Registrar</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica">Logística</a>
			</li>
			<li class="active">Ingreso de Productos</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<form class="form-horizontal" id="IngresoProductosForm" method="post" action-1="<?php echo base_url();?>logistica/ingresoproductos/registrar" >
							<input type="hidden" name="idRegistrado" id="idRegistrado" value="<?php echo $this->session->userdata('trabajador')["nPersonal_id"] ?>
							">
							<input type="hidden" name="idLocal" id="idLocal" value="<?php echo $local["nLocal_id"] ?>
							">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="registrador" class="col-lg-4 control-label">Registrador</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input class="form-control" id="registrador" name="registrador" value="<?php echo $this->session->userdata('trabajador')["cPersonalNom"]." ".$this->session->userdata('trabajador')["cPersonalApe"] ?>" type="text" readonly>
												<span id="spandesc" class="input-group-addon"><i class="fa fa-user"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="tienda" class="col-lg-4 control-label">Tienda</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input class="form-control" id="tienda" name="tienda"  type="text" readonly value="<?php echo $local["cLocalDesc"] ?>">
												<span id="spandesc" class="input-group-addon"><i class="fa fa-home"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="tipo" class="col-lg-4 control-label">Tipo</label>
										<div class="col-lg-8">
											<select id="tipo" name="tipo" class="form-control">
												<option value="1">Compra</option>
												<option value="2">Devolucion</option>
												<option value="3">Otros</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="observaciones" class="col-lg-4 control-label">Observaciones</label>
										<div class="col-lg-8">
											<textarea id="observacion" name="observacion" class="form-control" value=""></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="codigo" class="col-lg-4 control-label">Número Documento</label>
										<div class="col-lg-3">
											<input id="docserie" name="docserie" type="text" class="form-control validate[required] validate[maxSize[4]]" placeholder="Serie">
										</div>
										<div class="col-lg-5">
											<input id="docnumero" name="docnumero" type="text" class="form-control validate[required] validate[maxSize[8]]" placeholder="Numero" >
										</div>
									</div>
									<div class="form-group">
										<label for="fecha" class="col-lg-4 control-label">Fecha</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input class="form-control" name="fecharegistro" id="fecharegistro" type="text" readonly value="<?php echo date("d/m/Y"); ?>">
												<span id="spandesc" class="input-group-addon"><i class="fa fa-calendar"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<hr>
						<h3>Detalle de Ingreso de Productos</h3>
						<hr>
						<div class="form-horizontal">
							<div class="row">
								<div class="col-lg-6" >
									<div class="form-group">
										<label for="codigo" class="col-lg-4 control-label">Orden de Compra</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input id="id_pedido" name="id_pedido" type="hidden">
												<input class="form-control" id="ordped" name="ordped" type="text" readonly>
												<div class="btn btn-info btn-flat input-group-addon" id="btn-reg"> <i class="fa fa-search" style="color:white;"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="importe" class="col-lg-4 control-label">Importe</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input id="imported" name="imported" class="form-control" type="text">
												<span id="spandesc" class="input-group-addon">.00</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label  for="cantidadd" class="col-lg-4 control-label">Cantidad</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input id="cantidadd" name="cantidadd" class="form-control" type="text">
												<span id="spandesc" class="input-group-addon"><i class="ion-ios7-information-outline"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-4 col-lg-offset-8">
											<button id="agregar_detalle" name="agregar_detalle" type="button" class="col-lg-12 btn btn-primary btn-flat"> <i class="icon-plus icon-white"></i>
												Agregar
											</button>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div style="border-left: 1px solid #ddd;">
										<div class="form-group">
											<label for="producto" class="col-lg-4 control-label">Producto</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input class="form-control" id="producto" type="text" readonly>
													<input id="producto_id" name="producto_id" type="hidden">
													<div class="btn btn-info btn-flat input-group-addon btn-buscarp" id="btn-producto"> <i class="fa fa-search" style="color:white;"></i>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="importe" class="col-lg-4 control-label">Importe</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input class="form-control" id="importe" name="importe" type="text">
													<span id="spandesc" class="input-group-addon">.00</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label  class="col-lg-4 control-label" for="cantidad">Cantidad</label>
											<div class="col-lg-8">
												<div class="input-group">	
													<input class="form-control" id="cantidad" type="text">
													<span id="spandesc" class="input-group-addon"><i class="ion-ios7-information-outline"></i></span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-4 col-lg-offset-8">
												<button id="agregar_producto" name="agregar_producto" type="button" class="col-lg-12 btn btn-primary btn-flat"><i class="icon-plus icon-white"></i>Agregar
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<table id="productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>Código</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio Unitario</th>
									<th>Importe S/.</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
						<hr>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url();?>logistica/views/cons_ingresoproductos/" class="btn btn-flat btn-default">
							<i class="icon icon-white icon-arrowthick-w"></i>
							Volver
						</a>
						<button type="button" id="enviar_ingreso_producto" class="btn btn-flat btn-primary" style="float: right;">
							<i class="icon icon-white icon-save"></i>
							Guardar
						</button>
					</div>
				</div>
				<!-----------Modal ORDEN Pedido-------------------->
				<div class="modal fade" id="modalBuscarOrdPed" >
					<div class="modal-dialog" style="width:850px">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Detalles de Orden de Compra</h3>
							</div>
							<div class="modal-body">
								<table id="select_ordped_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/servicios/get_log_ordcompras">
									<thead>
										<tr>
											<th>Codigo</th>
											<th>Producto</th>
											<th>Registrante</th>
											<th >Fecha Registro</th>
											<th>Cantidad</th>
											<th >Importe</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<a id="select_ordped" href="#" class="btn btn-primary">Seleccionar</a>
							</div>
						</div>
					</div>
				</div>
				<!--------------MODAL PRODUCTO------------------------>
				<div class="modal fade" id="modalBuscarProducto" >
					<div class="modal-dialog" style="width:750px;">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Productos</h3>
							</div>
							<div class="modal-body">
								<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/servicios/getProductosLog" >
									<thead>
										<tr>
											<th>Código</th>
											<th>Producto</th>
											<th>Stock</th>
											<th>Pre. Costo</th>
											<th>U.M.</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<a  id="select_producto" href="#" class="btn btn-primary">Seleccionar</a>
							</div>
						</div>
					</div>
				</div>
				<!--MODALS-->
				
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
<!--/fluid-row-->