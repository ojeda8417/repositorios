<aside class="right-side">
	<section class="content-header">
		<h1>Ingreso de Productos <small> Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica">Logística</a>
			</li>
			<li class="active">Ingreso de Producto</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Buscar</h3>
						<div class="box-tools pull-right">
                            <a href="<?php echo base_url();?>logistica/views/reg_ingresoproductos/" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></a>
                        </div>
                	</div>
					<div class="box-body">
						<div id="IngProductosForm" name="IngProductosForm" action-1="<?php echo base_url();?>logistica/servicios/get_log_ingprod" action-2="<?php echo base_url();?>logistica/views/editar_ingresoproductos" action-3="<?php echo base_url();?>logistica/views/ver_ingresoproductos">						
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
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="ingreso_productos_table" >
							<thead>
								<tr>
									<th>Fecha Registro</th>
									<th>N° Ingreso(Interno)</th>
									<th>Personal</th>
									<th>Motivo</th>
									<th>N° Orden(Externo)</th>
									
								</tr>
							</thead>
							<thead>
								<tr>
									<th class="input">
										<input type="text" placeholder="Fecha" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="N° Ingreso" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="Personal" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="Motivo" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="N° Documento" class="search_init form-control" />
									</th>									
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
</div>