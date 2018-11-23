<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Usuarios
*/
class ofertas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/oferta_model','ofertm');
		$this->load->model('administracion/ofertaproducto_model','ofertprodm');
	}

	public function registrar()
	{
		$form = $this->input->post('formulario',true);

		if($form != null)
		{
			$cOfertaDesc = $form["descripcion"];
			$dOfertaFecVigente = date_create_from_format("d/m/Y",$form["fecha_ini"]);
			$dOfertaFecVencto = date_create_from_format("d/m/Y",$form["fecha_fin"]);
			$nOfertaPorc = $form["descuento"];

			$Oferta = array(
				"cOfertaDesc"=>$cOfertaDesc,
				"dOfertaFecVigente"=>$dOfertaFecVigente->format('Y-m-d'),
				"dOfertaFecVencto"=>$dOfertaFecVencto->format('Y-m-d'),
				"nOfertaPorc"=>$nOfertaPorc,
				);
			$band = true;
			if (!$this->ofertm->insert($Oferta))
				$this->output->set_status_header('400');				
		}
		else			
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}

	public function editar()
	{
		$form = $this->input->post('formulario',true);
		$tabla = $this->input->post('tabla',true);

		if($form != null)
		{
			$cOfertaDesc = $form["descripcion"];
			$dOfertaFecVigente = date_create_from_format("d/m/Y",$form["fecha_ini"]);
			$dOfertaFecVencto = date_create_from_format("d/m/Y",$form["fecha_fin"]);
			$nOfertaPorc = $form["descuento"];

			$Oferta = array(
				"cOfertaDesc"=>$cOfertaDesc,
				"dOfertaFecVigente"=>$dOfertaFecVigente->format('Y-m-d'),
				"dOfertaFecVencto"=>$dOfertaFecVencto->format('Y-m-d'),
				"nOfertaPorc"=>$nOfertaPorc,
				);
			$band = true;
			if ($this->ofertm->update($form["idOferta"],$Oferta))
			{
				$this->db->trans_begin();
				if( $tabla!= 0)
					foreach ($tabla as $index => $row)
					{
						$row["idOferta"]= $form["idOferta"];
						$row["descuento"]= $form["descuento"];
						if($row["band"]!=1)
						{
							if(!$this->ofertprodm->insert($row))
							{
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
				$this->output->set_status_header('400');		
		}
		else			
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}

}