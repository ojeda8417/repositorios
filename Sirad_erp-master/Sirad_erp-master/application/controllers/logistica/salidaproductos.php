<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* 
*/
class salidaproductos extends CI_Controller
{
	
	function  __construct()
	{
		parent::__construct();
		$this->load->model('logistica/salproducto_model','salprod');
		$this->load->model('logistica/detsalproducto_model','detsalprod');
	}
		public function registrar(){

		$form = $this->input->post('formulario');
		$tabla = $this->input->post('tabla',true);		
		
		if ($form!=null){
			//CABECERA
			$idPersonal = $form["registrador_id"];
			$idLocal = $form["tienda_id"];
			$Fecha=$form["fecha"];
			$Motivo = $form["motivo"];
			$idSolicitante = $form["solicitante_id"];
			$Observacion = $form["observaciones"];
							
			$SalProducto = array(
				$idPersonal,
				$idLocal,
				$Motivo,
				$idSolicitante,
				$Observacion);

			$band = true;
			$this->db->trans_begin();
			$SalProducto_id = $this->salprod->insert($SalProducto);
			if($SalProducto_id === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
				foreach ($tabla as $key => $row)
				{
					$tabla[$key]["nSalProd_id"] = intval($SalProducto_id);

				}
				if(!$this->detsalprod->insert_batch($tabla))
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
}

?>