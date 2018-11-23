<aside class="right-side">
	<section class="content-header">
		<h1>Proveedores<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica">Logística</a>
			</li>
			<li class="active">Proveedores</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Proveedores</small></h3>
						<div class="box-tools pull-right">
                            <button id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="proveedores_table" 
						data-source = "<?php echo base_url();?>logistica/servicios/getProveedor">
							<thead>
								<tr>
									<th>RUC</th>
									<th>Razón Social</th>
									<th>Dirección Fiscal</th>
									<th>Teléfono</th>
									<th>Email</th>
									<th>Estado</th>						
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<!--MODALS-->
					<div class="modal fade" id="modalProveedores">
						<div class="modal-dialog" style="width:1050px;">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Registrar Proveedor</h4>
								</div>
								<form id="ProveedorForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>logistica/proveedores/registrar" action-2="<?php echo base_url();?>logistica/proveedores/editar">
									<div class="modal-body">
										<input id="codigo" name="codigo" type="hidden">
										<fieldset>
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label class="col-lg-4 control-label" for="ruc">RUC</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control focused validate[required,custom[onlyNumberSp]] validate[maxSize[11]] validate[minSize[11]]" id="ruc" name="ruc" type="text" data-prompt-position="topLeft">
																<div class="btn btn-info btn-flat input-group-addon btn-validar">
	                                                				<i class="ion-checkmark" style="color:white;"></i>
	                                            				</div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="razonSocial">Razón Social</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control focused validate[required,custom[onlyLetterNumberSp]]" type="text" id="razonsocial" name="razonsocial" data-prompt-position="topLeft" readonly>
																<span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
															</div>	
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="cuenta">Cuenta Corriente</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control focused validate[required,custom[onlyNumberSp]]" id="ccorriente" name="ccorriente" type="text" maxlength="20" data-prompt-position="topLeft">
																<span class="input-group-addon"><i class="fa  fa-credit-card"></i></span>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="direccion">Dirección</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control focused validate[required]" id="direccion" name="direccion" type="text" data-prompt-position="topLeft">
																<span class="input-group-addon"><i class="ion-home"></i></span>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="telefono">Teléfono</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control focused validate[required,custom[onlyNumberSp]] validate[maxSize[9]] " placeholder="999999999" id="telefono" name="telefono" type="text" data-prompt-position="topLeft">
																<span class="input-group-addon"><i class="fa fa-phone"></i></span>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="email">Email</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control focused validate[required,custom[email]]"  id="email" name="email" type="email" data-prompt-position="topLeft">
																<span class="input-group-addon"><i class="fa  fa-envelope"></i></span>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="paginaweb">Página Web</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control focused" id="paginaweb" name="paginaweb" type="text">
																<span class="input-group-addon"><i class="fa fa-globe"></i></span>
															</div>
														</div>
													</div>
												</div>
												<!---->
												<div class="col-lg-6">
													<div class="form-group">
														<label class="col-lg-4 control-label" for="paginaweb">Dirección Fiscal</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control focused" id="dirfiscal" name="dirfiscal" type="text" readonly>
																<span class="input-group-addon"><i class="ion-home"></i></span>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="comprobate">Comprobante de Pago</label>
														<div class="col-lg-8">															
																<select id="comprobantePago" class="form-control SelectAjax" name="comprobantePago" data-source="<?php echo base_url();?>administracion/servicios/getConstantesByClase/7" attrval="cConstanteValor" attrdesc="cConstanteDesc"></select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="paginaweb">Fecha Inscripción</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control datepicker validate[required]" id="fecInscripcion" name="fecInscripcion" type="text">
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="inicioActividades">Inicio de Actividades</label>
														<div class="col-lg-8">
															<div class="input-group">
																<input class="form-control datepicker validate[required]" id="inicioActividades" name="inicioActividades" type="text">
																<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="tipContribuyente">Tipo de Contribuyente</label>
														<div class="col-lg-8">
															<select id="tipContribuyente" class="form-control SelectAjax" name="tipContribuyente" data-source="<?php echo base_url();?>administracion/servicios/getConstantesByClase/10" attrval="cConstanteValor" attrdesc="cConstanteDesc"></select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="estado">Estado</label>
														<div class="col-lg-8">															
															<select id="selectEstado validate[required]" name="selectEstado" class="form-control" >
																<option value="1">Activo</option>
																<option value="0">Inactivo</option>
															</select>														
														</div>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-flat btn-default btn-cancelarprov" data-dismiss="modal">Cancelar</button>
										<button id="btn-reg-proveedor" type="button" class="btn btn-flat btn-primary ">Registrar</button>
										<button id="btn-editar-proveedor" type="button" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
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