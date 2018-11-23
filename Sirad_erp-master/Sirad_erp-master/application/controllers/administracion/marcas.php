<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class marcas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/marca_model','amm');

	}

	public function registrar(){

		$form = $this->input->post('formulario',true);

		$MarcaDesc = null;
		$MarcaEst = null;

		if ($form!=null){			
			$MarcaDesc = $form["desc_marca"];
			$MarcaEst = $form["selectEstado"];

			$Marca = array('cMarcaDesc'=>$MarcaDesc ,'cMarcaEst'=>$MarcaEst);
			//-------------Insertar----------
			if(!$this->amm->insert($Marca))
				$this->output->set_status_header('400');
		}
		else
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}

	public function editar(){

		$form = $this->input->post('formulario',true);

		$MarcaDesc = null;
		$MarcaEst = null;

		if ($form != null){

			$Marcaid = $form["idMarca"];
			$MarcaDesc = $form["desc_marca"];
			$MarcaEst = $form["selectEstado"];

			$data = array('cMarcaDesc'=>$MarcaDesc ,'cMarcaEst'=>$MarcaEst);
			//-------------Update----------
			if(!$this->amm->update($Marcaid,$data))
				$this->output->set_status_header('400');

		}
		else
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}

}