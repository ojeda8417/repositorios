<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			VENTAS:
			<small>Separacion</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>ventas">Ventas</a>
			</li>
			<li class="active">Editar</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<div class="form-horizontal">
							<div class="box-body">
								<table class="table table-bordered table-striped">
									<tr>
										<td style="width: 25%;"><strong>Cliente</strong></td>
										<td colspan="3" style="width: 75%;"><?php echo $venta["Cliente"]; ?></td>
									</tr>
									<tr>
										<td style="width: 25%;"><strong>Dirección</strong></td>
										<td style="width: 25%;"><?php echo $venta["Cliente_direccion"];?></td>
										<td style="width: 25%;"><strong>Fec. Emisión</strong></td>
										<td style="width: 25%;"><?php echo $venta["cVentaFecReg"]; ?></td>
									</tr>
									<tr>
										<td><strong>Vendedor</strong></td>
										<td><?php echo $venta["Vendedor"]; ?></td>
										<td><strong>Tipo de Pago</strong></td>
										<td><?php echo $venta["tipo_pago"]; ?></td>
									</tr>
								</table>
							</div>
							<div class="box-body">
								<table id="productos_table" class="table table-bordered table-striped">
									<thead>
										  <tr>
											  <th>Código</th>
											  <th>Producto</th>
											  <th>Cantidad</th>
											  <th>Importe</th>
										  </tr>
									</thead>
									<tbody>
										<?php foreach ($dettale as $value):?>
											<tr>
												<td><?php echo $value["codBarra"]; ?></td>
												<td><?php echo $value["Producto"]; ?></td>
												<td><?php echo $value["cant_prod"]; ?></td>
												<td><?php echo $value["Total"]; ?></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>								
							<div class="row">
								<div class="col-lg-6">
								</div>
								<div class="col-lg-6">
									<div class="box-body">
										<table class="table table-bordered table-striped">
											<tr>
												<td style="width: 50%;"><strong>Subtotal</strong></td>
												<td style="width: 50%;"><?php echo $venta["SubTotal"];?></td>
											</tr>
											<tr>
												<td><strong>Descuento</strong></td>
												<td><?php echo $venta["Descuento"];?>%</td>
											</tr>
											<tr>
												<td><strong>IGV</strong></td>
												<td><?php echo $venta["TipoIGV"];?>%</td>
											</tr>
											<tr>
												<td><strong>Total</strong></td>
												<td id="total"><?php echo $venta["Total"];?></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="box-body">
										<form class="form-horizontal" id="PagarForm" action-1="<?php echo base_url();?>ventas/ventas/editar">
											<input type="hidden" name="nVenta_id" value="<?php echo $venta["nVenta_id"];?>">
											<input type="hidden" name ="pagofinal" id="pagofinal" val="0">
											<input type="hidden" name ="saldo" id="saldo" val="<?php echo $venta["nVentaSaldo"];?>">
											<div class="form-group">
												<label class="col-lg-4 control-label" for="amortizacion">Monto a Pagar</label>
												<div class="col-lg-5">
													<div class="input-group"> 
														<input class="form-control" name="amortizacion" id="amortizacion" type="text" value="0" >
														<div class="input-group-addon">
			                                                S/.
			                                            </div>
													</div>
												</div>
												<div class="col-lg-3">
													<button id="pagar" class="btn btn-warning btn-buscarc btn-flat" style="margin: 0 18px;"><i class='icon-pago'></i> Pagar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="box-body">
										<table class="table table-bordered table-striped">
											<tr>
												<td style="width: 50%;"><strong>A cuenta</strong></td>
												<td id="amortizacion" style="width: 50%;"><?php echo $venta["nVentaTotAmt"];?></td>
											</tr>
											<tr>
												<td><strong>Saldo</strong></td>
												<td id="saldo_rest"><?php echo $venta["nVentaSaldo"];?></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>						
					<div class="box-footer">
						<a href="<?php echo base_url() ?>ventas/views/cons_ventas" class="btn btn-success btn-flat"> <i class="fa fa-reply"></i>
							Volver
						</a>
					</div>
				</div>
				<div class="modal fade" id="PagarModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Atención</h3>
							</div>
							<div class="modal-body">
								<p id="mensaje_pago"></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-cancelarprov btn-flat btn-default" data-dismiss="modal">
									Cancelar
								</button>
								<button type="button" class="btn btn-success btn-flat" id="btn_enviar">
									Aceptar
								</button>
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
				