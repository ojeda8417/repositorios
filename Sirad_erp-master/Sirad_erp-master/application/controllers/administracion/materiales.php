<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class materiales extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/material_model','mm');
		$this->load->model('administracion/localmaterial_model','lomat');
	}
	
	public function registrar(){
		$form = $this->input->post('formulario');

		if ($form!=null){
			$Descripcion = $form["descripcion"];
			$Marca = $form["marca"];
			$Precio = $form["precio"];
			$Categoria = $form["categoria"];
			$UnidadMedida = $form["unimedida"];
			$Estado = $form["estado"];
			$Cantidad=$form["cantidad"];
			$idLocal=$form["idLocal"];
							
			$Material = array(
				'cMaterialDesc' => $Descripcion,
				'nMarca_id' => $Marca,
				'nMaterialPCosto' => $Precio,
				'nCategoria_id' => $Categoria,
				'nMaterialCantidad' => $Cantidad,
				'nMaterialUnidMedida' =>$UnidadMedida,
				'cMaterialEst'=>$Estado );

			$band = true;
			$this->db->trans_begin();
			$id_Material = $this->mm->insert($Material);

			if($id_Material === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
				$detalle=array('nLocal_id'=>$idLocal,
					'nProducto_id'=>$id_Material,
					'clocalProducto_Estado'=>"1");
				
				if(!$this->lomat->insert_batch($detalle))
					$band = false;

			}

			if($band)
				$this->db->trans_commit();
			else
			{
				$this->db->trans_rollback();
				$this->output->set_status_header('400');
			} 
		}
		else 
		{
			$this->output->set_status_header('400');
			$return = "bad";
		} 
	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	} 
	
	public function editar(){
		$form = $this->input->post('formulario',null);
	
		$Descripcion = $form["descripcion"];
		$Marca = $form["marca"];
		$Precio = $form["precio"];
		$Categoria = $form["categoria"];
		$UnidadMedida = $form["unimedida"];
		$Estado = $form["estado"];
		$Cantidad=$form["cantidad"];
		
		if ($form!=null){

			$id_Mat = $form["codigo"];
			$Descripcion = $form["descripcion"];
			$Marca = $form["marca"];
			$Precio = $form["precio"];
			$Categoria = $form["categoria"];
			$UnidadMedida = $form["unimedida"];
			$Estado = $form["estado"];
			$Cantidad=$form["cantidad"];
							
			$data = array(
				'cMaterialDesc' => $Descripcion,
				'nMarca_id' => $Marca,
				'nMaterialPCosto' => $Precio,
				'nCategoria_id' => $Categoria,
				'nMaterialCantidad' => $Cantidad,
				'nMaterialUnidMedida' =>$UnidadMedida,
				'cMaterialEst'=>$Estado );		
			
			if($this->mm->update($id_Mat,$data)){
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
