<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class ventas extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ventas/venta_model','venm');
		$this->load->model('ventas/detalleventa_model','detvenm');
		$this->load->model('logistica/salproducto_model','salprod');
		$this->load->model('logistica/detsalproducto_model','detsalprod');
		$this->load->model('ventas/ventacredito_model','credm');
		$this->load->model('ventas/ventacronograma_model','cronom');
		$this->load->model('ventas/transaccion_model', "transm");
		$this->load->model('logistica/ingproducto_model','ingpro');
		$this->load->model('logistica/detingproducto_model','detingpro');
		$this->load->model('logistica/producto_model','prodm');
		$this->load->model('ventas/caja_venta_model','cjm');
	}

	public function registrar()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$form = $this->input->post('formulario',true);
			$productos = $this->input->post('productos',true);
			if($form != null)
			{

				$nLocal_id = $this->session->userdata('current_local')["nLocal_id"];
				$nPersonal_id = $this->ion_auth->user()->row()->nPersonal_id;
				$datenow = date("Y-m-d");
				$MontoTrans = $form["total"];
				$DesTrans = "Venta al Contado";
				$Estado = null;

				$id_Caja=$this->session->userdata('caja')["id"];

				if ($form["forma_pago"] == 1) 
					$Estado = '2'; //pagada/cancelada
				else if($form["saldo"] > 0 && $form["forma_pago"] == 3)
					$Estado = '3'; //separada
				else if($form["saldo"] > 0 && $form["forma_pago"] == 2)
					$Estado = '1'; //pendiente/deuda
				else
					$Estado = '0'; //anulada

				$this->db->trans_begin();

				$venta = array(
					"nCliente_id" => $form["cliente_id"],
					"cVentaFecReg" => $datenow,
					"nTipoMoneda"=> $form["tipo_moneda"],
					"nVentaSubTotal" => $form["subtotal"],
					"nVentaDscto" => $form["descuento"],
					"nVentaTipPag" => $form["forma_pago"],
					"cVentaObsv" => $form["observacion"],
					"nVentaTotApag" => $form["total"],
					"nVentaTotAmt" => $form["amortizacion"],
					"nVentaSaldo" => $form["saldo"],
					"nLocal_id" => $nLocal_id,
					"nTipoIGV" => $form["tipo_igv"],
					"cVentaEst" => $Estado
					);

				$nVenta_id = $this->venm->insert($venta,$id_Caja);
				$Caja_Venta=array(
					"nCaja_id"=>$id_Caja,	
					"nVenta_id"=>$nVenta_id	
					);
				$this->cjm->insert($Caja_Venta);

				if($form["forma_pago"] == '3')
				{
					$DesTrans = "Venta Separada";
					$MontoTrans = $form["amortizacion"];
				}
		

				if($form["forma_pago"] != '3')
				{
					$SalProd = array($nPersonal_id,$nLocal_id,2,$nPersonal_id,"Salida por ventas");
					$nSalProd_id = $this->salprod->insert($SalProd);
				}

				if($form["forma_pago"] == '2')
				{
					$Credito = array(
						"nCreditoFormaPag" => $form["forma_pago"],
						"nVenCreditoNCuota" => $form["num_cuotas"],
						"nVenCreditoMontInicial" => $form["amortizacion"],
						"nVenCreditoPPag" => 100/$form["num_cuotas"],
						"nVenta_id" => $nVenta_id,
						"cCreditoEst" => 1
						);
					
					$idCredito = $this->credm->insert($Credito);
					$FechaDiaPago = date_create_from_format('d/m/Y', $form["prim_cuota"]);
					$CronoPago = array();
					for($i = 0 ; $i < $form["num_cuotas"]; $i++)
					{
						$CronoPago[] = array(
							"nCronPagoNroCuota" => $i+1,
							"nCronPagoFecPago" => $FechaDiaPago->format("Y-m-d"),
							"nCronPagoMonCouApg" => $form["montocuota"],
							"nVenCredito_id" => $idCredito,
							);													
						$FechaDiaPago -> modify('+7 day');
					}

					$this->cronom->insert_batch($CronoPago);
						
					$DesTrans = "Venta Credito";
					$MontoTrans = $form["amortizacion"];
				}
				//REGISTRAR EN DOC_VENTA
				if($form["forma_pago"]==1){
					$tipoDoc=$form["tipo_doc_contado"];
				}else{
					$tipoDoc=$form["tipo_doc_credito"];
				}
				
				$fechaEmision=date('Y-m-d');
				$fechaVencimiento=date('Y-m-d');
				$Doc=array(
					'nDocVentaTipDoc'=>$tipoDoc,
					'nVenta_id'=>$nVenta_id,
					'dDocVentaFecEms'=>$fechaEmision,
					'dDocVentaFecVenc'=>$fechaVencimiento	
					);

				$this->venm->insert_doc_venta($Doc);

				$DetalleSalProd = array();

				foreach ($productos as $key => $prod)
				{
					$productos[$key]["nVenta_id"] = $nVenta_id;
					if($form["forma_pago"] != '3')
					{
						$DetalleSalProd[]= array(
							"nSalProd_id" => $nSalProd_id,
							"nProducto_id" => $prod["nProducto_id"],
							"DetSalProdCant" => $prod["nDetVentaCant"],
							"cDetSalProdEst" => 1
							);
					}
				}

				$transaccion = array(
					"nPersonal_id" => $nPersonal_id,
					"nVenta_id" => $nVenta_id,
					"cTransaccionDesc" => $DesTrans,
					"nTransaccionMont" => $MontoTrans,
					"dTransaccionFecReg" => $datenow,
						"nTransaccionTipPag" => $form["forma_pago"]
					);

				$this->transm->insert($transaccion);
				$this->detvenm->insert_batch($productos);

				if($form["forma_pago"] != '3')
					$this->detsalprod->insert_batch($DetalleSalProd);

				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
					$this->output->set_status_header('400');
				}
				else
				{
					$this->db->trans_commit();
				}
			}
			else
				$this->output->set_status_header('400');
		}
		else
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('id'=>$nVenta_id)));
	}

	public function anular()
	{
		if(isset($_POST) && !empty($_POST))
		{
			if ($this->session->userdata('caja')["cCajaEstado"]==1) {		
				
				$nVenta_id = $this->input->post('nVenta_id',true);
				$transAnular = $this->transm->get_byVenta($nVenta_id);

				$nLocal_id = $this->session->userdata('current_local')["nLocal_id"];
				$nPersonal_id = $this->ion_auth->user()->row()->nPersonal_id;
				$datenow = date("Y-m-d");

				$productos = $this->detvenm->get_detalles($nVenta_id);
				$DetalleIngProd = array();

				$IngProd = array(
					"nPersonal_id" => $nPersonal_id,
					"nLocal_id" => $nLocal_id,
					"nIngProdMotivo" => 2,
					"cIngProdDocSerie" => "0000",
					"cIngProdDocNro" => "00000000",
					"cIngProdObsv" => "Anulacion de Ventas");

				$nIngreso_id = $this->ingpro->insert($IngProd);

				foreach ($productos as $key => $prod)
				{
					$auxprod = $this->prodm->get_producto($prod["nProducto_id"]);

					$DetalleIngProd[]= array(
						"nIngProd_id" => $nIngreso_id,
						"nProducto_id" => $prod["nProducto_id"],
						"nDetIngProdCant" => $prod["cant_prod"],
						"nDetIngProdPrecUnt" => $auxprod["nProductoPCosto"],
						"nDetIngProdTot" => $auxprod["nProductoPCosto"]*$prod["cant_prod"],
						"nDetOrdCompra" => 0
						);
				}
				$this->detingpro->insert_batch($DetalleIngProd);

				$transaccion = array(
						"nPersonal_id" => $nPersonal_id,
						"nVenta_id" => $nVenta_id,
						"cTransaccionDesc" => "Anulacion de Ventas",
						"nTransaccionMont" => $transAnular["nTransaccionMont"]*-1,
						"dTransaccionFecReg" => $datenow,
						"nTransaccionTipPag" => 1
						);

				$this->transm->insert($transaccion);
				$this->venm->anular($nVenta_id);

				if ($this->db->trans_status() === FALSE)
				{
					$this->output->set_status_header('400');
					$this->db->trans_rollback();
				}
				else
				{
					$this->db->trans_commit();
				}
				$result=1;
			}
			else
			{
				$result=0;
			}
		}
		else
			$this->output->set_status_header('400');

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode(array('estadoCaja'=>$result)));
	}

	public function editar()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$form = $this->input->post('formulario',true);
			if($form != null)
			{
				$nLocal_id = $this->session->userdata('current_local')["nLocal_id"];
				$nPersonal_id = $this->ion_auth->user()->row()->nPersonal_id;
				$datenow = date("Y-m-d");
				$nVenta_id = $form["nVenta_id"];

				$this->db->trans_begin();

				$transaccion = array(
					"nPersonal_id" => $nPersonal_id,
					"nVenta_id" => $nVenta_id,
					"cTransaccionDesc" => "Pago Separacion",
					"nTransaccionMont" => $form["pagofinal"],
					"dTransaccionFecReg" => $datenow,
					"nTransaccionTipPag" => 1
					);

				$this->transm->insert($transaccion);

				if(($form["saldo"] - $form["pagofinal"])<= 0)
				{
					$SalProd = array($nPersonal_id,$nLocal_id,2,$nPersonal_id,"Salida por ventas");
					$nSalProd_id = $this->salprod->insert($SalProd);
					$productos = $this->detvenm->get_detalles($nVenta_id);
					$DetalleSalProd = array();
					foreach ($productos as $key => $prod)
					{
						$DetalleSalProd[]= array(
							"nSalProd_id" => $nSalProd_id,
							"nProducto_id" => $prod["nProducto_id"],
							"DetSalProdCant" => $prod["cant_prod"],
							"cDetSalProdEst" => 1
							);
					}
					$this->detsalprod->insert_batch($DetalleSalProd);
					$this->venm->update($nVenta_id,array("cVentaEst"=>2));
				}

				if ($this->db->trans_status() === FALSE)
				{
					$this->output->set_status_header('400');
					$this->db->trans_rollback();
				}
				else
				{
					$this->db->trans_commit();
				}
			}
			else
				$this->output->set_status_header('400');
		}
		else
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}
}
?>