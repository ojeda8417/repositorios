<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			VENTAS:
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
						<section id="resumen_venta" class="content invoice">                    
		                    <!-- title row -->
		                    <div class="row">
		                        <div class="col-xs-12">
		                            <h2 class="page-header">
		                                <i class="fa fa-globe"></i> CLM Developers SAC
		                                <small class="pull-right">Fecha: <?php echo date("d/m/Y"); ?></small>
		                            </h2>                            
		                        </div><!-- /.col -->
		                    </div>
							<!-- info row -->
		                    <div class="row invoice-info">
		                        <div class="col-sm-4 invoice-col">
		                            De
		                            <address>
		                            	<b>RUC:</B> 20559603563<br>
		                                <strong>CLM Developers, SAC.</strong><br>
		                                Bernardo Alcedo 187<br>
		                                Urb. San Fernando, Trujillo<br>
		                                <i class="fa fa-phone"></i> +51 999494821 / +51 044 612874<br/>
		                                <i class="fa fa-envelope"></i> contacto@clmdevelopers.com
		                            </address>
		                        </div><!-- /.col -->
		                        <div class="col-sm-4 invoice-col">
		                            <b>Cliente:</b>
		                            <address>
		                                <strong id="clienteR"><?php echo $venta["name"]; ?></strong><br>
		                                <?php echo $venta["Cliente_direccion"];?><br>
		                            </address>
		                            <b>Ruc:</b>
		                            <address>
		                                <strong id="rucR"><?php echo $venta["cClienteRuc"]; ?></strong><br>
	                                </address>
		                        </div><!-- /.col -->

		                        <div class="col-sm-4 invoice-col">
		                            
		                            <address>
		                                 
		                                <strong id="tipdocR"><?php echo $venta["tipoComprobante"]; ?></strong><br>
		                                
		                            </address>
		                            
		                            <address>
			                                <?php echo $venta["cDocSerie"].' - '.$venta["cDocNumero"]; ?><strong id="sercomR"></strong><br>
	                                </address>
		                            <b>Fec. Emisión:</b><?php echo date("d/m/Y"); ?><br/>
		                            <b>Vendedor:</b><?php echo $venta["Vendedor"]; ?><br/>
		                            <b>Tipo Pago:</b><?php echo $venta["tipo_pago"]; ?><br/><br/>
		                        </div><!-- /.col -->

		                    </div><!-- /.row -->
							<!-- TABLA DE PRODUCTOS POR COMPRAR aqui -->
							<!-- Table row -->
		                    <div class="row">
		                        <div class="col-xs-12 table-responsive">
		                            <table id="tabla_resumen_productos" class="table table-striped">
										<thead >
											<tr>
												<th>Código</th>
												<th>Producto</th>
												<th>Cantidad</th>
												<th>Precio</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($dettale as $value):?>
											<tr>
												<td>
													<?php echo $value["codBarra"]; ?></td>
												<td>
													<?php echo $value["Producto"]; ?></td>
												<td>
													<?php echo $value["cant_prod"]; ?></td>
												<td>
													<?php echo $value["Total"]; ?></td>
											</tr>
											<?php endforeach ?></tbody>
										</tbody>
									</table>
								</div>
							</div>
							<br>
							<!-- END TABLA DE PRODUCTOS -->
							<div class="row">
								<div class="col-xs-6 col-lg-6"></div>
								<div class="col-xs-6 col-lg-6">
									<table class="table">
									
										<?php if($venta["tipoComprobante"] <> "Boleta") {?> 
											<tr>
												<td >
													<strong>Subtotal</strong>
												</td>
												<td>
												<?php echo $venta["SubTotal"];?>
												</td>
											</tr>
											<tr>
												<td>
													<strong>Descuento</strong>
												</td>
												<td>
													<?php echo $venta["Descuento"];?>%
												</td>
											</tr>
											<tr>
												<td>
													<strong>IGV</strong>
												</td>
												<td>
													<?php echo $venta["TipoIGV"];?>%
												</td>
											</tr>
										<?php }?>

										<tr>
											<td>
												<strong>Total</strong>
											</td>
											<td>
												<?php echo $venta["Total"];?>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</section>
					</div>
					<div class="box-footer">
						<a href="<?php echo base_url() ?>ventas/views/cons_ventas" class="btn btn-success btn-flat"> <i class="fa fa-reply"></i>
							Volver
						</a>
						<a href="#" id="imprimir" class="btn btn-success btn-flat" style="float: right;"> <i class="fa fa-print"></i>
							Imprimir
						</a>
						<button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#compose-modal" > <i class="fa fa-envelope"></i>  Enviar</button>
					</div>
					<!--MODALS-->
					<div class="modal fade" id="compose-modal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title"><i class="fa fa-envelope-o"></i>  Enviar Mensaje de Facturación</h4>
                                </div>
                                <div class="modal-body">
                                	<form id="EnviarForm" class="form-horizontal" action-1="<?php echo base_url();?>mensajes/facturacion/sendemail_fact">  
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">TO:</span>
                                                    <input type="hidden" name="nVenta_id" value="<?php echo $venta["nVenta_id"];?>">                         
                                                    <input name="email_to" id="email_to" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        	<div class="col-lg-12">
										    <textarea id="email_message" class="form-control" style="height: 120px;" placeholder="Message" name="message"></textarea>
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
	<!-- /.content -->
</aside>
<!-- /.right-side -->
</div>
<!-- ./wrapper -->