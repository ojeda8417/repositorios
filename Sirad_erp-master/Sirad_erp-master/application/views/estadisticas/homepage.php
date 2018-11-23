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
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                           Logística
                        </h3>
                        <p>
                           Administrar
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion-ios7-gear"></i>
                    </div>
                    <a href="<?php echo base_url();?>estadisticas/views/homepage_estadistica_logistica" class="small-box-footer">
                        Administrar <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        <?php /*endif*/ ?>
        
        <?php /*if($this->ion_auth->in_group("ven_client")):*/ ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            Ventas
                        </h3>
                        <p>
                            Administrar
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion-ios7-cart"></i>
                    </div>
                    <a href="<?php echo base_url();?>estadisticas/views/homepage_estadistica_venta" class="small-box-footer">
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