<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class cronogramas extends CI_Controller {
		public function __construct()
	{
		parent::__construct();
		$this->load->model('ventas/venta_model','venm');
		$this->load->model('ventas/ventacredito_model','credm');
		$this->load->model('ventas/ventacronograma_model','cronom');
		$this->load->model('ventas/transaccion_model', "transm");
	}

	public function pagarcuota()
	{
		if(isset($_POST) && !empty($_POST))
		{
			
			$form = $this->input->post('formulario',true);
			$cronogramas = $this->input->post('cronogramas',true);
			$nLocal_id = $this->session->userdata('current_local')["nLocal_id"];
			$nPersonal_id = $this->ion_auth->user()->row()->nPersonal_id;
			$datenow = date("Y-m-d");
			$nVenta_id = $form["nVenta_id"];

			$this->db->trans_begin();

			if($form != null)
			{
				$Venta = $this->venm->get_venta($nVenta_id);
				$Amortizacion = $form['monto'] + $Venta["nVentaTotAmt"];
				$Saldo = $Venta["Total"] - $form['monto'] + $Venta["nVentaTotAmt"];
				$Porcentage = ($form['monto'] + $Venta["nVentaTotAmt"]) / ($Venta["Total"])*100;

				$this->credm->update($form["idcredito"],array("nVenCreditoPPag"=>$Porcentage));	
			
			if($Porcentage >= 100)
				$this->venm->update($nVenta_id,array('nVentaSaldo' =>$Saldo, "nVentaTotAmt"=>$Amortizacion,"cVentaEst"=>"2"));
			else
				$this->venm->update($nVenta_id,array('nVentaSaldo' =>$Saldo, "nVentaTotAmt"=>$Amortizacion));

				foreach($cronogramas as $key => $crono){
					if($crono["band"]==1){
						$this->cronom->update($crono["nCronograma_id"],array(
							"nCronPagoFecPago"=>$datenow,
							"nCronPagoMonCouApl"=>$crono["nCronPagoMonCouApl"]));						
					}
				}
				if($form['monto'] > 0){
					$transaccion = array(
						"nPersonal_id" => $nPersonal_id,
						"nVenta_id" => $nVenta_id,
						"cTransaccionDesc" => "Pago Cuota",
						"nTransaccionMont" => $form["monto"],
						"dTransaccionFecReg" => $datenow,
						"nTransaccionTipPag" => 1
						);

					$this->transm->insert($transaccion);
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