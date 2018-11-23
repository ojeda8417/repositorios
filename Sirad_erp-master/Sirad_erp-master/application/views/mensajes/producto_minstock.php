<aside class="right-side">
	<section class="content-header">
		<h1>Notificación<small>Productos</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>				
				<li class="active">Notificación de Productos</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">						
						<h3 class="box-title">Productos con Stock mínimo</h3>		
						<div class="box-tools pull-right">
							<form method="post" target="_blank" id="CreatePDFForm">
								<input type="hidden" name="title" id="title"/>
								<input type="hidden" name="table_productos" id="table_productos"/>
								<div>						
									<button type="button" class="btn btn-success btn-flat" id="xlsutton">Exportar</button>	
				          			<button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#compose-modal">Enviar</button>									       
								</div>
							</form>
						</div>
					</div>
					<div class="box-body">
						<form id="notificaciones">							
							<div class="form-horizontal box-content">															
								<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>mensajes/servicios/getProductos_minstock">
									<thead>
										<tr>
											<th>Código de Barra</th>
											<th>Producto</th>
											<th>Unidad de Medida</th>
											<th>Stock Actual</th>
											<th>Stock Mínimo</th>
											<th>Stock Máximo</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							
							</div>							
						</form>
					</div>
					<!--MODALS-->
					<div class="modal fade" id="compose-modal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title"><i class="fa fa-envelope-o"></i>  Redactar nuevo mensaje</h4>
                                </div>
                                <div class="modal-body">
                                	<form id="EnviarForm" class="form-horizontal" action-1="<?php echo base_url();?>mensajes/email/sendemail">
                                		<div class="form-group">
                							<div class="col-lg-12">
                								<div class="input-group">
                							  		<span id="from" class="input-group-addon"><i class="fa fa-user"></i></span>
                										<input class="form-control" id="registrador" name="registrador" value="<?php echo $trabajador["cPersonalNom"]." ".$trabajador["cPersonalApe"] ?>" type="text" readonly>
                								</div>
                							</div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">TO:</span>                          
                                                    <input name="email_to" id="email_to" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer clearfix">
											<button type="button" class="btn btn-flat" data-dismiss="modal">Cancelar</button>
	                                        <button id="btn_enviar_correo" type="button" class="btn btn-primary btn-flat"> Enviar</button>
                                    	</div>                                    
                                	</form>
                                </div>
							</div>
						</div>
					</div>
																									
				</div>
			</div>
		</div>
	</section>
</aside>
</div>
<!--/fluid-row-->