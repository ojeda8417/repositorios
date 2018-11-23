<!DOCTYPE html>
<html lang="es_PE">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?> Sirad_erp</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<meta name="description" content="Sirad_erp">
	<meta name="author" content="CLM Developers">
	<?php
		echo link_tag('assets/css/bootstrap.min.css');
        //tag
        echo link_tag('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
        echo link_tag('assets/css/sliptree-bootstrap-tokenfield/bootstrap-tokenfield.css');

		echo link_tag('assets/css/font-awesome.min.css');
		echo link_tag('assets/css/ionicons.min.css');
		//echo link_tag('assets/css/jvectormap/jquery-jvectormap-1.2.2.css');
		//echo link_tag('assets/css/fullcalendar/fullcalendar.css');
		//echo link_tag('assets/css/daterangepicker/daterangepicker-bs3.css');
		//echo link_tag('assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
		echo link_tag('assets/css/datatables/dataTables.bootstrap.css');
		echo link_tag('assets/css/iCheck/all.css');
		echo link_tag('assets/css/AdminLTE.css');

		//echo link_tag('assets/css/DicarsDataTable.css');
		echo link_tag('assets/css/datepicker/css/datepicker.css');
		echo link_tag('assets/css/datatables.actions.css');
		echo link_tag('assets/css/jqueryvalidation/css/validationEngine.jquery.css');		
		echo link_tag('assets/css/prettify.css');

	?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php if(isset($isloginview)) echo 'class="bg-black"'; else echo 'class="skin-blue"'; ?> >
	
	<!-- header logo: style can be found in header.less -->
	<?php if(!isset($isloginview)):?>
	<header class="header" >
	    <a href="<?php echo base_url();?>" class="logo">
	       <img src="<?php echo base_url();?>/assets/img/sirad-logo.png" alt="User Image" width="160px" >
	    </a>
	    <!-- Header Navbar: style can be found in header.less -->
	    <nav class="navbar navbar-static-top" role="navigation" <?php if(isset($isloginview)) echo 'style="display:none"'; ?>>
	        <!-- Sidebar toggle button-->
	        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </a>
	        <div class="navbar-right">
	            <ul class="nav navbar-nav">
	                <!-- User Account: style can be found in dropdown.less -->
	            	<?php $notificaciones = $this->notificaciones_model->getnotificaciones(); ?>	                
                  	<li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning"><?php echo count($notificaciones) ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Tiene <?php echo count($notificaciones) ?> mensajes</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                    	
                                    	<?php foreach ($notificaciones as $key => $notificacion):?>
                                            <?php if ($notificacion["activo"]==1):?>
	                                        <li><!-- start message -->
                                                <a href="<?php echo base_url().$notificacion['url']?>">
                                                    <i class="fa <?php echo $notificacion["icono"]?> info"></i>
                                                    <?php echo $notificacion["area"] ?> - <?php echo $notificacion["mensaje"] ?>
                                                </a>
	                                        </li><!-- end message -->
                                            <?php endif ?>
                                        <?php endforeach ?>                                    
                                    </ul>
                                </li>
                            </ul>
                        </li>
	                <li class="dropdown user user-menu">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                        <i class="glyphicon glyphicon-user"></i>
	                        <span><?php echo  $this->session->userdata('trabajador')["cPersonalNom"];  ?>	<i class="caret"></i></span>
	                    </a>
	                    <ul class="dropdown-menu">
	                        <!-- User image -->
	                        <li class="user-header bg-light-blue">
	                            <img src="<?php echo base_url();?>/assets/img/avatar.png" class="img-circle" alt="User Image" />
	                            <p><?php echo $this->session->userdata('trabajador')["cPersonalNom"]; ?>
	                                
	                                <small><?php echo  $this->session->userdata('trabajador')["nCargoDesc"]; ?></small>
	                            </p>
	                        </li>	                        
	                        <!-- Menu Body -->
	                        <li class="user-body">
	                            <div class="col-xs-6 text-center">
	                                <a href="<?php echo base_url();?>auth/select_local">Seleccionar Local</a>
	                            </div>
	                            <div class="col-xs-6 text-center">
	                                <a href="<?php echo base_url();?>administracion/views/change_password">Cambiar Contraseña</a>
	                            </div>
	                        </li>
	                        <li class="user-footer">
                                <div class="pull-right">
                                    <a href="<?php echo base_url();?>logout" class="btn btn-default btn-flat">Salir</a>
                                </div>
                            </li>
	                    </ul>
	                </li>
	            </ul>
	        </div>
	    </nav>
	</header>
	<?php endif ?>
