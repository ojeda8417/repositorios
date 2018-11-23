<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Constantes
*/
class constantes extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/constante_model','constm');
	}

	public function registrar()
	{
		$form = $this->input->post('formulario');
		
		$ConstanteClase = null;
		$ConstanteDesc = null;
		$ConstanteValor = null;
	
		if ($form!=null){

			$ConstanteClase = $form["clase"];
			$ConstanteDesc = $form["nom_clase"];
			$ConstanteValor = $form["valor"];
			$Constante = array('nConstanteClase'=>$ConstanteClase ,'cConstanteDesc'=>$ConstanteDesc, 'cConstanteValor' => $ConstanteValor);
			
			//-------------Insertar----------
			if($this->constm->insert($Constante))
			{
				$return = array('responseCode'=>200, 'resp'=>"ok");
			}
			else
			{
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
			}
			
		}else{
			$return = array('responseCode'=>400, 'greeting'=>'Bad');
		}
		$return = json_encode($return);
		echo $return;
	}

	public function editar(){
	
		$form = $this->input->post('formulario');
		
		$ConstanteClase = null;
		$ConstanteDesc = null;
		$ConstanteValor = null;
	
		if ($form != null){
	
			$Constanteid = $form["idConstante"];
			$ConstanteClase = $form["clase"];
			$ConstanteDesc = $form["nom_clase"];
			$ConstanteValor = $form["valor"];

			$data = array('nConstanteClase'=>$ConstanteClase ,'cConstanteDesc'=>$ConstanteDesc, 'cConstanteValor' => $ConstanteValor);

			if($this->constm->update($Constanteid,$data))
			{
				$return = array('responseCode'=>200, 'datos'=>"ok");
			}
			else
			{
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