<aside class="right-side">
	<section class="content-header">
		<h1>Saldos<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica">Logística</a>
			</li>
			<li class="active">Saldos</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_1" data-toggle="tab">Saldos Iniciales</a>
						</li>
						<li>
							<a href="#tab_2" data-toggle="tab">Saldos Actuales</a>
						</li>
					</ul>
					<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<div class="form-horizontal" id="SaldoInicialForm" method="post" action-1="<?php echo base_url();?>logistica/servicios/get_log_saldoinicial_byfecha">
									<div class="form-group">
										<div class="col-lg-4 col-lg-offset-2">
											<div class="input-group">
										    	<input type="text" class="form-control datepicker" name="date01" id="fecSalInicial" value="<?php echo date("d/m/Y"); ?>"/>
												<span id="spandesc" class="input-group-addon"><i class="fa fa-calendar"></i></span>
											</div>
										</div>
										<div class="col-lg-2">	
											<button id="buscarfecha" type="button" class="col-lg-12 btn btn-info btn-flat btn-buscarp"> <i class="fa fa-search"></i>  Buscar</button>
										</div>
										<div class="col-lg-2">	
											<button id="xlsinigen" type="button" class="col-lg-12 btn btn-success btn-flat" >Reporte</button>
										</div>
									</div>
								</div>

								<table id="saldoini_table" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th width="30%">Producto</th>
											<th width="15%">Marca</th>
											<th width="15%">Categoria</th>
											<th width="5%">U.M.</th>
											<th width="10%">Cantidad</th>
											<th width="15%">Prec. Unitario S/.</th>
											<th width="10%">Total S/.</th>
										</tr>
									</thead>
									<thead>
										<tr>
											<th class="input">
												<input type="text" placeholder="Producto" class="search_init form-control" />
											</th>
											<th></th>
											<th></Th>
											<th></th>
											<th>
											</th>
											<th class="input">
												<input type="text" placeholder="Prec. Unitario" class="search_init form-control" />
											</th>
											<th></th>								
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<!-- /.tab-pane -->
							<div class="tab-pane" id="tab_2">
								<div class="form-horizontal" id="SaldoActualForm" name="SaldoActualForm" action-1="<?php echo base_url();?>logistica/servicios/get_saldoactual_byfecha">
									<div class="form-group">
										<div class="col-lg-4 col-lg-offset-2">
											<div class="input-group">
										    	<input type="text" class="form-control datepicker" id="date02" value="<?php echo date("d/m/Y"); ?>"/>
												<span id="spandesc" class="input-group-addon"><i class="fa fa-calendar"></i></span>
											</div>
										</div>
										<div class="col-lg-2">	
											<button id="buscarfecha2" type="button" class="col-lg-12 btn btn-info btn-flat btn-buscarp"> <i class="fa fa-search"></i>  Buscar</button>
										</div>
										<div class="col-lg-2">	
											<button id="xlsactualgen" type="button" class="col-lg-12 btn btn-success btn-flat" >Reporte</button>
										</div>
									</div>
								</div>

								<table id="saldoactual_table" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th width="30%">Producto</th>
											<th width="15%">Marca</th>
											<th width="15%">Categoria</th>
											<th width="5%">U.M.</th>
											<th width="11%">Cantidad</th>
											<th width="13%">Prec. Unitario s/.</th>
											<th width="11%">Total s/.</th>
										</tr>
									</thead>
									<thead>
										<tr>
											<th class="input">
												<input type="text" placeholder="Producto" class="search_init form-control" />
											</th>
											<th></th>
											<th></Th>
											<th></th>
											<th>
											</th>
											<th class="input">
												<input type="text" placeholder="Prec. Unitario" class="search_init form-control" />
											</th>
											<th>
											</th>								
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<!-- /.tab-pane -->
					</div>
						<!-- /.tab-content -->
				</div>
				<!-- nav-tabs-custom -->
				
				<!--/span-->
				<form method="post" target="_blank" id="CreateXLSForm">
					<input type="hidden" name="nombrearchivo" id="nombrearchivo"/>
					<input type="hidden" name="titulo" id="titulo"/>
					<input type="hidden" name="tsaldos" id="tsaldos"/>
				</form>
			</div>
		</div>
	</section>
</aside>
</div>