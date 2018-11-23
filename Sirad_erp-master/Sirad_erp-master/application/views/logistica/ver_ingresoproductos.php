<aside class="right-side">
	<section class="content-header">
		<h1>Ingreso de Productos <small> Consultar</small></h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica">Logistica</a>
			</li>
			<li class="active">Ingreso de Productos</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
	                    <h4 class="box-title">Ver Datos</h4>
	                    <div class="box-tools pull-right">
							<div class="col-lg-8">
							</div>
						</div>
                	</div>
                	<div class="box-body">
						<div id="RegistrarIngresoForm" class="form-horizontal">
							<fieldset>
								<div class="row-fluid">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-lg-4 control-label" for="numIngreso">Número Ingreso</label>
											<div class="col-lg-8">
												<span class="help-inline" ><?php echo $cIngProdSerie." - ".$cIngProdNro; ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="registrador">Registrador</label>
											<div class="col-lg-8">
												<span class="help-inline" ><?php echo $nomape;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="motivo">Motivo</label>
											<div class="col-lg-8">
												<span class="help-inline" ><?php echo $DescMotivo;?></span
												<span class="help-inline" ><?php echo $nIngProdMotivo; ?></span
												<span class="help-inline" ><?php echo $nIngProdMotivo; ?></span>

											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="tienda">Tienda</label>
											<div class="col-lg-8">
												<span class="help-inline" ><?php echo $cLocalDesc;?></span>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-lg-4 control-label" for="fecha">Fecha</label>
											<div class="col-lg-8">
												<span class="help-inline" ><?php echo $dIngProdFecReg;?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="numDoc">Número Documento</label>
											<div class="col-lg-8">
												<span class="help-inline" ><?php echo $cIngProdDocSerie." - ".$cIngProdDocNro ?></span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label" for="observaciones">Observaciones</label>
											<div class="col-lg-8">
												<span class="help-inline" ><?php echo $cIngProdObsv ?></span>
											</div>
										</div>
									</div>
								</div>								
							</fieldset>
						</div>
						<hr>
						<h3>Detalle</h3>
						<hr>
						<table id="deting_productos_table" name="deting_productos_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url()."logistica/servicios/get_log_detingprod/".$nIngProd_id;?>">
							<thead>
								<tr>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio Unit</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div></br></br>
					<div class="box-footer"> 
						<a href="<?php echo base_url();?>logistica/views/cons_ingresoproductos/" class="btn btn-flat btn-default">
							<i class="icon icon-white icon-arrowthick-w"></i>
							Volver
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section>
</aside>
</div>
<!--/fluid-row-->