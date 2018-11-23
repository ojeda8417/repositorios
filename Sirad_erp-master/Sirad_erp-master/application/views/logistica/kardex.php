<aside class="right-side">
	<section class="content-header">
		<h1>Kardex<small>Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica">Logística</a>
			</li>
			<li class="active">Kardex</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Reporte <small>Kardex</small></h3>
						<div class="box-tools pull-right">
							<input id="xlsresumengen" type="button" value="Reporte Resumen" class="btn btn-flat btn-success" style="float: right; margin: 10px 10px 0 0;"/>
							<input id="xlsvalorizadogen" type="button" value="Reporte Valorizado" class="btn btn-flat btn-success" style="float: right; margin: 10px 10px 0 0;"/>
						</div>
					</div>
					<div class="box-body">
						<div class="form-horizontal" id="KardexForm" name="KardexForm" action-1="<?php echo base_url();?>logistica/servicios/get_kardex_byfecha">
							<input type="hidden" name="idLocal" id="idLocal" value="<?php echo $local["nLocal_id"];?>">
							<fieldset>
								<div class="form-group">
									<label class="col-lg-4 control-label" for="nom-cargo">Fecha:</label>									
									<div class="col-xs-3">	
										<div class="input-group">									
											<input type="text" class="form-control datepicker" id="date01" name="date01">										
											<span id="spandesc" class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
									</div>
									<button id="buscarfecha" name="buscarfecha" type="button" class="btn btn-flat btn-info btn-buscarp" style="margin: 0 18px;"><i class="fa fa-search"></i> Buscar</button>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="box-body table-responsive">
						<table id="kardex_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>Año</th>
									<th>Mes</th>
									<th>Producto</th>
									<th>Marca</th>
									<th>Tipo Producto</th>
									<th>Tipo Ingreso</th>
									<th>Cantidad</th>
									<th>Prec. Unitario S/.</th>
									<th>Total S/.</th>
								</tr>
							</thead>
							<thead>
								<tr>
									<th class="input">
										<input type="text" placeholder="Año" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="Mes" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="Producto" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="Marca" class="search_init form-control" />
									</th>
									<th class="select" index="Tipo_Producto" nrocol="4">
									</th>
									<th class="select" index="TipoIngreso" nrocol="5">
									</th>
									<th>
									</th>
									<th>
									</th>
									<th>
									</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<form method="post" target="_blank" id="CreateXLSGenForm">
						<input type="hidden" name="titulo" id="titulo"/>
						<input type="hidden" name="table_kardexgen" id="table_kardexgen"/>
					</form>
					<form method="post" target="_blank" id="CreateXLSValForm">
						<input type="hidden" name="table_kardexgenval" id="table_kardexgenval"/>
						<input type="hidden" name="local" id="local"/>
					</form>
				</div>
			</div>
		</div>
	</section>
</aside>
</div>