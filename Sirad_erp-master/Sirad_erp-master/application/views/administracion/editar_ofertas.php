<aside class="right-side">
	<section class="content-header">
		<h1>Ofertas<small>Editar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/views/ofertas">Ofertas</a>
			</li>
			<li class="active">Editar</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<form id="OfertasForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/ofertas/editar">
							<input type="hidden" name="idOferta" value="<?php echo $nOferta_id;?>">
							<div class="form-group">
								<label class="col-lg-4 control-label" for="fecInicio">Fecha de Inicio</label>
								<div class="col-lg-3">
									<div class="input-group">
										<input type="text" class="form-control datepicker validate[required,custom[date]]" name="fecha_ini" id="fecha_ini" value="<?php echo $dOfertaFecVigente ?>">
										<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label" for="fecFin">Fecha de Vencimiento</label>
								<div class="col-lg-3">
									<div class="input-group">
										<input type="text" class="form-control datepicker validate[required,custom[date]]" id="fecha_fin" name="fecha_fin" value="<?php echo $dOfertaFecVencto ?>">
										<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label" for="descripcion">Descripción</label>
								<div class="col-lg-3">
									<textarea class="form-control validate[required]" name="descripcion" maxlength="200" id="descripcion" rows="2" cols=""><?php echo $cOfertaDesc ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label" for="descuento">Venta Descuento</label>
								<div class="col-lg-3">
									<div class="input-group">
										<input class="form-control focused validate[required,custom[onlyNumberSp]]" name="descuento" id="descuento" type="text" value="<?php echo $nOfertaPorc ?>">
										<span class="input-group-addon">%</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-3 col-lg-offset-4" >
									<button type="button" id="btn-buscarproducto" class="btn btn-info btn-buscarp" style="margin: 0 0;"> <i class="icon-search icon-white"></i>
										Buscar Productos
									</button>
								</div>
							</div>
						</form>					
						<div class="box-body table-responsive">
							<h3>Productos de la Oferta</h3>
							<hr>
							<table id="oferta_productos_table" name="oferta_productos_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url()."administracion/servicios/getProductosByOferta/".$nOferta_id; ?>">
								<thead>
									<tr>
										<th>Código</th>
										<th>Producto</th>
										<th>P.Costo/P.Cont/P.Cred</th>
										<th>Marca</th>
										<th>Tipo</th>
										<th>Categoría</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url();?>administracion/views/ofertas/" type="reset" class="btn btn-success btn-cancelar" >
							<i class="icon icon-white icon-arrowthick-w"></i>
							Cancelar
						</a>
						<button id="enviar_editar" type="button" class="btn btn-primary" style="float: right;"> <i class="icon icon-white icon-save"></i>
							Guardar
						</button>
					</div>
				</div>	
			<!--MODALS-->
				<div class="modal fade" id="modalBuscarProducto">
					<div class="modal-dialog" style="width:750px;">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Agregar Producto</h4>
								</div>
								<div class="form-horizontal" >
									<div  class="modal-body">
										<fieldset>
											<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>administracion/servicios/getProductoSinOferta">
												<thead>
													<tr>
														<th>Código</th>
														<th>Producto</th>
														<th>P.Costo/P.Cont/P.Cred</th>
														<th>Marca</th>
														<th>Tipo</th>
														<th>Categoría</th>
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
														<th class="input">
															<input type="text" style="width: 75px" value="Precio" class="search_init" />
														</th>
														<th class="input">
															<input type="text" style="width: 75px" value="Marca" class="search_init" />
														</th>
														<th class="input">
															<input type="text" style="width: 75px" value="Tipo" class="search_init" />
														</th>
														<th class="input">
															<input type="text" style="width: 75px" value="Categoria" class="search_init" />
														</th>
													</tr>
												</tfoot>
											</table>
										</fieldset>
									</div>
									<div class="modal-footer">
										<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
										<input id="btn_agregar_prod" type="button" value="Agregar" class="btn btn-primary"></div>
								</div>
							</div>
						</div>
					</div>
				
			</div>
		</div>
	</section>	
</aside>
</div>
