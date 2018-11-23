<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class categorias extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/categoria_model','acm');
	}	

	public function registrar(){

		#verificar si se esta enviado datos del formulario
		$form = $this->input->post('formulario');
		
		#$form = "-";

		$CategoriaNom = null;
		$CategoriaDesc = null;
		$CategoriaEst = null;
	
		if ($form!=null){

			$CategoriaNom = $form["nom_categoria"];
			$CategoriaDesc = $form["desc_categoria"];
			$CategoriaEst = $form["selectEstado"];
			$Categoria = array('cCategoriaNom'=>$CategoriaNom ,'cCategoriaDesc'=>$CategoriaDesc, 'cCategoriaEst' => $CategoriaEst);
			
			//-------------Insertar----------
			if($this->acm->insert($Categoria)){
				$return = array('responseCode'=>200, 'resp'=>"ok");
			}
			else{
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
			}
			
		}else{
			$return = array('responseCode'=>400, 'greeting'=>'Bad');
		}
		$return = json_encode($return);
		echo $return;
	}
	
	public function editar(){
	
		#verificar si se esta enviado datos del formulario
		$form = $this->input->post('formulario',true);
		
		#$form = '-';
		
		$CategoriaNom = null;
		$CategoriaDesc = null;
		$CategoriaEst = null;
	
		if ($form != null){
	
			$Categoriaid = $form["idCategoria"];
			$CategoriaNom = $form["nom_categoria"];
			$CategoriaDesc = $form["desc_categoria"];
			$CategoriaEst = $form["selectEstado"];

			$data = array('cCategoriaNom'=>$CategoriaNom ,'cCategoriaDesc'=>$CategoriaDesc, 'cCategoriaEst' => $CategoriaEst);

			if($this->acm->update($Categoriaid,$data)){
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