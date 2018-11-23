<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reporteingegr_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	public function get_reporteIngEgre_byfecha($Tipo,$fecha)
	{
		$query = $this->db->query("SELECT * FROM  local_reporte_ingreso_egreso_byfecha where TipoIngreso =".$Tipo." and Fecha= '".$fecha."'");
		return $query -> result_array();
	}



}