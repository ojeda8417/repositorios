<aside class="right-side">
	<section class="content-header">
		<h1>Configuración de Documentos<small>de Impresión</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion">Administracion</a>
			</li>
			<li class="active">Configuración de Documentos</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Configuración de Documentos</small></h3>
						<div class="box-tools pull-right">
                            <button  id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="configdoc_table"
						data-source ="<?php echo base_url();?>administracion/servicios/getConfDoc">
							<thead>
								<tr>
									<th>Tipo Doc</th>
									<th>Nro Serie</th>
									<th>Nro Comprobante</th>									
									<th>Estado</th>
									
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<!--modals-->
					<div class="modal fade" id="modalConfigDoc">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Registrar</h4>
								</div>
								<form id="ConfigDocForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/confdoc/registrar" action-2="<?php echo base_url();?>administracion/confdoc/editar">
									<div class="modal-body">
										<input id="codigo" name="codigo" type="hidden">
										<input type="hidden" name="idLocal" id="idLocal" value="<?php echo $local["nLocal_id"];?>">
										<fieldset>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="TipDoc">Tipo de Documento</label>
												<div class="col-lg-8">
													<select id="TipDoc" class="form-control SelectAjax" name="TipDoc" data-source="<?php echo base_url();?>administracion/servicios/getConstantesByClase/7"   attrval="cConstanteValor" attrdesc="cConstanteDesc" ></select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="NumSerie">Numero de Serie</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input class="form-control validate[required]" name="NumSerie" id="NumSerie" maxlength="4" type="text" data-prompt-position="topLeft">
														<span class="input-group-addon"><i class="fa fa-paste"></i></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="NumComp">Numero de Comprobante</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input class="form-control validate[required,custom[number]]" name="NumComp" id="NumComp" maxlength="6" type="text" data-prompt-position="topLeft">
														<span class="input-group-addon"><i class="fa fa-paste"></i></span>
													</div>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-lg-4 control-label" for="estado">Estado</label>
												<div class="col-lg-8">
													<select id="estado" required name="estado" data-rel="chosen" class="form-control">
														<option value="1">Habilitado</option>
														<option value="0">Inhabilitado</option>
													</select>
												</div>
											</div>
										</fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-flat btn-default btn-cancelarprov" data-dismiss="modal">Cancelar</button>
										<button id="btn-reg-confdoc" type="button" class="btn btn-flat btn-primary ">Registrar</button>
										<button id="btn-editar-confdoc" type="button" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
									</div>
								</form>						
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