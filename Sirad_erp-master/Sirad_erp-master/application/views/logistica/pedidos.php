		<noscript>
		<div class="alert alert-block span10">
			<h4 class="alert-heading">Warning!</h4>
			<p>
				Necesitas tener
				<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
				habilitado para usar este sitio.
			</p>
		</div>
	</noscript>


	<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>logistica/">Logística</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>logistica/views/cons_pedidos/">Pedidos</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>LISTA DE PEDIDOS</h2>
						<div class="box-icon">
							<a href="<?php echo base_url();?>logistica/views/reg_pedidos/" class="btn btn-round" alt="Registrar Pedido"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div id="PedidoForm" name="PedidoForm" action-1="<?php echo base_url();?>logistica/views/ver_pedidos/">
					</div>
					<div class="box-content">
						<table id="pedidos_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/servicios/getOrdenPedido/">
						  	<thead>
							  	<tr>
									<th>Registrador</th>
								  	<th>N° Ord. Pedido</th>
								  	<th>Fecha de Registro</th>
								  	<th>Fecha de Entrega</th>
								  	<th>Local</th>
							  	</tr>
						  	</thead>   
						  	<tbody>
						  	</tbody>
					  </table>       
					</div>
				</div><!--/span-->
					<div class="modal hide fade" id="EliminarPedidoAlert">
						<form action="" method="post" id="EliminarPedidoForm">
							<div class="modal-header">
								<h2><i class="icon-alert icon-red icon32"></i> Eliminar</h2>
							</div>
							<div class="modal-body">
								<div class="alert alert-error">
									¿Esta seguro de que desea <strong>ELIMINAR</strong> el Pedido?
								</div>
								<input type="hidden" name="idpedprod" id="idpedprod">		
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<input type="submit" value="Eliminar" class="btn btn-primary">
							</div>
						</form>
					</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->