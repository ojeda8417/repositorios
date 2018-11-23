
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url();?>/assets/img/avatar.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo  $this->session->userdata('trabajador')["cPersonalNom"]; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
            	<?php if($this->ion_auth->in_group_type(3)): ?>
	                <li id="admin">
	                    <a href="<?php echo base_url();?>administracion/views">
	                        <i class="fa fa-dashboard"></i> <span>Administración</span>
	                    </a>
	                </li>
	            <?php endif ?>
	            <?php if($this->ion_auth->in_group_type(1)): ?>
	                <li id="dropventas" class="treeview">
	                    <a href="#">
	                        <i class="fa fa-shopping-cart"></i>
	                        <span>Ventas</span>
	                        <i class="fa fa-angle-left pull-right"></i>
	                    </a>
	                    <ul class="treeview-menu">
			            	<?php if($this->ion_auth->in_group("ven_ven_prod")): ?>
								<li id="venta_prod">
									<a class="ajax-link" href="<?php echo base_url();?>ventas/views/cons_ventas"> <i class="fa fa-shopping-cart"></i>
										Venta de Productos</span>
									</a>
								</li>
							<?php endif ?>
							<?php //if($this->ion_auth->in_group("ven_crono")): ?>
								<!--<li id="cron_pago">
									<a class="ajax-link" href="<?php //echo base_url();?>ventas/views/cronogramas"> <i class="fa fa-calendar"></i>
										Cronograma de Pago</span>
									</a>
								</li>-->
							<?php //endif ?>
							<?php //if($this->ion_auth->in_group("ven_deud_mor")): ?>
								<!--<li id="mor_deu">
									<a class="ajax-link" href="<?php //echo base_url();?>ventas/Views/clientes_morosos">
										<i class="fa fa-frown-o"></i>
										Morosos y Deudores</span>
									</a>
								</li>-->
							<?php //endif ?>
							<?php //if($this->ion_auth->in_group("ven_tarj_cred")): ?>
								<!--<li id="tarj_cred">
									<a class="ajax-link" href="<?php //echo base_url();?>ventas/views/tarjetascreditos">
										<i class="fa fa-credit-card"></i>Linea de Crédito</span>
									</a>
								</li>-->
							<?php //endif ?>
							<?php if($this->ion_auth->in_group("ven_client")): ?>
								<li id="clientes">
									<a class="ajax-link" href="<?php echo base_url();?>ventas/views/clientes">
										<i class="fa fa-group"></i>
										Clientes</span>
									</a>
								</li>
							<?php endif ?>
							<?php if($this->ion_auth->in_group("ven_movi")): ?>
							<li id="movimientos">
								<a class="ajax-link" href="<?php echo base_url();?>ventas/views/movimientos">
									<i class="fa fa-money"></i>
									Movimientos</span>
								</a>
							</li>
							<?php endif ?>
							<?php if( $this->session->userdata('caja')["cCajaEstado"] === "1"){  ?>
								<li id="cuadre_caja">
									<a class="ajax-link" href="<?php echo base_url();?>ventas/views/cuadre_caja">
										<i class="fa  fa-inbox"></i>
										Cuadre de Caja</span>
									</a>
								</li>		
							<?php }else{ ?>
							<li id="cuadre_caja">
									<a class="ajax-link" data-target="#modal_iniciecaja" data-toggle="modal" >
										<i class="fa  fa-inbox"></i>
										Cuadre de Caja</span>
									</a>
								</li>
							<?php } ?>
							<?php //if($this->ion_auth->in_group("ven_inicie_caja")): ?>
								<li id="inicie_caja">
									<a class="ajax-link" href="<?php echo base_url();?>ventas/views/inicie_caja">
										<i class="fa  fa-hdd-o"></i>
										Inicio/Cierre de Caja</span>
									</a>
								</li>		
							<?php //endif ?>
							<?php if($this->ion_auth->in_group("ven_rep_tiendzon")): ?>
							<li id="ventas_rep">
								<a class="ajax-link" href="<?php echo base_url();?>ventas/views/reporte_ventas">
									<i class="fa fa-bar-chart-o"></i>
									Reporte de Ventas Tienda/Zona</span>
								</a>
							</li>
							<?php endif ?>
							<?php //if($this->ion_auth->in_group("ven_rep_clienzon")): ?>
							<!--<li id="clienteszonas_rep">
								<a class="ajax-link" href="<?php //echo base_url();?>ventas/views/reporte_zonas">
									<i class="fa fa-bar-chart-o"></i>
									Reporte Clientes/Zona</span>
								</a>
							</li>-->
							<?php //endif ?>
							<?php if($this->ion_auth->in_group("ven_rep_ing_egr")): ?>
							<li id="ingrEgre_rep">
								<a class="ajax-link" href="<?php echo base_url();?>ventas/views/reporte_ing_egr">
									<i class="fa fa-bar-chart-o"></i>
									Reporte Ingreso/Egreso</span>
								</a>
							</li>
							<?php endif ?>
							<?php if($this->ion_auth->in_group("ven_caja")): ?>
								<li id="cuadre_caja">
									<a class="ajax-link" href="#" id="lanza-cuadrecaja">
										<i class="fa  fa-inbox"></i>
										Reporte Cuadre de Caja</span>
									</a>
								</li>		
							<?php endif ?>
							

						</ul>	
	                </li>           
				<?php endif ?>
				<?php if($this->ion_auth->in_group_type(2)): ?>
	                <li id="droplogistica" class="treeview">
	                    <a href="#">
	                        <i class="fa fa-laptop"></i>
	                        <span>Logística</span>
	                        <i class="fa fa-angle-left pull-right"></i>
	                    </a>
	                    <ul class="treeview-menu">
	                    	<?php if($this->ion_auth->in_group("log_prod")): ?>
								<li id="admin_prod">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/productos">
										<i class="fa fa-tags"></i>
										Administrar Productos</span>
									</a>
								</li>
							<?php endif ?>
							<?php if($this->ion_auth->in_group("log_prove")): ?>
								<li id="admin_provee">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/proveedores">
										<i class="fa fa-truck"></i>
										Administrar Proveedores</span>
									</a>
								</li>
							<?php endif ?>
							<?php //if($this->ion_auth->in_group("log_ord_ped")): ?>
								<!--<li id="ord_ped">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cons_pedidos">
										<i class="icon icon-black icon-compose"></i>
										Orden de Pedido</span>
									</a>
								</li>-->
							<?php //endif ?>
							<?php if($this->ion_auth->in_group("log_ord_comp")): ?>
								<li id="ord_com">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cons_ordencompra">
										<i class="fa fa-file-text"></i>
										Orden de Compra</span>
									</a>
								</li>
							<?php endif ?>
							<?php if($this->ion_auth->in_group("log_ing_prod")): ?>
								<li id="ing_prod">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cons_ingresoproductos">
										<i class="fa fa-download"></i>
										Ingreso de Productos</span>
									</a>
								</li>
							<?php endif ?>
							<?php if($this->ion_auth->in_group("log_sal_ini")): ?>
								<li id="saldos">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/saldo_inicial">
										<i class="fa fa-bar-chart-o"></i>
										Saldos</span>
									</a>
								</li>
							<?php endif ?>
							<?php if($this->ion_auth->in_group("log_gen_kardex")): ?>
								<li id="gen_kardex">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/kardex">
										<i class="fa fa-list"></i>
										Generar Kardex</span>
									</a>
								</li>
							<?php endif ?>
							<?php if($this->ion_auth->in_group("log_sal_prod")): ?>
								<li id="sal_prod">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cons_salidaproductos">
										<i class="fa fa-upload"></i>
										Salida de Productos</span>
									</a>
								</li>
							<?php endif ?>
							<?php if($this->ion_auth->in_group("log_ord_com_mat")): ?>
								<li id="ord_mat">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cons_ordencompra_mat">
										<i class="fa fa-file-text"></i>
										Compra Materiales</span>
									</a>
								</li>
							<?php endif ?>
							<!-<?php if($this->ion_auth->in_group("log_rep_sal_prod")): ?> -->
								<!--<li id="rep_sal_prod">
									<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cronogramas">
										<i class="icon icon-black icon-page"></i>
										Reporte Salida Productos</span>
									</a>
								</li> -->
							<!-<?php endif ?>-->
							<?php if($this->ion_auth->in_group("log_cierre_mes")): ?>
								<li id="cierre_mes">
									<a class="ajax-link" href="#" id="lanza-cierremes">
										<i class="fa fa-unlock-alt"></i>Cierre de Mes</span>
									</a>
								</li>
							<?php endif ?>
	                    </ul>
	                </li>
                <?php endif ?>

                <!--<?php if($this->ion_auth->in_group_type(4)): ?>
	                <li id="dropestadistica" class="treeview">
	                    <a href="#">
	                        <i class="fa fa-bar-chart-o"></i>
	                        <span>Estadísticas</span>
	                        <i class="fa fa-angle-left pull-right"></i>
	                    </a>
	                    <ul class="treeview-menu">
	                    	<?php /*if($this->ion_auth->in_group("")):*/ ?>
								<li id="ventas_por_cliente">
									<a class="ajax-link" href="<?php echo base_url();?>estadisticas/views/ventas_por_cliente">
										<i class="fa fa-group"></i>
										Ventas por Clientes</span>
									</a>
								</li>
							<?php /*endif */?>
							<?php /*if($this->ion_auth->in_group("")):*/ ?>
								<li id="vent_prod">
									<a class="ajax-link" href="<?php echo base_url();?>estadisticas/views/ventas_por_producto">
										<i class="fa fa-shopping-cart"></i>
										Ventas por Productos</span>
									</a>
								</li>
							<?php /*endif */?>
							
							<?php /*if($this->ion_auth->in_group("")):*/ ?>
								<li id="ingr_egre_gen">
									<a class="ajax-link" href="<?php echo base_url();?>estadisticas/views/ingr_egr_general">
										<i class="fa fa-retweet"></i>
										Ingresos y Egresos Generales</span>
									</a>
								</li>
							<?php /*endif*/ ?>
							<?php /*if($this->ion_auth->in_group("")):*/ ?>
								<li id="vent_by_cli_prod">
									<a class="ajax-link" href="<?php echo base_url();?>estadisticas/views/vent_by_cli_prod">
										<i class="fa  fa-puzzle-piece"></i>
										Ventas por Cliente y Producto</span>
									</a>
								</li>
							<?php /*endif*/ ?>
							<?php /*if($this->ion_auth->in_group("")):*/ ?>
								<li id="ingr_egre_by_prod">
									<a class="ajax-link" href="<?php echo base_url();?>estadisticas/views/ingr_egre_by_prod">
										<i class="fa  fa-refresh"></i>
										Ingresos y Egresos por Producto</span>
									</a>
								</li>
							<?php /*endif*/ ?>
							
	                    </ul>
	                </li>
                <?php endif ?>-->
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<!--MODAL-->
<div class="modal fade" id="modal_iniciecaja">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Atención</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger alert-dismissable">
					<p>
						Necesita Iniciar Caja
					</p>
				</div>
			</div>
			<div class="modal-footer clearfix">
				<a href="#" class="btn" data-dismiss="modal">Aceptar</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalcierremes">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Cierre de Mes </h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger alert-dismissable">
					<p>
						¿Está seguro que desea cerrar el mes?
					</p>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-flat btn-default" data-dismiss="modal">No</a>
				<a href="#" class="btn btn-flat btn-primary" id="btn-cierremes">Sí</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>




