<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			CAJA:
			<small>VER DATOS</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>ventas">Ventas</a>
			</li>
			<li class="active">Ver</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<div class="box-header">						
						<h3 class="box-title">Productos con Stock mínimo</h3>		
						<div class="box-tools pull-right">
							<form method="post" target="_blank" id="CreatePDFForm">
								<input type="hidden" name="title" id="title"/>
								<input type="hidden" name="table_caja" id="table_caja"/>
								<div>						
									<button type="button" class="btn btn-success btn-flat" id="xlsutton">Exportar</button>					          											       
								</div>
							</form>
						</div>
					</div>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url() ?>ventas/views/inicie_caja" class="btn btn-success btn-flat"> <i class="fa fa-reply"></i>
							Volver
						</a>
						<a href="#" id="imprimir" class="btn btn-success btn-flat" style="float: right;"> <i class="fa fa-print"></i>
							Imprimir
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</aside>
<!-- /.right-side -->
</div>
<!-- ./wrapper -->