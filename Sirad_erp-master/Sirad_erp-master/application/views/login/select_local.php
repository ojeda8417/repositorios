	<div class="form-box" id="login-box">
        <div class="header">Bienvenido</div>
        <form method="post">
            <div class="body bg-gray">
		        <div class="alert alert-info">
					Por favor seleccione el local a adminsitrar.
				</div>
                <div class="input-prepend">
					<span class="add-on"><i class="icon-home"></i></span>
					<select class="form-control" name="local">
						<?php foreach ($locales as $local):?>
							<option value="<?php echo $local["nLocal_id"]?>"><?php echo $local["cLocalDesc"];?></option>
						<?php endforeach ?>
					</select>
				</div>
            </div>
            <div class="footer">                                                               
                <button type="submit" class="btn bg-light-blue btn-block">Ingresar</button>  
                
                <!--p><a href="#">I forgot my password</a></p-->
            </div>
        </form>
    </div>