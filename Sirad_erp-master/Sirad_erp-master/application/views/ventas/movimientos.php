<aside class="right-side">
	<section class="content-header">
		<h1>
			Movimientos
			<small>Consultar</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>">Home</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>ventas">Ventas</a>
			</li>
			<li class="active">Movimientos</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Buscar Movimientos</h3>
						<div class="box-tools pull-right">
							<button id="pdfgen" type="button" class="btn btn-success btn-flat">Reporte General</button>
							<button id="pdfdet" type="button" class="btn btn-success btn-flat">Reporte Detallado</button>
							
							<?php if( $this->session->userdata('caja')["cCajaEstado"] === "1"){ ?>
                            <button href="#" class="btn btn-default btn-flat btn-registrar"> <i class="glyphicon glyphicon-plus"></i>
							</button>
                        	<?php }else{ ?>
							<button id="modal_caja" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-plus"></i></button>
                        	<?php } ?>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-10">
								<div class="form-group">
									<div class="input-daterange input-group">
										<input type="text" class="form-control" name="start" id="date01" value="<?php echo date("d/m/Y"); ?>
										"/>
										<span class="input-group-addon">Hasta</span>
										<input type="text" class="form-control" name="end" id="date02" value="<?php echo date("d/m/Y"); ?>"/></div>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="form-group">
									<button id="buscarfecha" type="button" style="width:100%" class="btn btn-info btn-flat"> <i class="fa fa-search"></i>
										Buscar
									</button>
								</div>
							</div>
						</div>
						<table id="movimientos_table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Fecha de Registro</th>
									<th>Trabajador</th>
									<th>Concepto</th>
									<th>Monto S/.</th>
									<th>Tipo de Movimiento</th>
									<th>Tipo de Pago</th>
								</tr>
							</thead>
							<thead>
								<tr>
									<th class="input">
										<input type="text" placeholder="Fecha" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="Trabajador" class="search_init form-control" />
									</th>
									<th class="input">
										<input type="text" placeholder="Concepto" class="search_init form-control" />
									</th>
									<th>
									</th>
									<th class="select" index="nMovimientoTip" nrocol="4">
									</th>
									<th class="select" index="nMovimientoTipPag" nrocol="5">
									</th>																
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<div class="modal fade" id="modalMov">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3>Registrar Movimiento</h3>
							</div>
							<form id="MovimientoForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>
								ventas/movimientos/registrar/">
								<input type="hidden" name="idRegistrado" id="idRegistrado" value="<?php echo $this->session->userdata('trabajador')["nPersonal_id"] ?>
								">
								<input type="hidden" name="idLocal" id="idLocal" value="<?php echo $local["nLocal_id"] ?>
								">
								<div class="modal-body">
									<div class="form-group">
										<label class="col-lg-4 control-label" for="personal">Trabajador</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input class="form-control" id="personal"  type="text" value="<?php echo $this->session->userdata('trabajador')["cPersonalNom"]." ".$this->session->userdata('trabajador')["cPersonalApe"] ?>" readonly>
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="monto">Monto</label>
										<div class="col-lg-8">
											<div class="input-group">
												<input class="form-control validate[required,custom[number]]" id="monto" name="monto" type="number" step="0.1" min="1">
												<span class="input-group-addon"><i class="fa fa-money"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="concepto">Concepto</label>
										<div class="col-lg-8">
											<textarea class="form-control" id="concepto" name="concepto" ></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="selectTipoMov">Tipo de Movimiento</label>
										<div class="col-lg-8">
											<select id="selectTipoMov" name="selectTipoMov" class="form-control SelectAjax  validate[required]" data-source="<?php echo base_url();?>
												administracion/servicios/getConstantesByClase/9" attrval="cConstanteValor" attrdesc="cConstanteDesc" required>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label" for="selectTipoPag">Tipo de Pago</label>
										<div class="col-lg-8">
											<select id="selectTipoPag" name="selectTipoPag" class="form-control SelectAjax  validate[required]" data-source="<?php echo base_url();?>
												administracion/servicios/getConstantesByClase/2" attrval="cConstanteValor" attrdesc="cConstanteDesc" required>
											</select>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-flat btn-default btn-cancelarprov" data-dismiss="modal">Cancelar</button>
									<button id="btn-reg-movimiento" type="button" class="btn btn-flat btn-primary ">Registrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal fade" id="rquiredproducts">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Atención</h4>
						</div>
						<div class="modal-body">
							<div class="alert alert-danger alert-dismissable">
								<p>
									Necesita Inicia Caja
								</p>
							</div>
						</div>
						<div class="modal-footer clearfix">
							<a href="#" class="btn" data-dismiss="modal">Aceptar</a>
						</div>
					</div><!-- /.modal-content -->
            	</div><!-- /.modal-dialog -->
			</div>
				<div class="modal fade" id="exportmodal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">EXPORTAR</h4>
							</div>
							<div class="modal-body">
								<form method="post" id="CreatePDFForm" target="_blank">
									<input type="hidden" name="title" id="title"/>
									<input type="hidden" name="movimientotable" id="movimientotable" value=""/>
									<input type="hidden" name="table_ingresos" id="table_ingresos" value=""/>
									<input type="hidden" name="table_salidas" id="table_salidas" value=""/>
									<input type="hidden" name="total" id="total" value=""/>
									<div class="row">
										<div class="col-lg-6">
											<!-- small box -->
											<div class="small-box bg-yellow">
												<div class="inner">
													<h3>PDF</h3>
													<p>.pdf</p>
												</div>
												<div class="icon">
													<i class="ion ion-document-text"></i>
												</div>
												<a href="#" id="pdfbutton" class="small-box-footer">
													Exportar
													<i class="fa fa-arrow-circle-right"></i>
												</a>
											</div>
										</div>
										<!-- ./col -->
										<div class="col-lg-6">
											<!-- small box -->
											<div class="small-box small-box bg-green">
												<div class="inner">
													<h3>Excel</h3>
													<p>.xls</p>
												</div>
												<div class="icon">
													<i class="ion ion-pie-graph"></i>
												</div>
												<a href="#" id="xlsutton" class="small-box-footer">
													Exportar
													<i class="fa fa-arrow-circle-right"></i>
												</a>
											</div>
										</div>
										<!-- ./col -->
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
</div>