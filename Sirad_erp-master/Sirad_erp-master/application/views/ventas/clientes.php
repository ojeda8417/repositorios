<aside class="right-side">
	<section class="content-header">
		<h1>
			Clientes
			<small>Consultar</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>ventas">Ventas</a>
			</li>
			<li class="active">Clientes</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Clientes</small></h3>
						<div class="box-tools pull-right">
							<input id="pdfgen" type="button" value="Reporte General" class="btn btn-flat btn-success" />
							<!--<a id="pdfgen" type="button" class="btn btn-flat btn-success"/><i class="fa fa-file-text-o"></i> Reporte General</a>-->
							<button class="btn btn-default btn-flat btn-registrar"> <i class="glyphicon glyphicon-plus"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="clientes_table" data-source="<?php echo base_url();?>ventas/servicios/getclientes">
							<thead>
								<tr>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>DNI</th>
									<th>Teléfono</th>
								</tr>
							</thead>
							<tbody>
								<tr></tr>
							</tbody>
						</table>
						<h3 class="box-title">Lista <small>de Empresas</small></h3>
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="empresa_table" data-source="<?php echo base_url();?>ventas/servicios/getClientes_byEmpresa">
							<thead>
								<tr>
									<th>RUC</th>
									<th>Razón Social</th>
									<th>Dirección Fiscal</th>
									<th>Tipo de Contribuyente</th>
								</tr>
							</thead>
							<tbody>
								<tr></tr>
							</tbody>
						</table>
						<div class="modal fade" id="modalClientes">
							<div class="modal-dialog" style="width:1050px;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>										
										<h4 id='regClien'>Registrar Cliente<h4>
										<h4 id='editClien'>Editar Cliente<h4>	
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="form-group">
												<label id="tipCliente" class="col-lg-2 col-lg-offset-3 control-label" for="tipo_cliente">TIPO DE CLIENTE</label>
												<div class="col-lg-4">
											  		<select id="tipo_cliente" name="tipo_cliente" class="form-control" >
														<option value="1" selected="selected">Cliente</option>
														<option value="2">Empresa</option>
													</select>
												</div>
										  	</div>
										</div>
									  	<div id="form_cliente">										
											<form id="ClienteForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>ventas/clientes/registrar" action-2="<?php echo base_url();?>ventas/clientes/editar" data-source="<?php echo base_url();?>administracion/servicios/getUbigeo">
												<input type="hidden" id="idClientes" name="idClientes">
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label class="col-lg-3 control-label" for="ruc">RUC</label>
																<div class="col-lg-8">
																	<div class="input-group">
																		<input class="form-control focused" id="ruc" name="ruc" type="text" data-prompt-position="topLeft">
																		<div class="btn btn-info btn-flat input-group-addon" id="btn_validar_cliente">
				                                            				<i class="ion-checkmark" style="color:white;"></i>
				                                        				</div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="nombres">Nombres</label>
																<div class="col-lg-8">												
																	<div class="input-group">
																		<input class="form-control validate[required,custom[onlyLetterSp]]" maxlength="50" id="nombres" name="nombres" class="focusedInput" type="text" data-prompt-position="topLeft">
																		<span class="input-group-addon"><i class="fa fa-user"></i></span>
																	</div>													
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="apellidos">Apellidos</label>
																<div class="col-lg-8">													
																	<div class="input-group">
																		<input class="form-control validate[required,custom[onlyLetterSp]]" maxlength="50" id="apellidos" name="apellidos" class="focusedInput" type="text" data-prompt-position="topLeft">
																		<span class="input-group-addon"><i class="fa fa-user"></i></span>
																	</div>													
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="dni">DNI</label>
																<div class="col-lg-8">													
																	<div class="input-group">
																		<input class="form-control validate[required,custom[onlyNumberSp]] validate[minSize[8]] validate[maxSize[8]]" id="dni" name="dni" type="text" data-prompt-position="topLeft">
																		<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
																	</div>													
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="telefono">Teléfono</label>
																<div class="col-lg-8">
																	<div class="input-group">
																	  <input class="form-control focused validate[required,custom[number]]" placeholder="999999999"  maxlength="12" id="telefono" name="telefono" type="text" data-prompt-position="topLeft">
																	  <div class="input-group-addon"><i class="fa fa-phone"></i></div> 	
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<label class="col-lg-3 control-label" for="refRUC"></label>
																<div class="col-lg-8">
																	<div class="input-group">
																		<input class="form-control" value=" " maxlength="200" id="refRUC" name="refRUC" type="text" readonly>
																		<span class="input-group-addon"><i class="fa fa-user"></i></span>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="direccion">Dirección</label>
																<div class="col-lg-8">
																	<div class="input-group">
																		<input class="form-control validate[required]" maxlength="200" id="direccion"name="direccion" type="text" data-prompt-position="topLeft">
																		<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
																	</div>													
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="referencia">Referencia</label>
																<div class="col-lg-8">
																	<div class="input-group">
																		<input class="form-control" value=" " maxlength="200" id="referencia" name="referencia" type="text" >
																		<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="ocupacion">Ocupación</label>
																<div class="col-lg-8">
																	<div class="input-group">
																		<input class="form-control" id="ocupacion" name="ocupacion" type="text">
																		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="estado">Estado</label>
																<div class="col-lg-8">
																	<div class="input-group">
																	  <input class="form-control focused "  maxlength="12" id="estado" name="estado" type="text" data-prompt-position="topLeft" readonly>
																	  <div class="input-group-addon"><i class="fa fa-tags"></i></div> 	
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!--<h4>Ubigeo</h4>
													<hr>
													<div class="form-group">
														<label class="col-lg-4 control-label" for="dep">Departamento</label>
														<div class="col-lg-8">
															<select class="form-control ubigeo" id="dep" name="dep" class="ubigeo"></select>
														</div>
													</div>-->
													<!--<div class="form-group">
														<label class="col-lg-4 control-label" for="dist">Provincia</label>
														<div class="col-lg-8">
															<select class="form-control ubigeo" id="prov" name="prov" class="ubigeo"></select>
														</div>
													</div>-->
													<!--<div class="form-group">
														<label class="col-lg-4 control-label" for="dist">Distrito</label>
														<div class="col-lg-8">
															<select class="form-control ubigeo" id="dist" name="dist" class="ubigeo"></select>
														</div>
													</div>-->
													<!--<div class="form-group">
														<label class="col-lg-4 control-label" for="zonas">Zonas</label>
														<div class="col-lg-8">
															<select class="form-control" id="zonas" name="zonas" class="ubigeo"></select>
														</div>
													</div>-->
												</div>
												<div class="modal-footer">
													<button type="reset" class="btn btn-flat btn-default" data-dismiss="modal">Cancelar</button>
													<button id="btn-reg-clientes" type="button" class="btn btn-flat btn-primary">Registrar</button>
													<button id="btn-editar-clientes" type="button" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
												</div>
											</form>
										</div>
										<div id="form_empresa">	
											<form id="ClienteForm1" class="form-horizontal" method="post" action-1="<?php echo base_url();?>ventas/clientes/registrar_empresa" action-2="<?php echo base_url();?>ventas/clientes/editar_empresa" data-source="<?php echo base_url();?>administracion/servicios/getUbigeo">
												<input type="hidden" id="idEmpresa" name="idEmpresa">
												<div class="modal-body">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label class="col-lg-3 control-label" for="eruc">RUC</label>
																<div class="col-lg-8">
																	<div class="input-group">
																		<input class="form-control focused validate[required,custom[onlyNumberSp]] validate[maxSize[11]] validate[minSize[11]]" id="eruc" name="eruc" type="text" data-prompt-position="topLeft">
																		<div class="btn btn-info btn-flat input-group-addon" id="btn_validar_empresa">
				                                            				<i class="ion-checkmark" style="color:white;"></i>
				                                        				</div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="erazonSocial">Razón Social</label>
																<div class="col-lg-8">
																	<div class="input-group">
																		<input class="form-control" type="text" id="erazonsocial" name="erazonsocial" data-prompt-position="topLeft" readonly>
																		<span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
																	</div>	
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="etelefono">Teléfono</label>
																<div class="col-lg-8">
																	<div class="input-group">
																	  <input class="form-control focused validate[required,custom[number]]" placeholder="999999999"  maxlength="12" id="etelefono" name="etelefono" type="text" data-prompt-position="topLeft">
																	  <div class="input-group-addon"><i class="fa fa-phone"></i></div> 	
																	</div>
																</div>
															</div>
															
														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<label class="col-lg-3 control-label" for="edirfiscal">Dirección Fiscal</label>
																<div class="col-lg-8">
																	<div class="input-group">
																		<input class="form-control focused" id="edirfiscal" name="edirfiscal" type="text" readonly>
																		<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-lg-3 control-label" for="etipCont">Tipo de Contribuyente</label>
																<div class="col-lg-8">
																	<select class="form-control SelectAjax" name="etipCont" id="etipCont" data-source="<?php echo base_url();?>
																		administracion/servicios/getConstantesByClase/10" attrval="cConstanteValor" attrdesc="cConstanteDesc">
																	</select>
																</div>
															</div>															
															<div class="form-group">
																<label class="col-lg-3 control-label" for="eestado">Estado</label>
																<div class="col-lg-8">													
																	<div class="input-group">
																		<input class="form-control" maxlength="50" id="eestado" name="eestado" class="focusedInput" type="text" data-prompt-position="topLeft" readonly>
																		<span class="input-group-addon"><i class="fa fa-tags"></i></span>
																	</div>													
																</div>
															</div>
															
														</div>
													</div>
													
												</div>
												<div class="modal-footer">
													<button type="reset" class="btn btn-flat btn-default" data-dismiss="modal">Cancelar</button>
													<button id="btn-reg-empresa" type="button" class="btn btn-flat btn-primary">Registrar</button>
													<button id="btn-editar-empresa" type="button" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
												</div>
											</form>
										</div>
									</div>		
								</div>
							</div>
						</div>

						<div class="modal fade" id="exportmodal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">EXPORTAR</h4>
									</div>
									<div class="modal-body">
										<form method="post" target="_blank" id="CreatePDFForm">
											<input type="hidden" name="title" id="title"/>
											<input type="hidden" name="table_clientes" id="table_clientes"/>
											<input type="hidden" name="table_empresas" id="table_empresas">
											<div class="row">
												<div class="col-lg-6">
										            <!-- small box -->
										            <div class="small-box bg-yellow">
										                <div class="inner">
										                    <h3>
										                        PDF
										                    </h3>
										                    <p>
										                        .pdf
										                    </p>
										                </div>
										                <div class="icon">
										                    <i class="ion ion-document-text"></i>
										                </div>
										                <a href="#" id="pdfbutton" class="small-box-footer">
										                    Exportar <i class="fa fa-arrow-circle-right"></i>
										                </a>
										            </div>
										        </div><!-- ./col -->
												<div class="col-lg-6">
										            <!-- small box -->
										            <div class="small-box small-box bg-green">
										                <div class="inner">
										                    <h3>
										                        Excel
										                    </h3>
										                    <p>
										                       .xls
										                    </p>
										                </div>
										                <div class="icon">
										                    <i class="ion ion-pie-graph"></i>
										                </div>
										                <a href="#" id="xlsutton" class="small-box-footer">
										                    Exportar <i class="fa fa-arrow-circle-right"></i>
										                </a>
										            </div>
										        </div><!-- ./col -->
											</div>
										</form>
									</div>
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
