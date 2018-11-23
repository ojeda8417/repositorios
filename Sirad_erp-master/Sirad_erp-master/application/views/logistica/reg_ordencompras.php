<aside class="right-side">
	<section class="content-header">
		<h1>Orden de Compras<small>Registrar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica">Logística</a>
			</li>
			<li class="active">Orden de Compras</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<form id="RegistrarOrdenCompraForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>logistica/ordencompras/registrar">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="registrador" class="col-lg-4 control-label">Registrador</label>
											<div class="col-lg-8">												
													<input class="form-control" type="hidden" id="id_registrador" name="id_registrador" value="<?php echo $this->session->userdata('trabajador')["nPersonal_id"] ?>">
													<input class="form-control" readonly type="text" id="registrador" name="registrador" value="<?php echo $this->session->userdata('trabajador')["cPersonalNom"]." ".$this->session->userdata('trabajador')["cPersonalApe"] ?>">
											</div>
										</div>
										<div class="form-group">
											<label for="proveedor" class="col-lg-4 control-label">Proveedor</label> 
											<div class="col-lg-8">										
												<div class="input-group">	
													<input class="form-control" id="proveedor" type="text" placeholder="Proveedor" readonly>
		                                            <div class="btn btn-info btn-flat input-group-addon" id="btn-reg">
		                                                <i class="fa fa-search" style="color:white;"></i>
		                                            </div>
													<input id="proveedor_id" class="form-control" name="proveedor_id" type="hidden">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="observaciones" class="col-lg-4 control-label">Observaciones</label>
											<div class="col-lg-8">										
													<textarea id="observaciones" name="observaciones" class="form-control" rows="3">
													</textarea>	
											</div>
										</div>
										<div class="form-group">
												<label class="col-lg-4 control-label" for="tipo">Tipo Documento</label>
												<div class="col-lg-8">
													<select id="tipdoc" class="form-control SelectAjax" name="tipdoc" data-source="<?php echo base_url();?>administracion/servicios/getConstantesByClase/7" attrval="cConstanteValor" attrdesc="cConstanteDesc"></select>
												</div>
										</div>
										<div class="form-group">
											<label for="docserie" class="col-lg-4 control-label">Documento Serie</label>
											<div class="col-lg-8">
												<div class="input-group">										
													<input class="form-control focused validate[required,custom[onlyNumberSp]]" id="doc_serie" name="doc_serie" type="text" >
													<span class="input-group-addon"><i class="ion-document"></i></span>
												</div>		
											</div>
										</div>
										<div class="form-group">
											<label for="docnumero" class="col-lg-4 control-label">Documento Número</label>
											<div class="col-lg-8">
												<div class="input-group">											
													<input class="form-control focused validate[required,custom[onlyNumberSp]]" id="doc_numero" name="doc_numero" type="text">
													<span class="input-group-addon"><i class="ion-document"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-lg-4 control-label" for="amortizacion">Subtotal</label>
											<div class="col-lg-8">
												<input class="form-control" id="subtotal" name="subtotal" min="0" type="" readonly value="0">
											</div>
										</div>	
										<div class="form-group">
											<label class="col-lg-4 control-label" for="amortizacion">Descuento</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input class="form-control" id="descuento" name="descuento" type="number" step="0.10" value="0" min="0">
													<span id="spandesc" class="input-group-addon">%</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="amortizacion">IGV</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input name="igv" id="igv" type="number"class="form-control" value="18.0" step="0.10" min="0">
													<span class="input-group-addon">%</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="amortizacion">Total</label>
											<div class="col-lg-8">
												<input class="form-control" id="total" name="total" type="" readonly value="0">
											</div>
										</div>
									</div>
								</div>
							</form>
							<hr>
							<h3>Detalle Orden de Compra</h3>
							<hr>
							<div class="form-horizontal">	
								<div class="row">
									<div class="col-lg-6">						
										<div class="form-group">
											<label class="col-lg-4 control-label" for="amortizacion">Producto</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input class="form-control" id="producto" type="text" placeholder="Producto" readonly>
			                                        <div class="btn btn-info btn-flat input-group-addon" id="btn-reg-producto">
			                                            <i class="fa fa-search" style="color:white;"></i>
			                                        </div>
													<input id="producto_id" name="producto_id" type="hidden">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="amortizacion">Importe</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input id="importe" name="importe" type="number" class="form-control">
													<span id="spandesc" class="input-group-addon">.00</span>
												</div>
											</div>
										</div>
										<div class="form-group">		
											<label class="col-lg-4 control-label" for="amortizacion"> <strong>Cantidad</strong></label>
											<div class="col-lg-8">
												<div class="input-group">
													<input id="cantidad" type="number" class="form-control"  min="1">
													<span id="spandesc" class="input-group-addon"><i class="ion-ios7-information-outline"></i></span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-8 col-lg-offset-4">
												<div class="input-group ">
													<button id="agregar_producto" name="agregar_producto" type="button" class="btn btn-flat btn-primary">
														<i class="icon-plus icon-white"></i>Agregar
													</button>
												</div>
											</div>
										</div>		
									</div>
								</div>
							</div>
						</div>
						<div class="box-body table-responsive">
							<table id="productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>Código</th>
										<th>Producto</th>
										<th>Cantidad</th>
										<th>Precio Unitario</th>
										<th>Importe S/.</th>
										<th>Fecha de registro</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="box-footer" style="padding-left: 17px;">
							<a href="<?php echo base_url();?>logistica/views/cons_ordencompra/" type="reset" class="btn btn-flat btn-default btn-cancelar" >
								<i class="icon icon-white icon-arrowthick-w"></i>
								Volver
							</a>
							<button id="btn_enviar_ordcom" type="submit" class="btn btn-flat btn-primary" style="float: right;">
								<i class="icon icon-white icon-save"></i>
								Guardar
							</button>
						</div>
					</div>
			</div>	
			<!-------------MODAL PROVEEDOR------------------>
			<div class="modal fade" id="modalBuscarProveedor">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3>Proveedores</h3>
						</div>
						<div class="modal-body">
							<table id="select_proveedor_table" class="table table-striped table-bordered bootstrap-datatable datatable"
							data-source="<?php echo base_url();?>logistica/servicios/getProveedor">
								<thead>
									<tr>
										<th>Código</th>
										<th>Razón Social</th>
										<th>RUC</th>
										<th>Teléfono</th>
									</tr>
								</thead>
								<tbody>	
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a id="select_proveedor" href="#" class="btn btn-primary">Seleccionar</a>
						</div>
					</div>
				</div>
			</div>
			<!-----------Modal ORDEN Pedido-------------------->
			<div class="modal hide fade" id="modalBuscarOrdPed" style="width: 650px;">
				<div class="modal-header">
					<h3>Detalles de Pedido</h3>
				</div>
				<div class="modal-body">
					<table id="select_ordped_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/servicios/getOrdenPedido">
						<thead>

							<tr>
								<th rowspan="2">Producto</th>
								<th rowspan="2">Registrante</th>
								<th colspan="3">Cantidad</th>

								<th rowspan="2">Fecha Registro</th>
								<th rowspan="2">BarCode</th>
							</tr>
							<tr>
								<th>Ped.</th>
								<th>Acep.</th>
								<th>Faltan</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
					<a id="select_ordped" href="#" class="btn btn-primary">Seleccionar</a>
				</div>					
			</div>
			<!--------------MODAL PRODUCTO------------------------>
			<div class="modal fade" id="modalBuscarProducto">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3>Productos</h3>
						</div>
						<div class="modal-body">
							<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/servicios/getProductos" >
								<thead>
									<tr>
										<th>Código</th>
										<th>Producto</th>
										<th>Stock</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a  id="select_producto" href="#" class="btn btn-primary">Seleccionar</a>
						</div>	
					</div>
				</div>					
			</div>
			<!--</form>-->
			<div class="modal hide fade" id="modalEditarCantidad" >
				<div class="modal-header">
					<h3>Datos del Producto</h3>
				</div>
				<div class="modal-body">
					<form id="EditarCantidadForm" class="form-horizontal">
						<div class="control-group">
							<label class="control-label" for="selectEstado">Producto</label>
							<div class="controls">
								<span class="help-inline" style="padding-top:5px;">Producto 1</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="selectEstado">Precio</label>
							<div class="controls">
								<input id="pordcomE" type="number" step="0.01" min="1" style="margin: 0 18px 0 0;" ></div>
						</div>
						<div class="control-group">
							<label class="control-label" for="selectEstado">Cantidad</label>
							<div class="controls">
								<input id="cantidadE" type="number" step="0.01" min="1" style="margin: 0 18px 0 0;" ></div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
					<a  id="" href="#" class="btn btn-primary btn-guardar">Guardar</a>
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
									Necesitas agregar un Pedido o Producto
								</p>
							</div>
						</div>
						<div class="modal-footer clearfix">
							<a href="#" class="btn" data-dismiss="modal">Aceptar</a>
						</div>
					</div><!-- /.modal-content -->
            	</div><!-- /.modal-dialog -->
			</div>
			<div class="modal fade" id="agregarproveedor">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Atención! </h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-danger alert-dismissable">
								<p>
									Necesitas agregar un Proveedor
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
		</div>
	</section>
</aside>
</div>