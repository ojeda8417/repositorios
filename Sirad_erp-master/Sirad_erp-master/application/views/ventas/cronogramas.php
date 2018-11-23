<aside class="right-side">
	<section class="content-header">
		<h1>Cronograma de Pagos<small>Consultar</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>ventas">Ventas</a>
				</li>
				<li class="active">Cronograma de Pagos</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body table-responsive" >
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="clientes_table"
						data-source="<?php echo base_url();?>ventas/servicios/getClientes_cronograma">
							<thead>
								<tr>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>DNI</th>
									<th>Línea de Crédito S/.</th>
									<th>Opciones</th>
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