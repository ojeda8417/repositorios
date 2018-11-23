<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* 
*/
class pedido extends CI_Controller
{
	
	function  __construct()
	{
		parent::__construct();
		$this->load->model('logistica/ordpedido_model','ordped');
		$this->load->model('logistica/detordpedido_model','detordped');
	}

	public function registrar(){

		$form = $this->input->post('formulario');
		$tabla = $this->input->post('tabla',true);		
		
		if ($form!=null){
			//CABECERA
			$idPersonal = 4;
			$idLocal = 2;
			$Serie = "1";
			$Numero = "1";
			$envioemail = 1;
			$fecRegistro = $form["fechaentrega"];
			$fecEntrega = $form["fechaentrega"];
			$Observacion = $form["observaciones"];

			$OrdPedido = array('nPersonal_id' => $idPersonal,'cOrdPedSerie' =>$Serie,'cOrdPedNro'=>$Numero,
			'cOrdPedEnvEmail'=> $envioemail,'nLocal_id' => $idLocal,'dOrdPedFecReg' => $fecRegistro,'dOrdePedFecEnt' => $fecEntrega,'cOrdPedObsv'=>$Observacion);

			$band = true;
			$this->db->trans_begin();
			$OrdPedido_id = $this->ordped->insert($OrdPedido);
			if($OrdPedido_id === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
				foreach ($tabla as $key => $row)
				{
					$tabla[$key]["nOrdPed_id"] = intval($OrdPedido_id);

				}
				if(!$this->detordped->insert_batch($tabla))
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


	/*public function editar(){

		$form = $this->input->post('formulario');
		$tabla = $this->input->post('tabla',true);
		$detalle=array();
		$idDetalle=null;		
		if ($form!=null){
			//CABECERA
			$id=$form["idingprod"];
			$DocNumero = $form["edit_numdoc"];
			$Motivo = $form["tipo"];
			$Observacion = $form["observacion"];
						
			$IngProducto = array('nIngProd_id'=>$id,'nIngProdMotivo' => $Motivo,'cIngProdDocNro' => $DocNumero,
			'cIngProdObsv'=>$Observacion);

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
	}*/



}

?>