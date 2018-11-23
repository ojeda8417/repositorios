<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Zona_Edit
*/
class zona_personal extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/zonapersonal_model','zopermod');
	}

	public function registrar(){
		$form = $this->input->post('formulario');	
		$Zona = null;
		$Personal =null; 
		
		if ($form!=null){
			$Zona = $form["id_zona"];			
			$Personal= $form["id_trabajador"];
			$nZonapersonalEst=null;						
			$zonaspersonal = array(
				'nZona_id' => $Zona,
				'nPersonal_id' =>$Personal,
				'nZonapersonalEst' =>'1'
				);
	
			if($this->zopermod->insert($zonaspersonal)){
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
		$Zona = null;
		$Personal =null; 
		
		if ($form!=null){
			$nZonaPersonal_id = $form["idZonapersonal"];	
			$Zona = $form["id_zona"];			
							
			$data = array(
				'nZona_id' => $Zona
				);
	
			if($this->zopermod->update($nZonaPersonal_id,$data)){
				$return = array("responseCode"=>200, "datos"=>$data);
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

	public function eliminar()
	{
		$form = $this->input->post('formulario');	
		
		if ($form!=null){
			$nZonaPersonal_id = $form["idZonapersonal"];					
							
			$data = array(
				'nZonapersonalEst' => '0'
				);
	
			if($this->zopermod->drop($nZonaPersonal_id,$data)){
				$return = array("responseCode"=>200, "datos"=>$data);
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