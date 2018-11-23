<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class tipoigvs extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/tipoigv_model','atm');
	}
	
	

	public function registrar(){

		$form = $this->input->post('formulario');
		#$form = '-';

		$TipoIGV_tipoigv = null;
		$TipoIGV_porcentaje = null;		
		$TipoIGV_estado = null;
		$TipoIGV_fechareg = null;

		if ($form!=null){

			$TipoIGV_tipoigv = $form["tipo"];
			$TipoIGV_porcentaje = $form["porc"];
			$TipoIGV_estado = $form["estado"];
			/*$TipoIGV_tipoigv = 1;
			$TipoIGV_porcentaje = 18;
			$TipoIGV_estado = 1;*/	

			$TipoIGV_fechareg = new DateTime();
			$TipoIGV_fechareg = $TipoIGV_fechareg->format('Y-m-d H:i:s');

			$TipoIGV = array('cTipoIGV'=>$TipoIGV_tipoigv ,
						   'nTipoIGVProc'=>$TipoIGV_porcentaje,
						   'dTipoIGVFecReg' => $TipoIGV_fechareg
							,'cTipoIGVEst' => $TipoIGV_estado);

			//-------------Insertar----------
			if($this->atm->insert($TipoIGV)){
				$return = array('responseCode'=>200, 'datos'=>$TipoIGV);
			}
			else{
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
			}

		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}

		$return = json_encode($return);
		echo $return;
		//return new Response($return,200,array('Content-Type'=>'application/json'));
	}

	public function editar(){

		$form = $this->input->post('formulario');
		#$form = '-';

		$TipoIGV_tipoigv = null;
		$TipoIGV_porcentaje = null;		
		$TipoIGV_estado = null;

		if ($form != null){

			$TipoIGV_id = $form["idTipoIGV"];
			$TipoIGV_tipoigv = $form["tipo"];
			$TipoIGV_porcentaje = $form["porc"];
			$TipoIGV_estado = $form["estado"];	
			$TipoIGV_fechareg = new DateTime();
			$TipoIGV_fechareg = $TipoIGV_fechareg->format('Y-m-d H:i:s');

			$data = array('cTipoIGV'=>$TipoIGV_tipoigv ,
						   'nTipoIGVProc'=>$TipoIGV_porcentaje,
						   'dTipoIGVFecReg' => $TipoIGV_fechareg
							,'cTipoIGVEst' => $TipoIGV_estado);

			//-------------Update----------
			if($this->atm->update($TipoIGV_id,$data)){
				$return = array('responseCode'=>200, 'datos'=>'Ok');
			}
			else{
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
			}

		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}

		$return = json_encode($return);
		echo $return;
		//return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}