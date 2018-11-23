<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Locales
*/
class locales extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/local_model','lo');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
	
		$Descripcion = null;
		$Estado = "1";
		$Telefono=null;
		$Direccion=null;
		$Ubigeo=null;
		$TipoRubro=null; 
		
		if ($form!=null){
			$Descripcion = $form["nombre_tienda"];
			$Telefono = $form["telefono"];
			$Direccion = $form["direccion"];
			$Ubigeo = $form["dist"];
			$TipoRubro = $form["tiprub"];
							
			$local = array('cLocalDesc' => $Descripcion,'nLocalEst' =>$Estado,'cLocalTelf'=>$Telefono,
			'cLocalDirec'=>$Direccion,'nUbigeo_id'=>$Ubigeo,'nLocalTipRub'=>$TipoRubro );
	
			if($this->lo->insert($local)){
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

		$LocalId=null;
		$Descripcion = null;
		$Estado = null;
		$Telefono= null;
		$Direccion= null;
		$Ubigeo= null;
		$TipoRubro= null;  
		
		if ($form!= null){

			$LocalId=$form['idlocal'];
			
			$Descripcion = $form["nombre_tienda"];
			$Telefono = $form["telefono"];
			$Direccion = $form["direccion"];
			$Ubigeo = $form["dist"];
			$TipoRubro = $form["tiprub"];
			$Estado=$form["estado"];
							
			$data = array('cLocalDesc' => $Descripcion,'nLocalEst' =>$Estado,'cLocalTelf'=> $Telefono,
			'cLocalDirec'=>$Direccion,'nUbigeo_id'=>$Ubigeo,'nLocalTipRub'=>$TipoRubro );		
			
			if($this->lo->update($LocalId,$data)){
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