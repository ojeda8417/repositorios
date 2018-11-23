	<div class="form-box" id="login-box">
        <div class="header"><img src="<?php echo base_url();?>/assets/img/sirad-logo.png" ></div>
        <form method="post">
            <div class="body bg-gray">
                <?php if($message != ""): ?>
                    <div class="alert alert-info">
                        <?php echo $message;?>
                    </div>
                <?php endif ?>
                <div class="form-group">
                    <input type="text" name="username" id="username" type="text" placeholder="Usuario" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña"/>
                </div>          
                <div class="form-group">
                    <input type="checkbox" name="remember_me"/> Recordar
                </div>
            </div>
            <div class="footer">                                                               
                <button type="submit" class="btn bg-light-blue btn-block">Ingresar</button>  
                
                <p><a href="<?php echo base_url() ?>auth/forgot_password">Olvidé mi contraseña</a></p>
            </div>
        </form>
        <div class="margin text-center">
            <span>Síguenos en nuestras redes sociales</span>
            <br/>
            <a href="https://www.facebook.com/clmdevelopers" target="_blank" class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/clmdevelopers" target="_blank" class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></a>
        </div>
    </div>
