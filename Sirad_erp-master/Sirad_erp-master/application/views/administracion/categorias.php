<aside class="right-side">
	<section class="content-header">
			<h1>Categorías<small>Consultar</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>administracion/">Administración</a>
				</li>
				<li class="active">Categorías</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div id="rootwizard">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li>
								<a href="#tab1" data-toggle="tab">CATEGORÍAS</a>
							</li>
							<li>
								<a href="#tab2" data-toggle="tab">TIPOS</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane" id="tab1">
								<form id="EnviarCategoriaForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/categorias/registrar" action-2="<?php echo base_url();?>
									administracion/categorias/editar">
									<input type="hidden" id="idCategoria" name="idCategoria">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-lg-4 control-label" for="nom-categoria">Nombre de Categoría</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input class="form-control validate[required,custom[onlyLetterNumberSp]]" id="nom_categoria" name="nom_categoria" type="text" data-prompt-position="topLeft">
														<span class="input-group-addon"><i class="fa fa-tag"></i></span>
													</div>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="desc-categoria">Descripción</label>
												<div class="col-lg-8">
													<textarea class="form-control validate[required]" id="desc_categoria" name="desc_categoria" data-prompt-position="topLeft"></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-lg-4 control-label" for="estado-tienda">Estado</label>
												<div class="col-lg-8">
													<select id="selectEstado" name="selectEstado" class="form-control validate[required]">
														<option value="1">Habilitado</option>
														<option value="0">Inhabilitado</option>
													</select>
												</div>
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 ">
											<div class="form-group">
												<div class="col-lg-2 col-lg-offset-10">	
													<button id="registrar_cat" type="button" class="col-lg-12 btn btn-info btn-flat btn-registrar_cat">  Registrar</button>
													<button id="editar_cat" type="button" class="col-lg-12 btn btn-info btn-flat btn-editar_cat"  style="display:none">  Guardar</button>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<hr></hr>
											<h3 >Lista <small>de Categorías</small></h3>
											
											<table class="table table-striped table-bordered bootstrap-datatable datatable" id="categorias_table" data-source = "<?php echo base_url();?>administracion/servicios/getCategoria">
												<thead>
													<tr>
														<th>Nombre</th>
														<th>Descripción</th>
														<th>Estado</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>	
									</div>
								</form>
							</div>
							<div class="tab-pane" id="tab2">
								<form id="EnviarTipoForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/tipos/registrar" action-2="<?php echo base_url();?>administracion/tipos/editar">
									<input type="hidden" id="idTipo" name="idTipo">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-lg-4 control-label" for="select-cat">Categoría</label>
												<div class="col-lg-8">
													<select id="select_cat" class="form-control SelectAjax validate[required]" name="select_cat"  data-source="<?php echo base_url();?>administracion/servicios/getCategoria_Activo" attrval="nCategoria_id" attrdesc="cCategoriaNom"> 
													</select>

												</div>
											</div>	
											<div class="form-group">
												<label class="col-lg-4 control-label" for="desc_tipo">Descripción</label>
												<div class="col-lg-8">
													<textarea class="form-control validate[required]" id="desc_tipo" name="desc_tipo" data-prompt-position="topLeft"></textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="col-lg-4 control-label" for="nom-tipo">Nombre Tipo</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input class="form-control validate[required,custom[onlyLetterNumberSp]]" id="nom_tipo" name="nom_tipo" type="text" data-prompt-position="topLeft">
														<span class="input-group-addon"><i class="fa fa-tag"></i></span>
													</div>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="estado-tipo">Estado</label>
												<div class="col-lg-8">
													<select id="estado_tipo" name="estado_tipo" class="form-control validate[required]">
														<option value="1">Habilitado</option>
														<option value="0">Inhabilitado</option>
													</select>
												</div>
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 ">
											<div class="form-group">
												<div class="col-lg-2 col-lg-offset-10">	
													<button id="registrar_tipo" type="button" class="col-lg-12 btn btn-info btn-flat btn-registrar_tipo"> Registrar</button>
													<button id="editar_tipo" type="button" class="col-lg-12 btn btn-info btn-flat btn-editar_tipo" style="display:none"> Guardar</button>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<hr></hr>
											<h3 >Lista <small>de Tipos</small></h3>
											<table class="table table-striped table-bordered bootstrap-datatable datatable" id="tipo_table" data-source = "<?php echo base_url();?>administracion/servicios/get_tipoproducto">
												<thead>
													<tr>
														<th>Categoría</th>
														<th>Nombre</th>
														<th>Descripción</th>
														<th>Estado</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>	
									</div>
								</form>
							</div>	
						</div>
						
						<!--<div class="box box-info">
							
							<div class="box-body">
								<ul class="pager wizard">

									<div class="form-group">
									<div class="col-lg-2">	
										<button id="buscarfecha" style="float:right"  type="button" class="col-lg-12 btn btn-info btn-flat btn-buscarp"> <i class="fa fa-search"></i>  Buscar</button>
									</div>
									</div>
									<!--<li class="previous">
										<a class="btn btn-default" href="#">Atrás</a>
									</li>
									<li class="next">
										<a class="btn btn-default" href="#">Siguiente</a>
									</li>
									<li >
										<a style="float:right" id="btn_cancelar" href="#">Cancelar</a>
									</li>
									<li class="next finish current" id="btn-reg-usuario" style="display:none;">
										<a class="btn btn-info" href="javascript:;">Registrar</a>
									</li>
									<li class="next finish" id="btn-update-usuario" style="display:none;">
										<a class="btn btn-info" href="javascript:;">Guardar</a>
									</li>
								</ul>
							</div>
						</div>-->
					</div>
				</div>
			</div>
		</div>
		<!--<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Lista <small>de Categorías</small></h3>
						<!--<div class="box-tools pull-right">
                            <button id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>
					<div class="box-body table-responsive">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="categorias_table" data-source = "<?php echo base_url();?>administracion/servicios/getCategoria">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<!--MODALS-->	
					<!--
					<div class="modal fade" id="modalCategoria">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Registrar Categoría</h4>
								</div>
								<form id="CategoriaForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>administracion/categorias/registrar" action-2="<?php echo base_url();?>administracion/categorias/editar">
									<input type="hidden" id="idCategoria" name="idCategoria">
									<div class="modal-body">
										<fieldset>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="nom-categoria">Nombre de Categoría</label>
												<div class="col-lg-8">
													<div class="input-group">
														<input class="form-control validate[required,custom[onlyLetterNumberSp]]" id="nom_categoria" name="nom_categoria" type="text" data-prompt-position="topLeft">
														<span class="input-group-addon"><i class="fa fa-tag"></i></span>
													</div>													
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="desc-categoria">Descripción</label>
												<div class="col-lg-8">
													<textarea class="form-control validate[required]" id="desc_categoria" name="desc_categoria" data-prompt-position="topLeft"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4 control-label" for="estado-tienda">Estado</label>
												<div class="col-lg-8">
													<select id="selectEstado" name="selectEstado" class="form-control validate[required]">
														<option value="1">Habilitado</option>
														<option value="0">Inhabilitado</option>
													</select>
												</div>
											</div>
										</fieldset>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-flat btn-default btn-cancelarprov" data-dismiss="modal">Cancelar</button>
										<button id="btn-reg-categoria" type="button" class="btn btn-flat btn-primary ">Registrar</button>
										<button id="btn-editar-categoria" type="button" class="btn btn-flat btn-primary " style="display:none">Guardar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
	</section>
</aside>		
</div>