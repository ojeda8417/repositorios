<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class cuadrecaja extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ventas/cuadre_caja_model','ccm');		
	}

	public function get_cuadrecaja($fecha)
	{
		$id_local =intval($this->session->userdata('current_local')["nLocal_id"]);
		
		$procedure="call sp_venta_cuadrecaja(?,?)";
		$params =array($fecha,$id_local);
		$result = $this->db->query($procedure,$params);	
		 //$result->result_array();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode( $result->result_array()));
	}

	public function cuadre_caja()
	{
		$form = $this->input->post('formulario');
		
		$saldoFinal=null;
		$saldoFaltante=null;

		if ($form != null)
		{
			$saldoFinal= $form["saldoFinal"];
			$saldoFaltante= $form["saldoSobrante"];

			$Caja = array(
			 	'nCajaSaldoFinal'=> $saldoFinal,
			 	'nCajaFaltanteSobrante'=>$saldoFaltante);
			
			if($this->ccm->cuadre_caja($Caja)){
				$return = array("responseCode"=>200, "datos"=>"ok");
			}else
				$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
		else
			$return = array("responseCode"=>400, "greeting"=>"Bad");

		$return = json_encode($return);
		echo $return;
	}
	


}
