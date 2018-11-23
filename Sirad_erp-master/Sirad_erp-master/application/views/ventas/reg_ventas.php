<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Ventas
			<small>Registrar</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>ventas/views/registrar_ventas">Ventas</a>
			</li>
			<li class="active">Registrar</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div id="rootwizard">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li>
								<a href="#tab1" data-toggle="tab">PRODUCTOS</a>
							</li>
							<li>
								<a href="#tab2" data-toggle="tab">DETALLE</a>
							</li>
							<li>
								<a href="#tab3" data-toggle="tab">RESUMEN</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane" id="tab1">
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<div class="input-group">                                            
	                                            <input class="form-control" id="producto" type="text" placeholder="Producto" readonly>
	                                            <div class="btn btn-info btn-flat input-group-addon btn-buscarp">
	                                                <i style="color:white;" class="fa fa-search"></i>
	                                            </div>
											</div>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<div class="input-group">
												<input id="precioventa" type="text" class="form-control" placeholder="Precio Venta">
												<span class="input-group-addon"><i class="fa  fa-usd"></i></span>
											</div>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<div class="input-group">
												<input id="unidadmedida" class="form-control" type="text" placeholder="U.M." readonly >
												<span class="input-group-addon"><i class="glyphicon glyphicon-filter"></i></span>
											</div>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<div class="input-group">
												<input id="cantidad" type="text" class="form-control" placeholder="Cantidad">
												<span id="spandesc" class="input-group-addon"><i class="ion-ios7-information-outline"></i></span>
											</div>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="form-group">
											<button  style="width:100%" id="agregar_producto" type="button" class="btn btn-info btn-flat"> <i class="fa fa-plus"></i>  Agregar Prod. </button>
										</div>
									</div>
								</div>
								<hr>
								<h4>Productos Agregados</h4>
								<hr>
								<table id="select_productos_venta" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Código</th>
											<th>Descripción</th>
											<th>Cantidad</th>
											<th>Precio Venta</th>
										</tr>
									</thead>
									<tbody></tbody>
									<tfoot>
										<tr>
											<td colspan='3'>Total</td>
											<td id='total_contado'>0</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="tab-pane" id="tab2">
								<form id="EnviarVentaForm" class="form-horizontal" action-1="<?php echo base_url();?>ventas/ventas/registrar">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
										    	<label for="cliente" class="col-lg-4 control-label">Cliente</label>
											    <div class="col-lg-8"> 
										    		<div class="input-group">
										    			<input type="hidden" id="cliente_id" name="cliente_id" value="">                                    
			                                            <input class="form-control" id="cliente" type="text" readonly value="">
			                                            <div class="btn btn-info btn-flat input-group-addon btn-buscarc">
			                                                <i class="fa fa-search" style="color:white;"></i>
			                                            </div>
													</div>
												</div> 
										  	</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="forma_pago">Forma de Pago</label>
												<div class="col-lg-8">
													<select class="form-control SelectAjax" name="forma_pago" id="forma_pago" data-source="<?php echo base_url();?>
														administracion/servicios/getConstantesByClase/2" attrval="cConstanteValor" attrdesc="cConstanteDesc">
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="tipo_moneda">Tipo moneda</label>
												<div class="col-lg-8">
													<select class="form-control" name="tipo_moneda" id="tipo_moneda" data-source="<?php echo base_url();?>
														administracion/servicios/getTipoMonedas" attrval="nTipoMoneda" attrdesc="cTipoMonedaDesc">
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="descuento">Venta Descuento</label>
												<div class="col-lg-8">
													<div class="input-group">                                      
			                                            <input class="form-control validate[required,custom[number],min[0],max[100]]" name="descuento" id="descuento" type="text" value="0">
			                                            <div class="input-group-addon">
			                                                %
			                                            </div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="subtotal">Subtotal</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input class="form-control" name="subtotal" id="subtotal" type="text" readonly>
														<div class="input-group-addon">
			                                                 S/.
			                                            </div>
			                                        </div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="tipo_igv">IGV</label>
												<div class="col-lg-8">
													<div class="input-group">                                 
			                                            <select class="form-control" name="tipo_igv" id="tipo_igv" data-source="<?php echo base_url();?>
															administracion/servicios/getTipoIGVActivo" attrval="nTipoIGV" attrdesc="cTipoIGV">
														</select>
			                                            <div class="input-group-addon">
			                                                %
			                                            </div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="total">Total</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input class="form-control" name="total" id="total" type="text" readonly>
														 <div class="input-group-addon">
			                                                S/.
			                                            </div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-lg-4 control-label" for="lblTipoDocumentoContado" id="lblTipoDocumentoContado">Tipo de Documento</label>
												<div class="col-lg-8"> 
													<select class="form-control SelectAjax" name="tipo_doc_contado" id="tipo_doc_contado" data-source="<?php echo base_url();?>
														administracion/servicios/getConstantesByClase/12" attrval="cConstanteValor" attrdesc="cConstanteDesc">
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="lblTipoDocumentoCredito" id="lblTipoDocumentoCredito">Tipo de Documento</label>
												<div class="col-lg-8">
													<select class="form-control SelectAjax" name="tipo_doc_credito" id="tipo_doc_credito" data-source="<?php echo base_url();?>
														administracion/servicios/getConstantesByClase/11" attrval="cConstanteValor" attrdesc="cConstanteDesc">
													</select>
												</div>
											</div>
											<div id="saldo_block" >
												<div class="form-group">
													<label class="col-lg-4 control-label" for="amortizacion">A cuenta</label>
													<div class="col-lg-8">
														<div class="input-group">    
															<input class="form-control focused validate[required,custom[number],min[0]]" name="amortizacion" id="amortizacion" type="text" val="0">
															<div id="spanamort" class="input-group-addon"> S/.</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-4 control-label" for="saldo">Saldo restante</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input class="form-control" name="saldo" id="saldo" type="text" readonly>
															<div class="input-group-addon">
			                                                	S/.
			                                            	</div>
														</div>
													</div>
												</div>
											</div>
											<div id="cuotas_block" >
												<div class="form-group">
													<label class="col-lg-4 control-label" for="num_cuotas">N° Cuotas</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input type="hidden" name="montocuota" id="montocuota">
															<input class="form-control validate[required,custom[integer],min[0]]" name="num_cuotas" id="num_cuotas" type="text">
															<div id="spancouota" class="input-group-addon">x 0.00 S/.</div>
														</div>
													</div>
												</div>
												<div class="form-group">
			                                        <label  class="col-lg-4 control-label" for="prim_cuota">Fecha 1° Cuota</label>
			                                        <div class="col-lg-8">
				                                        <div class="input-group">
				                                            <input type="text" placeholder="dd/mm/aaaa" class="form-control datepicker validate[required,custom[date]]" id="prim_cuota" name="prim_cuota">
				                                            <div class="input-group-addon">
				                                                <i class="fa fa-calendar"></i>
				                                            </div>
				                                        </div>
				                                    </div>
			                                    </div>
											</div>

											<div id="pagocont_block">
												
												<!--<div class="form-group">
													<label class="col-lg-4 control-label" for="importe">Serie - Comprobante</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input id="seriecommp" name="seriecommp" maxlength="12" type="text"class="form-control" readonly>
															<span class="input-group-addon"><i class="fa fa-paste"></i></span>
														</div>
													</div>
												</div>-->
												<div class="form-group">
													<label class="col-lg-4 control-label" for="importe">Importe</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input id="importe" name="importe" maxlength="12" type="text"class="form-control validate[required,custom[number],min[0]">
															<div class="input-group-addon">
			                                                	S/.
			                                            	</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-4 control-label" for="vuelto">Vuelto</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input id="vuelto" type="text" class="form-control" readonly>
															<div class="input-group-addon">
				                                                	S/.
			                                            	</div>
			                                            </div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="producto">Observación</label>
												<div class="col-lg-8">
													<textarea class="form-control" name="observacion" rows="2" value="" placeholder="Observaciones"></textarea>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="tab-pane" id="tab3">
								<!-- Main content -->
				                <section id="resumen_venta" class="content invoice">                    
				                    <!-- title row -->
				                    <div class="row">
				                        <div class="col-xs-12">
				                            <h2 class="page-header">
				                                <i class="fa fa-globe"></i> CLM Developers SAC
				                                <small class="pull-right">Fecha: <?php echo date("d/m/Y"); ?></small>
				                            </h2>                            
				                        </div><!-- /.col -->
				                    </div>
									<!-- info row -->
				                    <div class="row invoice-info">
				                        <div class="col-sm-4 invoice-col">
				                            De
				                            <address>
				                            	<b>RUC:</B> 20559603563<br>
				                                <strong>CLM Developers, SAC.</strong><br>
				                                Bernardo Alcedo 187<br>
				                                Urb. San Fernando, Trujillo<br>
				                                <i class="fa fa-phone"></i> +51 999494821 / +51 044 612874<br/>
				                                <i class="fa fa-envelope"></i> contacto@clmdevelopers.com
				                            </address>
				                        </div><!-- /.col -->
				                        <div class="col-sm-4 invoice-col">
				                            <b>Cliente:</b>
				                            <address>
				                                <strong id="clienteR"></strong><br>
				                                <span id="direccionR"></span><br>
				                            <b>RUC:</b>
					                            <strong id="rucR"></strong><br>
				                             </address>
				                        </div><!-- /.col -->
				                        <div class="col-sm-4 invoice-col">
				                         	<address>
					                                <strong id="tipdocR"></strong><br>
				                            		<strong id="sercomR"></strong><br>
			                                </address>
				                            <b>Fec. Emisión: </b><span id="fechaR"><?php echo date("d/m/Y"); ?></span><br/>
				                        </div><!-- /.col -->
				                    </div><!-- /.row -->
									<!-- TABLA DE PRODUCTOS POR COMPRAR aqui -->
									<!-- Table row -->
				                    <div class="row">
				                        <div class="col-xs-12 table-responsive">
				                            <table id="tabla_resumen_productos" class="table table-striped">
												<thead >
													<tr>
														<th>Código</th>
														<th>Producto</th>
														<th>Cantidad</th>
														<th>Precio</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
									<!-- END TABLA DE PRODUCTOS -->
									<div class="row">
										<div class="col-xs-6 col-lg-6"></div>
										<div class="col-xs-6 col-lg-6">
											<table class="table">
												<tr>
													<td style="width: 50%;">
														<strong>Subtotal</strong>
													</td>
													<td id="subtotalR" style="width: 50%;"></td>
												</tr>
												<tr>
													<td>
														<strong>Descuento</strong>
													</td>
													<td id="descuentoR"></td>
												</tr>
												<tr>
													<td>
														<strong>IGV</strong>
													</td>
													<td id="tipo_igvR"></td>
												</tr>
												<tr>
													<td>
														<strong>Total (S/.)</strong>
													</td>
													<td id="totalR"></td>
												</tr>
												<tr id="resumen_dolares">
													<td>
														<strong>Total ($.)</strong>
													</td>
													<td id="totalDo"></td>
												</tr>
											</table>
											<br>
											<div id="resume-credito">
												<table class="table table-striped table-bordered">
													<tr>
														<td style="width: 50%;">
															<strong>A cuenta</strong>
														</td>
														<td id="amortizacionR" style="width: 50%;"></td>
													</tr>
													<tr>
														<td>
															<strong>Saldo</strong>
														</td>
														<td id="saldoR"></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
						<div class="box box-info">
							<div class="box-body">
								<ul class="pager wizard">
									<li class="previous">
										<a class="btn btn-default" href="javascript:">Atrás</a>

									</li>
									<li class="next">
										<a class="btn btn-default" href="javascript:">Siguiente</a>
									</li>
									<li class="next finish" id="btn-enviar-form" style="display:none;">
										<a class="btn btn-info" href="javascript:;">Registrar</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form id="view_impri" method="POST" target= "_blank">
			</form>
			<div class="modal fade" id="modalBuscarProducto">
				<div class="modal-dialog" style="width:1050px;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							 <h4 class="modal-title"><i class="fa fa-search"></i> Productos</h4>
						</div>
						<div class="modal-body">
							<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>ventas/servicios/getProductosToVenta" style="max-height: 450px;">
								<thead>
									<tr>
										<th>Código</th>
										<th>Producto</th>
										<th>Precio Venta</th>
										<th>Marca</th>
										<th>Categoría</th>
										<th>Tipo</th>
										<th>Unidad Medida</th>
										<th>Oferta</th>
										<th>Stock</th>
									</tr>
								</thead>
								<tbody></tbody>
								<tfoot>
									<tr>
										<th class="input">
											<input type="text" style="width: 75px" value="Codigo" class="search_init" />
										</th>
										<th class="input">
											<input type="text"style="width: 75px" value="Producto" class="search_init" />
										</th>
										<th></th>
										<th class="input">
											<input type="text" style="width: 75px" value="Marca" class="search_init" />
										</th>
										<th class="input">
											<input type="text" style="width: 75px" value="Categoria" class="search_init" />
										</th>
										<th class="input">
											<input type="text" style="width: 75px" value="Tipo" class="search_init" />
										</th>
										<th></th>
										<th class="input">
											<input type="text" style="width: 75px" value="Oferta" class="search_init" />
										</th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="modal-footer clearfix">
							<a href="#" class="btn btn-flat btn-default" data-dismiss="modal">Cancelar</a>
							<a  id="select_producto" href="#" class="btn btn-flat btn-primary">Seleccionar</a>
						</div>
					</div><!-- /.modal-content -->
            	</div><!-- /.modal-dialog -->
			</div>
			<!-- Fin Modal para buscar productos -->
			<div class="modal fade" id="modalBuscarCliente">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><i class="fa fa-search"></i>Clientes</h4>
						</div>
						<div class="modal-body">
							<table id="select_cliente_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>ventas/servicios/getClientes_Empresas">
								<thead>
									<tr>
										<th>Cliente</th>
										<th>RUC</th>
										<th>Telefono</th>
										<th>DNI</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<div class="modal-footer clearfix">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a id="btn-select-cliente" href="#" class="btn btn-primary">Seleccionar</a>
						</div>
					</div><!-- /.modal-content -->
            	</div><!-- /.modal-dialog -->
			</div>
			<div class="modal fade" id="rquiredproducts">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Atención</h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-danger alert-dismissable">
								<p>
									Necesita agregar productos
								</p>
							</div>
						</div>
						<div class="modal-footer clearfix">
							<a href="#" class="btn" data-dismiss="modal">Aceptar</a>
						</div>
					</div><!-- /.modal-content -->
            	</div><!-- /.modal-dialog -->
			</div>

			<div class="modal fade" id="rquiredclients">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Atención</h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-danger alert-dismissable">
								<p>
									Necesita Agregar Clientes
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
	</section>
	<!-- /.content -->
</aside>
<!-- /.right-side -->
</div>
<!-- ./wrapper -->