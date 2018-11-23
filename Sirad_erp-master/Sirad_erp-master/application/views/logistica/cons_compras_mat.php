<aside class="right-side">
	<section class="content-header">
		<h1>Compra de Materiales<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica">Logística</a>
			</li>
			<li class="active">Compra de Materiales</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Buscar</h3>
						<div class="box-tools pull-right">
                            <a href="<?php echo base_url();?>logistica/views/reg_ordencompra_mat/" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></a>
                        </div>
                	</div>
                	<div class="box-body">
                		<div id="OrdCompraMaterialesForm" name="OrdCompraMaterialesForm" action-1="<?php echo base_url();?>logistica/servicios/get_log_ordcompmaterial" action-2="<?php echo base_url();?>logistica/views/ver_ordencomprasmat">						
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<div class="input-daterange input-group">
										    <input type="text" class="form-control" name="start" id="date01" value="<?php echo date("d/m/Y"); ?>"/>
										    <span class="input-group-addon">Hasta</span>
										    <input type="text" class="form-control" name="end" id="date02" value="<?php echo date("d/m/Y"); ?>"/>
										</div>
									</div>
								</div>						
								<div class="col-lg-2">
									<div class="form-group">
										<button id="buscarfecha" type="button" style="width:100%" class="btn btn-info btn-flat"> <i class="fa fa-search"></i>  Buscar</button>
									</div>
								</div>
							</div>
						</div>								
					</div>
				
					<div class="box-body table-responsive">
						<table id="ordmat_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>N° Ord. Compra</th>
									<th>Fecha de Registro</th>
									<th>Registrador</th>
									<th>Proveedor</th>
									<th>Total S/.</th>
									<th>Estado</th>
								</tr>
							</thead>
							<thead>
								<tr>
									<th class="input">
										<input type="text" placeholder="Nro" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="Fecha" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="Proveedor" class="search_init form-control" />
									</th>
									<th class="select" index="cProveedorRazSocial" nrocol="3">
									</th>
									<th>
									</th>
									<th class="customselect" nrocol="5">
										<select class="form-control">
											<option value="">Todos</option>
											<option value="Habilitado">Habilitado</option>
											<option value="Inhabilitado">Inhabilitado</option>
										</select>
									</th>	
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal fade" id="EliminarOrdCompraAlert" >
				<div class="modal-dialog">
					<div class="modal-content">
						<form action="" method="post" id="EliminarOrdCompraForm">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h2>
									<i class="icon-alert icon-red icon32"></i>
									Eliminar
								</h2>
							</div>
							<div class="modal-body">
								<p>¿Esta seguro de que desea eliminar la Orden de Compra?</p>
								<input type="hidden" name="idordcompra" id="idordcompra"></div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<input type="submit" value="Eliminar" class="btn btn-primary"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
</div>					