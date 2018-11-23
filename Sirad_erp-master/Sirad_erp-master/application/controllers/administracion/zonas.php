<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Zona_Edit
*/
class zonas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/zona_model','zonmod');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
		
		$Descripcion = null;
		$SelectEstado = null; 
		$Ubigeo=null;
		
		if ($form!=null){
			$Descripcion = $form["desc"];	
			$SelectEstado=$form["selectEstado"];
			$Ubigeo = $form["dist"];							
			$zonas = array(
				'cZonaDesc' => $Descripcion,
				'nZonaEst' =>$SelectEstado, 
				'nUbigeo_id' =>$Ubigeo );
	
			if($this->zonmod->insert($zonas)){
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
		$form = $this->input->post('formulario');
		
		$Descripcion = null;
		$SelectEstado = null; 
		$Ubigeo=null;
		
		if ($form!=null){

			$idZonas= $form["idZonas"];
			$Descripcion = $form["desc"];	
			$SelectEstado=$form["selectEstado"];
			$Ubigeo = $form["dist"];

			$data = array(
				'cZonaDesc' => $Descripcion,
				'nZonaEst' =>$SelectEstado, 
				'nUbigeo_id' =>$Ubigeo );	

			if($this->zonmod->update($idZonas,$data)){
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

	
}