<div class="modal fade" id="aftercierremes">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Cierre Exitoso!</h4>
			</div>
			<div class="modal-body">
				<p>¡El cierre de mes se ha realizado exitosamente!</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
			</div>
		</div>
	</div>
</div>

<!----MODAL CUANDRE DE CAJA-->
<div class="modal fade" id="modalcuadrecaja">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">EXPORTAR</h4>
			</div>
			<div class="modal-body">
				<form method="post" target="_blank" id="FormCuadreCaja" action-1="">
					<input type="hidden" name="table_cuadrecaja" id="table_cuadrecaja"/>
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-lg-4 control-label" for="datecuadrecaja">Fecha</label>
							<div class="col-lg-5">
								<div class="input-group">
									<input id="fecha01" name="fecha01" type="text" class="form-control datepicker"  style="margin: 0 18px 0 0;">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
					</div> 
					<p>Elija el formato en que desea exportar el Cuadre de Caja</p>
					<div class="row">
						<div class="col-lg-6">
				            <!-- small box -->
				            <div class="small-box bg-yellow">
				                <div class="inner">
				                    <h3>
				                        PDF
				                    </h3>
				                    <p>
				                        .pdf
				                    </p>
				                </div>
				                <div class="icon">
				                    <i class="ion ion-document-text"></i>
				                </div>
				                <a href="#" id="pdfcuadrecaja" class="small-box-footer">
				                    Exportar <i class="fa fa-arrow-circle-right"></i>
				                </a>
				            </div>
				        </div><!-- ./col -->
						<div class="col-lg-6">
				            <!-- small box -->
				            <div class="small-box small-box bg-green">
				                <div class="inner">
				                    <h3>
				                        Excel
				                    </h3>
				                    <p>
				                       .xls
				                    </p>
				                </div>
				                <div class="icon">
				                    <i class="ion ion-pie-graph"></i>
				                </div>
				                <a href="#" id="xlscuadrecaja" class="small-box-footer">
				                    Exportar <i class="fa fa-arrow-circle-right"></i>
				                </a>
				            </div>
				        </div><!-- ./col -->
					</div>
				</form>
			</div>
		</div>
	</div>
</div>