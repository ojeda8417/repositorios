<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tipomonedas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/tipomoneda_model','atm');
	}
	public function registrar(){

		$form = $this->input->post('formulario',true);

		$Desc = null;
		$Monto = null;
		$Est = null;

		if ($form!=null){

			$Desc = $form["desc_tipomoneda"];
			$Monto = $form["monto"];
			$Est = $form["selectEstado"];

			$TipoMoneda = array('cTipoMonedaDesc'=>$Desc ,'nTipoMonedaMont'=>$Monto, 'cTipoMonedaEst' => $Est);
			//-------------Insertar----------
			if($this->atm->insert($TipoMoneda)){
				$return = array('responseCode'=>200, 'datos'=>"ok");
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
	}

	public function editar(){

		$form = $this->input->post('formulario',true);
		$Desc = null;
		$Monto = null;
		$Est = null;

		if ($form != null){

			$id = $form["idTipoMoneda"];
			$Desc = $form["desc_tipomoneda"];
			$Monto = $form["monto"];
			$Est = $form["selectEstado"];

			$data = array('cTipoMonedaDesc'=>$Desc ,'nTipoMonedaMont'=>$Monto, 'cTipoMonedaEst' => $Est);
			//-------------Insertar----------
			if($this->atm->update($id,$data)){
				$return = array('responseCode'=>200, 'datos'=>"ok");
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
	}
}

?>