<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ventas
            <small>Opciones</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li class="active">Ventas</li>
        </ol>
    </section>
    <section class="content">
    
    <div class="row">
    	<?php if($this->ion_auth->in_group("ven_ven_prod")): ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        Ventas
                    </h3>
                    <p>
                        Crédito, Contado y Separación
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios7-cart-outline"></i>
                </div>
                <a href="<?php echo base_url();?>ventas/views/cons_ventas" class="small-box-footer">
                    Administrar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <?php endif ?>
        <?php //if($this->ion_auth->in_group("ven_crono")): ?>
        <!--<div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        Cronograma
                    </h3>
                    <p>
                       	Pago de Creditos
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-calendar"></i>
                </div>
                <a href="<?php //echo base_url();?>ventas/views/cronogramas" class="small-box-footer">
                    Administrar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>-->
        <?php //endif ?>
        <?php if($this->ion_auth->in_group("ven_client")): ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        Clientes
                    </h3>
                    <p>
                        Registrar y Editar
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios7-people"></i>
                </div>
                <a href="<?php echo base_url();?>ventas/views/clientes" class="small-box-footer">
                    Administrar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <?php endif ?>
        <?php if($this->ion_auth->in_group("ven_movi")): ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        Movimientos
                    </h3>
                    <p>
                        Ingreso y Salida de Dinero
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-arrow-swap"></i>
                </div>
                <a href="<?php echo base_url();?>ventas/views/movimientos" class="small-box-footer">
                    Administrar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <?php endif ?>      
        <?php //if($this->ion_auth->in_group("ven_deud_mor")): ?>
        <!--<div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        Morosos
                    </h3>
                    <p>
                        Clientes Deudores
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-frown-o"></i>
                </div>
                <a href="<?php echo base_url();?>ventas/views/" class="small-box-footer">
                    Administrar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>-->
        <?php //endif ?>
    </div><!-- /.row -->
    <!-- Small boxes (Stat box) -->
    <div class="row">
    	<?php //if($this->ion_auth->in_group("ven_tarj_cred")): ?>
        <!--<div class="col-lg-3 col-xs-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>
                        Tarjeta
                    </h3>
                    <p>
                        Credito Cliente
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-card"></i>
                </div>
                <a href="<?php //echo base_url();?>ventas/views/tarjetascreditos" class="small-box-footer">
                    Administrar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>-->
        <?php //endif ?>
          
    </div><!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->