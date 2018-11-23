<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cargos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/cargo_model','acam');
	}
	
	public function registrar(){
		$form = $this->input->post('formulario');
	
		$CargoDesc = null;
		$cCargoEst = null; 
		
		if ($form!=null){
			$CargoDesc = $form["nom_cargo"];
			$cCargoEst = $form["selectEstado"];
							
			$Cargo = array('nCargoDesc' => $CargoDesc,'cCargoEst' =>$cCargoEst );
	
			if($this->acam->insert($Cargo)){
				$return = array("responseCode"=>200, "datos"=>"ok");
			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			}; 

		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	} 
	
	public function editar(){
		$form = $this->input->post('formulario',null);
	
		$CargoDesc = null;
		$cCargoEst = null; 
		
		if ($form!=null){

			$Cargoid = $form["idCargo"];
			$CargoDesc = $form["nom_cargo"];
			$cCargoEst = $form["selectEstado"];
							
			$data = array('nCargoDesc' => $CargoDesc,'cCargoEst' =>$cCargoEst );		
			
			if($this->acam->update($Cargoid,$data)){
				$return = array('responseCode'=>200, 'datos'=>$data);
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
