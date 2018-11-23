
<aside class="right-side">
	<section class="content-header">
		<h1>
		   Logística
		    <small>Opciones</small>
		</h1>
		<ol class="breadcrumb">
		    <li><a href="<?php echo base_url();?>">Home</a></li>
		    <li class="active">Logística</li>
		</ol>
	</section>
	<section class="content">
		 <div class="row">
            <?php if($this->ion_auth->in_group("log_prod")): ?>
		 	<div class="col-lg-3 col-xs-6">
	        	<div class="small-box bg-aqua">
	        		<div class="inner">
                        <h3>Productos</h3>
                        <p>Registrar y Editar</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-inbox"></i>
                    </div>
                    <a href="<?php echo base_url();?>logistica/views/productos" 
                        class="small-box-footer">
                        Administrar <i class="fa fa-arrow-circle-right"></i>
                    </a>
	            </div>
	        </div>
            <?php endif ?>
            <?php if($this->ion_auth->in_group("log_prove")): ?>
		        <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Proveedores</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-social"></i>
                        </div>
                        <a href="<?php echo base_url();?>logistica/views/proveedores" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
           		</div>
            <?php endif ?>
             <?php if($this->ion_auth->in_group("log_sal_ini")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>Saldo Inicial</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-clipboard"></i>
                        </div>
                        <a href="<?php echo base_url();?>logistica/views/saldo_inicial" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif ?>
            <?php //if($this->ion_auth->in_group("log_ord_ped")): ?>
           		<!--<div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>Pedidos</h3>
                            <p>Orden de Pedidos</p>
                        </div>
                        <div class="icon">
                            <i class="ion-compose"></i>
                        </div>
                        <a href="<?php //echo base_url();?>logistica/views/cons_pedidos" 
                            class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>-->
            <?php //endif ?>
            <?php if($this->ion_auth->in_group("log_ord_comp")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Compras</h3>
                            <p>Orden de Compras</p>
                        </div>
                        <div class="icon">
                            <i class="ion-compose"></i>
                        </div>
                        <a href="<?php echo base_url();?>logistica/views/cons_ordencompra" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif ?>
		 </div>
		  <div class="row">
            <?php if($this->ion_auth->in_group("log_ing_prod")): ?>
		  	<div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                    	<div class="inner">
                            <h3>Ingreso</h3>
                            <p>Ingreso de Producto</p>
                        </div>
                        <div class="icon">
                            <i class="ion-log-in"></i>
                        </div>
                        <a href="<?php echo base_url();?>logistica/views/cons_ingresoproductos" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
             <?php endif ?>
             <?php if($this->ion_auth->in_group("log_sal_prod")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Salida</h3>
                            <p>Salida de Productos</p>
                        </div>
                        <div class="icon">
                            <i class="ion-log-out"></i>
                        </div>
                        <a href="<?php echo base_url();?>logistica/views/cons_salidaproductos" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif ?>           
            <?php if($this->ion_auth->in_group("log_gen_kardex")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>Kardex</h3>
                            <p>Generar Kardex</p>
                        </div>
                        <div class="icon">
                            <i class="ion-ios7-copy"></i>
                        </div>
                        <a href="<?php echo base_url();?>logistica/views/kardex" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif ?>
		  </div>
	</section>

</aside>
</div>