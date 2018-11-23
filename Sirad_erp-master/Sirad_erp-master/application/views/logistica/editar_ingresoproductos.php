<aside class="right-side">
	<section class="content-header">
		<h1>Ingreso de Productos <small> Editar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>administracion/">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/">Logistica</a>
			</li>
			<li class="active">Ingreso de Productos</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<form id="RegistrarIngresoForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>logistica/ingresoproductos/editar">
							<fieldset>
							<div class="row-fluid">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-lg-4 control-label" for="codigo">Número Ingreso</label>
										<div class="col-lg-8">
											<span class="help-inline" style="margin-top:5px;"><?php echo $cIngProdSerie." - ".$cIngProdNro;?></span>
											<input type="hidden" id="idingprod" name="idingprod" value="<?php echo $nIngProd_id;?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="registrador">Registrador</label>
										<div class="col-lg-8">
											<span class="help-inline" style="margin-top:5px;"><?php echo $nomape;?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="tipo">Motivo</label>
										<div class="col-lg-6">
											<select id="tipo" name="tipo" class="form-control">
												<option value="1">Devolución</option>
												<option value="2">Pedido Almacén</option>
												<option value="3">Otro</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="tienda">Tienda</label>
										<div class="col-lg-8">
											<span class="help-inline" style="margin-top:5px;"><?php echo $cLocalDesc;?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="observaciones">Observaciones</label>
										<div class="col-lg-8">
											<textarea id="observacion" name="observacion" class="form-control" style="width:245px; height:80px;"><?php echo $cIngProdObsv ?></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-lg-4 control-label" for="fecha">Fecha</label>
										<div class="col-lg-8">
											<span class="help-inline" style="margin-top:5px;"><?php echo $dIngProdFecReg;?></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="solicitante">Número Documento</label>
										<div class="col-lg-3">
											<input id="docserie" name="docserie" type="text" class="form-control validate[required] validate[maxSize[4]]" placeholder="Serie" value="<?php echo $cIngProdDocSerie; ?>">
										</div>
										<div class="col-lg-5">
											<input id="docnumero" name="docnumero" type="text" class="form-control validate[required] validate[maxSize[8]]" placeholder="Numero" value="<?php echo $cIngProdDocNro; ?>">
										</div>										
									</div>
								</div>							
							</div>
							</fieldset>
						</form>
				<!--<form id="AgregarProductoForm" class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="producto">Producto</label>
						<div class="controls">
							<input type="hidden" id="idProducto" name="idProducto">
							<input class="input-xlarge focused validate[required]" id="producto" name="producto" disabled type="text">
							<button id="btn-buscar-productos" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
								Buscar
							</button>
							<label style="display:inline;" for="cantidad">Cantidad</label>
							<input class="validate[required,custom[onlyNumberSp]]" id="cantidad" name="cantidad" type="number" min=1 style="margin: 0 18px 0 0;">
							<label style="display:inline;">Precio/Unidad</label>
							<input class="validate[required,custom[onlyNumberSp]]" id="precio_uni" name="precio_uni" type="number" min=0 style="margin: 0 18px;">
							<button id="agregar_producto" type="submit" class="btn btn-primary"> <i class="icon-plus icon-white"></i>
								Agregar
							</button>
						</div>
					</div>
				</form>-->
				<hr>
				<h3>Detalle de Ingreso de Productos</h3>
				<hr>
				<div class="form-horizontal">
						<div class="row">
							<div class="col-lg-6" >
								<div class="form-group">
									<label for="codigo" class="col-lg-4 control-label">Pedido</label>
									<div class="col-lg-8">
										<div class="input-group">
											<input id="id_pedido" name="id_pedido" type="hidden">
											<input class="form-control" id="ordped" name="ordped" type="text" readonly>
											<div class="btn btn-info btn-flat input-group-addon" id="btn-buscar"> <i class="fa fa-search"></i>
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
												<input id="idProducto" name="idProducto" type="hidden">
												<div class="btn btn-info btn-flat input-group-addon btn-buscarp" id="btn-buscar-productos"> <i class="fa fa-search"></i>
												</div>
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
										<label for="importe" class="col-lg-4 control-label">Precio/Unidad</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input class="form-control" id="precio_uni" name="precio_uni" type="text">
												<span id="spandesc" class="input-group-addon">.00</span>
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
				<div class="box-body table-responsive">
					<table id="edit_ingresoproductos_table" name="edit_ingresoproductos_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url()."logistica/servicios/get_log_detingprod/".$nIngProd_id;?>">
						<thead>
							<tr>
								<th>Código Producto</th>
								<th>Cantidad</th>
								<th>Precio Unit</th>
								<th>Total</th>
								<th>Estado</th>
								
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<br/></br>
				<div class="box-footer">
					<a href="<?php echo base_url();?>logistica/views/cons_ingresoproductos/" type="reset" class="btn btn-success btn-cancelar" >
						<i class="icon icon-white icon-arrowthick-w"></i>
						Volver
					</a>
					<button id="btn_enviar_cambios" type="button" class="btn btn-primary" style="float: right;">
						<i class="icon icon-white icon-save"></i>
						Guardar
					</button>
				</div>
			</div>
					<!--MODALS-->
					<div class="modal fade" id="modalBuscarOrdPed" >
					<div class="modal-dialog" style="width:950px">
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
					<div class="modal fade" id="modalBuscarProducto">
						<div class="modal-dialog" style="width:750px;">
							<div class="modal-content">
								<div class="modal-header">
									<h3>Productos</h3>
								</div>
								<div class="modal-body">
									<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>logistica/servicios/getProductos">
										<thead>
											<tr>
												<th>Codigo</th>
												<th>Producto</th>
												<th>Stock</th>
												<th>Pre. Costo</th>
												<th>U.M.</th>
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
					
				</div>
			</div>
		</div>
	</section>
</aside>
</div>
<!--/fluid-row-->