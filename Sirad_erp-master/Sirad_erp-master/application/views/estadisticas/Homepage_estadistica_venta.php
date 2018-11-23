<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Estadísticas
            <small>Opciones</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li class="active">Estadísticas</li>
        </ol>
    </section>
    <section class="content">
    
    <div class="row">
        <?php /*if($this->ion_auth->in_group("ven_ven_prod")):*/ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>
                        Ventas 
                    </h3>
                    <p>
                       Por Cliente
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios7-people"></i>
                </div>
                <a href="<?php echo base_url();?>estadisticas/views/ventas_por_cliente" class="small-box-footer">
                    Administrar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <?php /*endif*/ ?>
        
        <?php /*if($this->ion_auth->in_group("ven_client")):*/ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        Ventas 
                    </h3>
                    <p>
                        Por Producto
                    </p>
                </div>
                <div class="icon">
                    <i class="ion-android-inbox"></i>
                </div>
                <a href="<?php echo base_url();?>estadisticas/views/ventas_por_producto" class="small-box-footer">
                    Administrar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <?php /*endif */?>

        <?php /*if($this->ion_auth->in_group("ven_client")):*/ ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        Ventas 
                    </h3>
                    <p>
                        Por Cliente y Productos
                    </p>
                </div>
                <div class="icon">
                    <i class="ion-compose"></i>
                </div>
                <a href="<?php echo base_url();?>estadisticas/views/vent_by_cli_prod" class="small-box-footer">
                    Administrar <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <?php /*endif */?>
             
        
    </div><!-- /.row -->
    <!-- Small boxes (Stat box) -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->