<aside class="right-side">
	<section class="content-header">
		<h1>Tarjeta de Credito<small>Registrar</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>ventas">Ventas</a>
				</li>
				<li class="active">Tarjeta de Creditos</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
	                    <h4 class="box-title">Asignar Linea de Credito</h4>
                	</div>
					<div class="box-body">
						<form class="form-horizontal" id="LineaCreditoForm" method="post" action-1="<?php echo base_url();?>ventas/tarjetascreditos/registrar">
							<div class="form-group">
								<label for="proveedor" class="col-lg-4 control-label">Personal</label>
								<div class="col-lg-4">										
									<div class="input-group">
										<input type="hidden" id="fecha" name="fecha">
										<input type="hidden" id="id_personal" name="id_personal">
										<input class="form-control" id="personal" name="personal" readonly type="text">
										<div id="buscar-personal" class="btn btn-info btn-flat input-group-addon">
                                            <i class="fa fa-search"></i>
                                        </div>
									</div>
								</div>
							</div>
							<div class="form-group">
									<label for="cliente" class="col-lg-4 control-label">Cliente</label>
								<div class="col-lg-4">										
									<div class="input-group">
										<input type="hidden" id="id_cliente" name="id_cliente">
										<input class="form-control" id="cliente" name="cliente" readonly type="text">
										<div id="buscar-cliente" class="btn btn-info btn-flat input-group-addon">
                                            <i class="fa fa-search"></i>
                                        </div>
									</div>
								</div>
							</div>
							<div class="form-group">
									<label for="proveedor" class="col-lg-4 control-label">Monto</label>
								<div class="col-lg-4">
									<input class="form-control" id="monto" name="monto" type="text">
								</div>
							</div>
						</form>
					</div>
					<div class="box-footer">						
						<div class="form-group">
							<button id="btn-reg-lineacreditos" name="btn-reg-lineacreditos" class="btn btn-primary">Registrar</button>
							<button class="btn btn-success disabled" >Imprimir</button>
						</div>
					</div>
				</div>

				<!----INICIO MODAL------>
				<div class="modal fade" id="modalBuscarPersonal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Trabajadores</h3>
							</div>
							<div class="modal-body" >
								<table id="select_trabajador_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>administracion/servicios/get_trabajadores_activos">
									<thead>
										<tr>
											<th>Nombres</th>
											<th>Apellidos</th>
											<th>DNI</th>
											<th>Teléfono</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<a  id="select_trabajador" href="#" class="btn btn-primary">Seleccionar</a>
							</div>
						</div>
					</div>
				</div>
				<!--IN MODAL---------------->

				<!----INICIO MODAL------>
				<div class="modal fade" id="modalBuscarCliente">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Clientes</h3>
							</div>
							<div class="modal-body" >							
								<table id="select_cliente_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>ventas/servicios/getClientes">
									<thead>
										<tr>
											<th>Nombres</th>
											<th>Apellidos</th>
											<th>DNI</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<a  id="select_cliente" href="#" class="btn btn-primary">Seleccionar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>