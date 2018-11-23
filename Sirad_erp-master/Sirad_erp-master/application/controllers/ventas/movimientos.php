<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class movimientos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ventas/movimientos_model','amm');

	}

	public function registrar()
	{		
		$form = $this->input->post('formulario',true);    
		if ($form!=null)
		{
			$concepto = $form["concepto"];
			$personal =$form["idRegistrado"];
			$monto = $form["monto"];
			$tipo_mov = $form["selectTipoMov"];
			$tipo_pag = $form["selectTipoPag"];
			$fecha_reg = date("Y-m-d");
			$idLocal=$form["idLocal"];	
			
			$Movimiento = array(				
				'cMovimientoConcepto'=>$concepto,				
				'nPersonal_id'=>$personal,	
				'nMovimientoMonto'=>$monto,			
				'nMovimientoTip'=>$tipo_mov,
				'nMovimientoTipPag'=>$tipo_pag,
				'dMovimientoFecReg'=>$fecha_reg,
				'nLocal_id'=>$idLocal
				);			

			if(!$this->amm->insert($Movimiento))
				$this->output->set_status_header('400');				
		}	
		else
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}
}