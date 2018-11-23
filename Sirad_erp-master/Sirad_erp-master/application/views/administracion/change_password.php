<aside class="right-side">
	<section class="content-header">
		<h1>Contraseña<small>Cambiar</small></h1>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>administracion">Administracion</a>
				</li>
				<li class="active">Cambiar Contraseña</li>
			</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h4 class="box-title">Cambiar Contraseña</h4>
					</div>
					<div class="box-body">
						<form id="ChangePasswordForm" action-1="<?php echo base_url();?>
						auth/change_password">
							<div class="form-horizontal box-content">
								<div class="form-group">
									<label for="conactual" class="col-lg-4 control-label">Contraseña Actual</label>
									<div class="col-lg-4">		
										<input class="form-control focused" id="oldpassword" name="oldpassword" type="password"></div>
								</div>
								<div class="form-group">
									<label for="password" class="col-lg-4 control-label">Contraseña</label>
									<div class="col-lg-4">
										<input class="form-control focused validate[required] validate[minSize[8]]" id="password" name="password" type="password"></div>
								</div>
								<div class="form-group">
									<label for="repassword" class="col-lg-4 control-label">Re. Contraseña</label>
									<div class="col-lg-4">
										<input class="form-control focused validate[equals[password]]" type="password" name="password2" id="password2"></div>
								</div>
							</div>							
						</form>
					</div>
					<div class="box-footer">						
						<div class="form-group col-lg-offset-5">
							<button class="btn btn-success disabled" type="reset" >Cancelar</button>
							<button id="btn-guardar" name="btn-reg-lineacreditos" class="btn btn-primary">Registrar</button>
							
						</div>
					</div>
					<!--<div class="box-footer">						
						<div class="form-group">							
							<button type="reset" class="btn btn-cancelar btn-flat col-lg-3" >Cancelar</button>							
							<button id="btn-guardar" type="button" class="btn btn-primary btn-flat col-lg-3">Guardar</button>
												
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</section>
</aside>
</div>
<!--/fluid-row-->