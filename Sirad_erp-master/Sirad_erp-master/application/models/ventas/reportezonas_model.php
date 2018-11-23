<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reportezonas_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

 	public function get_clinZon($nZona_id)
	{
		$query = $this->db->query("SELECT * FROM ven_listacliente_byzona where nZona_id=".$nZona_id);
		return $query->result_array();
	}
	
}