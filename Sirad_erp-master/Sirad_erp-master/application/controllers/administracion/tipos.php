<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tipos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/tipo_model','timo');
	}
	
	public function registrar(){
		$form = $this->input->post('formulario');
	
		$desc_tipo = null;
		$estado_tipo=null;
		$select_cat = null;
		$nom_tipo=null; 
		
		
		if ($form!=null){
			$desc_tipo = $form["desc_tipo"];
			$estado_tipo = $form["estado_tipo"];
			$select_cat=$form["select_cat"];
			$nom_tipo=$form["nom_tipo"];
			
							
			$Tipo = array('cTipoProductoDesc' => $desc_tipo,'cTipoProductoEst' =>$estado_tipo,'nCategoria_id'=>$select_cat,
						'cTipoProductoNom'=>$nom_tipo );
	
			if($this->timo->insert($Tipo)){
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
		
		$desc_tipo = null;
		$estado_tipo=null;
		$select_cat = null;
		$nom_tipo=null; 
		
		
		if ($form!=null){
			$idTipo=$form["idTipo"];
			$desc_tipo = $form["desc_tipo"];
			$estado_tipo = $form["estado_tipo"];
			$select_cat=$form["select_cat"];
			$nom_tipo=$form["nom_tipo"];							
							
			$Tipo = array('cTipoProductoDesc' => $desc_tipo,'cTipoProductoEst' =>$estado_tipo,'nCategoria_id'=>$select_cat,
						'cTipoProductoNom'=>$nom_tipo );		
			
			if($this->timo->update($idTipo,$Tipo)){
				$return = array('responseCode'=>200, 'datos'=>$Tipo);
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
