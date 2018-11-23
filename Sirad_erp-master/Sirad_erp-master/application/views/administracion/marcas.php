<aside class="right-side">
	<section class="content-header">
		<h1>Marcas<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion">Administración</a>
			</li>
			<li class="active">Marcas</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Marcas</small></h3>
						<div class="box-tools pull-right">
                            <button id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="marcas_table" data-source = "<?php echo base_url();?>administracion/servicios/getMarcas">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<!--Modal-->
					<div class="modal fade" id="modalMarca">
						<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Registrar Marca</h4>
									</div>
									<form id="MarcaForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/marcas/registrar" action-2="<?php echo base_url();?>administracion/marcas/editar">
										<input type="hidden" id="idMarca" name="idMarca">
										<div class="modal-body">
											<fieldset>
												<div class="form-group">
												<label class="col-lg-4 control-label" for="nom-marca">Nombre de Marca</label>
													<div class="col-lg-8">
														<div class="input-group">
															<input class="form-control focused validate[required,custom[onlyLetterNumberSp]]" id="desc_marca" name="desc_marca" type="text" data-prompt-position="topLeft">
															<span class="input-group-addon"><i class="fa fa-tag"></i></span>
														</div>
													</div>
												</div>
												<div class="form-group">
												<label class="col-lg-4 control-label" for="estado-marca">Estado</label>
													<div class="col-lg-8">
														<select id="selectEstado" name="selectEstado" class="form-control validate[required]" data-prompt-position="topLeft">
															<option value="1">Habilitado</option>
															<option value="0">Inhabilitado</option>
														</select>
													</div>
												</div>
											</fieldset>
										</div>
										<div class="modal-footer">
											<button type="reset" class="btn btn-flat btn-default" data-dismiss="modal">Cancelar</button>
											<button id="btn-reg-marca" class="btn btn-flat btn-primary">Registrar</button>
											<button id="btn-editar-marca" class="btn btn-flat btn-primary" style="display:none">Guardar</button>
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



