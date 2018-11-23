    <div class="form-box" id="login-box">
        <div class="header">Recuperar Contraseña</div>
        <form method="post">
            <div class="body bg-gray">
                <?php if($message != ""): ?>
                    <div class="alert alert-info">
                        <?php echo $message;?>
                    </div>
                <?php endif ?>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="correo electronico">
                </div>
            </div>
            <div class="footer">                                                               
                <button type="submit" class="btn bg-light-blue btn-block">Enviar</button>
            </div>
        </form>
    </div>