<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class saldo_model extends CI_Model {

	
	public function __construct() {
		parent::__construct();
	}

	public function get_saldoinicial_byfecha($fech,$id_local){
		

		$procedure="call spF_kardex_SaldoInicial(?,?,?)";

 		$params =array($fech->format('Y'),$fech->format('m'),$id_local);
		
		$query = $this->db->query($procedure,$params);

		return $query -> result_array();
	}

	public function get_saldoactual_byfecha($fecha){

		$local = $this->session->userdata('current_local')["nLocal_id"];
		$procedure="call spF_kardex_StockActual(".$fecha->format('Y').",".$fecha->format('m').",".$local.")";

		$query = $this->db->query($procedure);	
		return $query -> result_array();
	}

	public function cierremes($id_local){

		$procedure="call spI_cierreMes(".$id_local.")";

		$query = $this->db->query($procedure);	
		return $query -> result_array();
	}
}