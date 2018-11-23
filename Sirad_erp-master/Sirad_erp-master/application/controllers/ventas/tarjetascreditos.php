<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Usuarios
*/
class tarjetascreditos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ventas/tarjetacredito_model','tarcred');
	}

	public function registrar(){

		$form = $this->input->post('formulario');		
		
		if ($form!=null){
			//CABECERA
			$MontoLinea = $form["monto"];
			$NumInterno = 0;
			$TarCreditoConsumo = 0;
			$estado = "1";
			$idCliente = $form["id_cliente"];
			$TarCredTipo = 0;
			$descripcion="Asignacion Credito";
			$fecRegistro= $form["fecha"];
			$fecVencimiento= $form["fecha"];
			$NumExterior=0;
			//DETALLE
			$id_personal=$form["id_personal"];

			$LineaCredito = array(
				'nTarjCreditoMontLinea' => $MontoLinea,
				'nTarjCreditoNroInt' =>$NumInterno,
				'nTarjCreditoConsumo' => $TarCreditoConsumo,
				'cTarjCreditoEst' => $estado,
				'nCliente_id' => $idCliente,
				'nTarjCreditoTipo'=>$TarCredTipo,
				'cTarjCreditoDesc'=>$descripcion,
				'dTarjCreditoFecReg'=>$fecRegistro,
				'dTarjCreditoFecVenc'=>$fecVencimiento,
				'nTarjCreditoNroExt'=>$NumExterior);

			$band = true;
			$this->db->trans_begin();
			$id_Linea = $this->tarcred->insert($LineaCredito);
			if($id_Linea === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{				
				$AsigCredPer=array(
					'nTarjCredito_id'=>$id_Linea,
					'nPersonal_id'=>$id_personal
					);	

				if(!$this->tarcred->insert_asigcredper($AsigCredPer))
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