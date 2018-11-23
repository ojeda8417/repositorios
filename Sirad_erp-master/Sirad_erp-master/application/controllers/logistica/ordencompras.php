<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Locales
*/
class ordencompras extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('logistica/ordcompra_model','ordcom');
		$this->load->model('logistica/detordcompra_model','detordcom');
	}

	public function registrar(){

		$form = $this->input->post('formulario');
		$tabla = $this->input->post('tabla',true);		
		
		if ($form!=null){
			//CABECERA
			$idPersonal = $form["id_registrador"];
			$idProveedor=$form["proveedor_id"];
			$subtotal = $form["subtotal"];
			$descuento=$form["descuento"];
			$igv = $form["igv"];
			$total=$form["total"];
			$Observacion = $form["observaciones"];
			$docSerie=$form["doc_serie"];
			$docNumero=$form["doc_numero"];
			$tipodoc=$form["tipdoc"];
			
			$OrdCompras = array('nPersonal_id' => $idPersonal,'nProveedor_id' =>$idProveedor,
			'nOrdComSubTotal' => $subtotal,'OrdComIGV' => $igv,'OrdComTotal' => $total,
			'OrdComObsv'=>$Observacion,'OrdComDesct'=>$descuento,'OrdComDocSerie'=>$docSerie,'OrdComDocNro'=>$docNumero,
			'nOrdTipoDocumento'=>$tipodoc);
			$band = true;
			$this->db->trans_begin();
			$OrdCompra_id = $this->ordcom->insert($OrdCompras);
			if($OrdCompra_id === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
				foreach ($tabla as $key => $row)
				{
					$tabla[$key]["nOrdenCompra_id"] = intval($OrdCompra_id);

				}
				if(!$this->detordcom->insert_batch($tabla))
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