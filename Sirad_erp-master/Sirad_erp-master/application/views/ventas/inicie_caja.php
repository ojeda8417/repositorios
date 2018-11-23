<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Inicio/Cierre Caja
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>ventas">Ventas</a></li>
            <li class="active">Inicie/Cierre Caja</li>
        </ol>
    </section>
        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">                  
                        <form id="InicieCajaForm" class="form-horizontal" action-1="<?php echo base_url();?>ventas/inicie_caja/registrar" action-2="<?php echo base_url(); ?>ventas/inicie_caja/cierre_caja">                            
                            <div class="row">
                                <div class="form-horizontal col-lg-12 col-lg-offset-0"><!--6-2-->
                                    <legend>APERTURA DE CAJA</legend>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label" for="nom_caja">Caja</label><!--4-8-->
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <input class="form-control " id="caja" name="caja" value="CAJA PRINCIPAL" readonly type="text" data-prompt-position="topLeft">
                                                <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if( $this->session->userdata('caja')["cCajaEstado"] === "1"):?>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label" for="fec-caja">Fecha </label>
                                        <div class="col-lg-3">
                                            <div class="input-group">                                                   
                                                <input readonly type="text" placeholder="dd/mm/YYYY"  maxlength="10" title="Debe ingresar un formato de fecha correcto" class="form-control datepicker validate[required,custom[date]]" id="fecApertura" name="fecApertura" value="<?php echo date("d/m/Y"); ?>" >
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label" for="valor">Importe</label>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <input readonly class="form-control" id="importe" name="importe" type="text" data-prompt-position="topLeft" value="<?php echo $this->session->userdata('caja')["nCajaSaldoInicial"]; ?>">
                                                <span class="input-group-addon">0.0</span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="col-lg-offset-8">
                                            <div class="col-lg-6">    
                                                <button id="Abrir_caja" disabled="true" type="button" class="col-lg-12 btn btn-info btn-flat btn-abrirc">   Abrir</button>
                                            </div>    
                                            <div class="col-lg-6">                              
                                                <button id="Cerrar_caja" type="button" class="col-lg-12 btn btn-success btn-flat" >Cerrar</button>
                                            </div>  
                                        </div> 
                                    </div>                               
                            
                                    <?php else : ?>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label" for="fec-caja">Fecha </label>
                                        <div class="col-lg-3">
                                            <div class="input-group">                            
                                                <input  type="text" placeholder="dd/mm/YYYY"  maxlength="10" title="Debe ingresar un formato de fecha correcto" class="form-control datepicker validate[required,custom[date]]" id="fecApertura" name="fecApertura" value="<?php echo date("d/m/Y"); ?>" >
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                                </div>                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label" for="valor">Importe</label>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <input class="form-control validate[required,custom[onlyNumberSp]]" id="importe" name="importe" type="text" data-prompt-position="topLeft">
                                                <span class="input-group-addon">0.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-8">
                                            <div class="col-lg-6">    
                                                <button id="Abrir_caja" type="button" class="col-lg-12 btn btn-info btn-flat btn-abrirc">   Abrir</button>
                                            </div>    
                                            <div class="col-lg-6">                              
                                                <button disabled="true" id="Cerrar_caja" type="button" class="col-lg-12 btn btn-success btn-flat" >Cerrar</button>
                                            </div>  
                                        </div> 
                                    </div>
                            
                                    <?php endif ?>
                                </div>
                            </div>
                        </form>
                        <?php if( $this->session->userdata('trabajador')["nCargoDesc"] === "ADMINISTRADOR" ){ ?>
                        <div class="box-body table-responsive">
                            <legend>CONSULTA</legend>
                                <table id="caja_table" class="table table-bordered table-striped"  data-source="<?php echo base_url();?>ventas/servicios/getCaja">
                                    <thead>
                                        <tr>
                                            <th width="14%">Nombre Local</th>
                                            <th width="13%">Fecha Apertura</th>
                                            <th width="13%">Fecha Cierre</th>
                                            <th width="25%">Saldo Final</th>
                                            <th width="13%">Faltante/Sobrante</th>
                                            <th width="12%">Saldo Final Caja</th>
                                            <th width="10%">Estado</th>
                                        </tr>
                                    </thead>

                                    <thead>
                                        <tr>
                                            <th class="input">
                                                <input type="text" placeholder="Nombre Local" class="search_init form-control" />
                                            </th>
                                            <th class="input">
                                                <input type="text" placeholder="Fecha Apertura" class="search_init form-control" />
                                            </th>
                                            <th class="input">
                                                <input type="text" placeholder="Fecha Cierre" class="search_init form-control" />
                                            </th>
                                            <th class="input">
                                                <input type="text" placeholder="Saldo Final" class="search_init form-control" />
                                            </th>
                                            <th class="input">
                                                <input type="text" placeholder="Faltante/Sobrante" class="search_init form-control" />
                                            </th>
                                            
                                            <th></th>
                                            <th class="customselect" nrocol="6">
                                                <select class="form-control">
                                                    <option value="">Todos</option>
                                                    <option value="Anulado">Anulado</option>
                                                    <option value="Aperturado">Aperturado</option>
                                                    <option value="Cerrado">Cerrado</option>                                            
                                                </select>
                                            </th>                                   
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                        </div><!-- /.box-body table-responsive-->
                        <?php } ?>
                    </div>
                </div> 
                <div>
                 <form method="post" id="CreatePDFForm" target="_blank">
                    <input type="hidden" name="title" id="title"/>
                    <input type="hidden" name="table_caja" id="table_caja" value=""/>
                    <input type="hidden" name="table_cajamovi" id="table_cajamovi" value=""/>
                 </form>
                </div> 
            </div>
        </div>
    </section>
</aside>
</div>




