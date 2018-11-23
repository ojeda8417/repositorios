<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* 
*/
class ingresoproductos extends CI_Controller
{
	
	function  __construct()
	{
		parent::__construct();
		$this->load->model('logistica/ingproducto_model','ingpro');
		$this->load->model('logistica/detingproducto_model','detingpro');
	}

	public function registrar(){

		$form = $this->input->post('formulario');
		$tabla = $this->input->post('tabla',true);		
		
		if ($form!=null){
			//CABECERA
			$idPersonal = $form["idRegistrado"];
			$idLocal = $form["idLocal"];
			$Motivo = $form["tipo"];
			$DocSerie = $form["docserie"];
			$DocNumero = $form["docnumero"];
			$Observacion = $form["observacion"];
							
			$IngProducto = array(
				'nPersonal_id' => $idPersonal,
				'nLocal_id' =>$idLocal,
				'nIngProdMotivo' => $Motivo,
				'cIngProdDocSerie' => $DocSerie,
				'cIngProdDocNro' => $DocNumero,
				'cIngProdObsv'=>$Observacion);

			$band = true;
			$this->db->trans_begin();
			$IngProducto_id = $this->ingpro->insert($IngProducto);
			if($IngProducto_id === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
				foreach ($tabla as $key => $row)
				{
					$tabla[$key]["nIngProd_id"] = intval($IngProducto_id);

				}
				if(!$this->detingpro->insert_batch($tabla))
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

		$form = $this->input->post('formulario');
		$tabla = $this->input->post('tabla',true);
		$detalle=array();
		$idDetalle=null;		
		if ($form!=null){
			//CABECERA
			$id=$form["idingprod"];
			$DocNumero = $form["docnumero"];
			$Motivo = $form["tipo"];
			$Observacion = $form["observacion"];
			$DocSerie=$form["docserie"];
						
			$IngProducto = array('nIngProd_id'=>$id,'nIngProdMotivo' => $Motivo,'cIngProdDocNro' => $DocNumero,
			'cIngProdDocSerie'=>$DocSerie,'cIngProdObsv'=>$Observacion);

			$band = true;
			$this->db->trans_begin();
			$IngProducto_id = $this->ingpro->update($IngProducto,$id);
			if($IngProducto_id === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
			foreach ($tabla as $key => $row)
				{
					switch ($row["band"]) {
						case 0	:
							$idDetalle=$row["nDetIngProd_id"];
							if(!$this->detingpro->delete($idDetalle))
							$band = false;		
							break;
						
						case 2:
							$tabla[$key]["nIngProd_id"] = intval($IngProducto_id);
							$detalle=array(
							 'nIngProd_id'=>intval($IngProducto_id),
							 'nProducto_id'=>$row["nProducto_id"],
							 'nDetIngProdCant'=>$row["nDetIngProdCant"],
							 'nDetIngProdPrecUnt'=>$row["nDetIngProdPrecUnt"],
							 'nDetIngProdTot'=>$row["nDetIngProdTot"]);
							if(!$this->detingpro->insert($detalle))
							$band = false;	
							break;
					}
				}
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



}

?>