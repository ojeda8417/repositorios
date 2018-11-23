	<aside class="right-side">
		<section class="content-header">
        <h1>
            Administración
            <small>Opciones</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li class="active">Administración</li>
        </ol>
    </section>
    <section class="content">
			 <div class="row">
			 	<?php if($this->ion_auth->in_group("admin_const")): ?>
		     	<div class="col-lg-3 col-xs-6">
		        	<div class="small-box bg-aqua">
		        		<div class="inner">
	                        <h3>Constantes</h3>
	                        <p>Registrar y Editar</p>
	                    </div>
	                    <div class="icon">
	                        <i class="ion-bookmark"></i>
	                    </div>
	                    <a href="<?php echo base_url();?>administracion/views/constantes" class="small-box-footer">
	                        Administrar <i class="fa fa-arrow-circle-right"></i>
	                    </a>
		            </div>
		        </div>
		        <?php endif ?>
		        <?php if($this->ion_auth->in_group("admin_trab")): ?>
		        <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Trabajadores</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-social"></i>
                        </div>
                        <a href="<?php echo base_url();?>administracion/views/trabajadores" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
           		</div>
           		 <?php endif ?>
           		 <?php if($this->ion_auth->in_group("admin_us")): ?>
           		<div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>Usuarios</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-person-stalker"></i>
                        </div>
                        <a href="<?php echo base_url();?>
						administracion/views/usuarios" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php endif ?>
                <?php if($this->ion_auth->in_group("admin_local")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>Locales</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-home"></i>
                        </div>
                        <a href="<?php echo base_url();?>
						administracion/views/locales" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                 <?php endif ?>
		   </div>
		   <div class="row">
		   	<?php if($this->ion_auth->in_group("admin_cargo")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                    	<div class="inner">
                            <h3>Cargos</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-paperclip"></i>
                        </div>
                        <a href="<?php echo base_url();?>
					administracion/views/cargos" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php endif ?>
                <?php if($this->ion_auth->in_group("admin_categ")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Categorías y Tipos</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-social-buffer"></i>
                        </div>
                        <a href="<?php echo base_url();?>
						administracion/views/categorias" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php endif ?>
                <?php if($this->ion_auth->in_group("admin_marca")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>Marcas</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-ios7-pricetag"></i>
                        </div>
                        <a href="<?php echo base_url();?>
						administracion/views/marcas" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php endif ?>
                <?php if($this->ion_auth->in_group("admin_mon")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>Tipo Moneda</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-ios7-calculator"></i>
                        </div>
                        <a href="<?php echo base_url();?>administracion/views/tipoMonedas" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php endif ?>
                <?php //if($this->ion_auth->in_group("admin_zona")): ?>
                <!--<div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3>Zonas</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-flag"></i>
                        </div>
                        <a href="<?php //echo base_url();?>
						administracion/views/cons_zonas" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>-->
               <?php //endif ?>
			</div>
			 <div class="row">
			 	<?php //if($this->ion_auth->in_group("admin_zonpers")): ?>
				<!--<div class="col-lg-3 col-xs-6">
		        	<div class="small-box bg-yellow">
		        		<div class="inner">
	                        <h3>Zona Personal</h3>
	                        <p>Registrar y Editar</p>
	                    </div>
	                    <div class="icon">
	                        <i class="ion-person"></i>
	                    </div>
	                    <a href="<?php //echo base_url();?>
						administracion/views/zona_personal" class="small-box-footer">
	                        Administrar <i class="fa fa-arrow-circle-right"></i>
	                    </a>
		            </div>
		        </div>-->
		        <?php //endif ?>
		        <?php if($this->ion_auth->in_group("admin_igv")): ?>
		        <div class="col-lg-3 col-xs-6">
		        	<div class="small-box bg-red">
		        		<div class="inner">
	                        <h3>Tipo IGV</h3>
	                        <p>Registrar y Editar</p>
	                    </div>
	                    <div class="icon">
	                        <i class="ion-pricetags"></i>
	                    </div>
	                    <a href="<?php echo base_url();?>
						administracion/views/tipoIGV" class="small-box-footer">
	                        Administrar <i class="fa fa-arrow-circle-right"></i>
	                    </a>
		            </div>
		        </div>
		         <?php endif ?>
                 <?php if($this->ion_auth->in_group("admin_backup")): ?> 
                      <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-maroon">
                            <div class="inner">
                                <h3>Backup</h3>
                                <p>Obtener backups</p>
                            </div>
                            <div class="icon">
                                <i class="ion-ios7-locked"></i>
                            </div>
                            <a href="<?php echo base_url();?>administracion/servicios/obtenerbakcups" class="small-box-footer">
                                Administrar <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endif ?>
                <?php if($this->ion_auth->in_group("admin_ofert")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Ofertas</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-promotion"></i>
                        </div>
                        <a href="<?php echo base_url();?>administracion/views/ofertas" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php endif ?>
                <?php if($this->ion_auth->in_group("admin_ofert")): ?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>Materiales</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-promotion"></i>
                        </div>
                        <a href="<?php echo base_url();?>administracion/views/material" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php endif ?>
                <?php /*if($this->ion_auth-->in_group("admin_ofert")): */?>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>Conf. Documentos</h3>
                            <p>Registrar y Editar</p>
                        </div>
                        <div class="icon">
                            <i class="ion-social-buffer"></i>
                        </div>
                        <a href="<?php echo base_url();?>administracion/views/config_doc" class="small-box-footer">
                            Administrar <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>  
                <?php /*endif*/ ?>
			 </div>              
		</section>
	</aside>
</div>
	