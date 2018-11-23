<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class facturacion extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function sendemail_fact()
    {   
        $this->load->model('ventas/venta_model','venm');
        $this->load->model('ventas/detalleventa_model','detvenm');
        $nVenta_id = $this->input->post('nVenta_id');
        $venta = $this->venm->get_venta($nVenta_id);       
        $detventa = $this->detvenm->get_detalles($nVenta_id);
        $ClienteCorreo = $this->input->post('email_to');         
        $from = $this->ion_auth->user()->row()->email; 

        $html = '<!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <style type="text/css">
                .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
                    min-height: 1px;
                    padding-left: 15px;
                    padding-right: 15px;
                    position: relative;
                }
            </style>
        </head>
        <body>            
            <div class="content invoice" id="resumen_venta" style="background: none repeat scroll 0 0 #FFFFFF; margin: 10px auto; position: relative; width: 90%; padding: 20px 15px;">                    
                <!-- title row -->
                <div class="row" style="margin-left: -15px;margin-right: -15px;">
                    <div class="col-xs-12" style="width: 100%; float: left;">
                        <h2 class="page-header" style="font-size: 22px; margin: 10px 0 20px; border-bottom: 1px solid #EEEEEE; padding-bottom: 9px;">
                            <i class="fa fa-globe"></i> CLM Developers SAC
                            <small class="pull-right" style="float: right !important; color: #666666; display: block; margin-top: 5px;">Fecha: 12/05/2014</small>
                        </h2>                            
                    </div><!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info" style="margin-left: -15px;margin-right: -15px;">
                    <div class="col-sm-4 invoice-col" style="width: 33.3333%; float: left;">
                        De
                        <address>
                            <b>RUC:</b> 20559603563<br>
                            <strong>CLM Developers, SAC.</strong><br>
                            Bernardo Alcedo 187<br>
                            Urb. San Fernando, Trujillo<br>
                            <i class="fa fa-phone" style="content: "";"></i> +51 999494821 / +51 044 612874<br>
                            <i class="fa fa-envelope" style="content: "";"></i> contacto@clmdevelopers.com
                        </address>
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col" style="width: 33.3333%; float: left;">
                        <b>Cliente:</b>
                        <address>
                            <strong id="clienteR">'.$venta['name'].'</strong>
                            <address>
                           '.$venta['Cliente_direccion'].'
                            </address>
                        </address>
                        <strong>Ruc:</strong>
                        <address>
                            <strong id="rucR"> '.$venta['cClienteRuc'].'</strong><br>
                        </address>
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col" style="width: 33.3333%; float: left;">
                        <b>Tipo Comprobante</b> <br>
                        <address>
                                <strong id="tipdocR">'.$venta['tipoComprobante'].'</strong><br>
                        </address>
                        <b>Serie - Numero</b> <br>
                        <address>
                            '.$venta['cDocSerie'].' - '.$venta["cDocNumero"].' 
                                <strong id="sercomR"></strong><br>
                        </address>
                        <b>Fec. Emisión:</b>'.date("d/m/Y").'<br>
                        <b>Vendedor:</b>'.$venta['Vendedor'].'<br>
                        <b>Tipo Pago:</b>'.$venta['tipo_pago'].'<br><br>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- TABLA DE PRODUCTOS POR COMPRAR aqui -->
                <!-- Table row -->
                <div class="row" style="margin-left: -15px;margin-right: -15px;">
                    <div class="col-xs-12 table-responsive" style="width: 100%; float: left;">
                        <table class="table table-striped" id="tabla_resumen_productos" style="background-color: rgba(0, 0, 0, 0); max-width: 100%; border-collapse: collapse; border-spacing: 0; margin-bottom: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="border-bottom: 2px solid #DDDDDD; vertical-align: bottom; text-align: left; border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">Código</th>
                                    <th style="border-bottom: 2px solid #DDDDDD; vertical-align: bottom; text-align: left; border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">Producto</th>
                                    <th style="border-bottom: 2px solid #DDDDDD; vertical-align: bottom; text-align: left; border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">Cantidad</th>
                                    <th style="border-bottom: 2px solid #DDDDDD; vertical-align: bottom; text-align: left; border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">Precio</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($detventa as $value) {                                
                                $html .='<tr>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        '.$value['codBarra'].'</td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                    '.$value["Producto"].'</td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                    '.$value["cant_prod"].'</td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        '.$value["Total"].'</td>
                                </tr> ';
                             }                                
                                $html .='</tbody>
                      
                            
                        </table>
                    </div>
                </div>
                <br>
                <!-- END TABLA DE PRODUCTOS -->
                <div class="row" style="margin-left: -15px;margin-right: -15px;">
                    <div class="col-xs-6 col-lg-6" style="width: 50%; float: left; box-sizing: border-box;"></div>
                    <div class="col-xs-6 col-lg-6" style="width: 50%; float: right; box-sizing: border-box;">
                        <table class="table" style="background-color: rgba(0, 0, 0, 0); max-width: 100%; border-collapse: collapse; border-spacing: 0; margin-bottom: 0; width: 100%;">
                            <tbody><tr>
                                <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                    <strong>Subtotal</strong>
                                </td>
                                <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                    '.$venta["SubTotal"].'</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        <strong>Descuento</strong>
                                    </td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        '.$venta["Descuento"].'</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        <strong>IGV</strong>
                                    </td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        '.$venta["TipoIGV"].'</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        <strong>Total</strong>
                                    </td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        '.$venta["Total"].'</td>
                                </tr>
                        </tbody></table>
                    </div>
                </div>
            </div>
        </body>
        </html>';

        $para           =  $ClienteCorreo;
        $subject        =  "Facturación de su venta";
        $msg            =   $html;                            
        $mainheaders    =  'Content-type: text/html; charset=utf-8' . "\r\n";
        $mainheaders    .=  'From: SIRAD <'.$from.'>' . "\r\n";
        
        
             
      
        $resultado = mail ($para, $subject, $msg, $mainheaders, "-f ".$from);

        if($resultado){
           echo 'Enviado! :)'.$html;       
        }        
        else
            echo 'Error! :(';

    }
}
?>