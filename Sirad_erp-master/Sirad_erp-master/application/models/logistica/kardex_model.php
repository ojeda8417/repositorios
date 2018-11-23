<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kardex_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	public function get_kardex_byfecha($fecha,$local)
	{
		$query = $this->db->query("select * from log_consultar_kardex where nLocal_id=".$local." and Anio =" .$fecha->format('Y')." and MesNum=" .$fecha->format('m'));
		return $query -> result_array();
		
	}
	public function get_reporte_valorizado($fecha,$local){
		$query = $this->db->query("select * from log_consultar_kardexvalorizado where  nLocal_id=".$local."  and Anio =" .$fecha->format('Y')." and NroMes=" .$fecha->format('m'));
		return $query -> result_array();
	}

}