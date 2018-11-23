<aside class="right-side">
	<section class="content-header">
		<h1>Constantes</h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>administracion">Administración</a>
				</li>
				<li class="active">Constante</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Constantes <small>por Tipo</small></h3>
						<div class="box-tools pull-right">
                            <button  id="btn-reg" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
					</div>
	    			<div class="box-body">					
                        <div class="row">
	                        <div class="form-horizontal col-lg-6 col-lg-offset-2">
								<div class="form-group">
									<label class="col-lg-4 control-label" for="tipo">Clase:</label>
									<div class="col-lg-8">
										<select id="claseconstante" class="form-control SelectAjax" name="claseconstante" data-source="<?php echo base_url();?>administracion/servicios/getClaseConstante" attrval="nConstanteClase" attrdesc="cConstanteDesc"></select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-body table-responsive">
						<table id="constantes_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>Clase</th>
									<th>Nombre</th>
									<th>Valor</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
					<!--MODALS-->
					<div class="modal fade" id="modalConstante">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id='regClase'>Registrar Clase</h4>
									<h4 id='editClase'>Modificar Clase</h4>
								</div>
								<form id="ConstanteForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/constantes/registrar" action-2="<?php echo base_url();?>administracion/constantes/editar">
									<input type="hidden" id="idConstante" name="idConstante">
									<div class="modal-body">
										<input id="clase" name="clase" type="hidden">										
										<div class="form-group">
											<label class="col-lg-4 control-label" for="nom_clase">Descripción</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input class="form-control " id="nom_clase" name="nom_clase" type="text" data-prompt-position="topLeft">
													<span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="valor">Valor</label>
											<div class="col-lg-8">
												<div class="input-group">
													<input class="form-control validate[required,custom[onlyNumberSp]]" id="valor" name="valor" type="text" data-prompt-position="topLeft">
													<span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-flat btn-default btn-cancelarprov" data-dismiss="modal">Cancelar</button>			
										<button id="btn-reg-constante" class="btn btn-flat btn-primary">Registrar</button>
										<button id="btn-edit-constante" class="btn btn-flat btn-primary" style="display:none">Guardar</button>
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