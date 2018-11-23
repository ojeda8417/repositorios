<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <section class="content-header">
        <h1>
            Cuadre de Caja
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>ventas">Ventas</a></li>
            <li class="active">Cuadrar Caja</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">                  
                        <form id="CuadreCajaForm" method="post" class="form-horizontal" action-1="<?php echo base_url();?>ventas/cuadrecaja/cuadre_caja">
                            <div class="row">
                                <div class="col-lg-6">  
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="valor">Saldo Final</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input value="<?php echo $this->session->userdata('caja')["SaldoFinalCaja"] ; ?>" class="form-control" id="saldo" name="saldo" type="text" data-prompt-position="topLeft" readonly>
                                                <span class="input-group-addon">0.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="valor">Ingreso</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input value="<?php echo $ingreso_egreso; ?>" class="form-control validate[required,custom[onlyNumberSp]]" id="ingreso" name="ingreso" type="text" data-prompt-position="topLeft" readonly>
                                                <span class="input-group-addon">S/.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="valor">Egreso</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input value="<?php echo $egreso; ?>" class="form-control validate[required,custom[onlyNumberSp]]" id="egreso" name="egreso" type="text" data-prompt-position="topLeft" readonly>
                                                <span class="input-group-addon">S/.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="size:50% width: 69%; margin-left: 177px;">
                                        <hr>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="valor">Monto Total</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input value="<?php echo $total; ?>" class="form-control validate[required,custom[onlyNumberSp]]" id="total" name="total" type="text" data-prompt-position="topLeft" readonly>
                                                <span class="input-group-addon">S/.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <!--<div style="border-left: 1px solid #ddd;"> --> 
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="valor">Saldo Final en Caja Manual</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input class="form-control validate[required,custom[onlyNumberSp]]" id="saldoFinal" name="saldoFinal" type="text" data-prompt-position="topLeft">
                                                <span class="input-group-addon">0.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="valor">Saldo Faltante/Sobrante</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input class="form-control validate[required,custom[onlyNumberSp]]" id="saldoSobrante" name="saldoSobrante" type="text" data-prompt-position="topLeft">
                                                <span class="input-group-addon">0.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="valor"></label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <div class="col-lg-4 col-lg-offset-8">
                                            <button id="Cuadrar_caja"  type="button" class="col-lg-12 btn btn-info btn-flat btn-abrirc"><i class="icon-plus icon-white"></i>CUADRAR CAJA
                                            </button>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </section>
</aside>
</div>





