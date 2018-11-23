<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class minstock_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function get_produtomin($nProducto_id = False)
	{
		$local = $this->session->userdata('current_local');
		if($nProducto_id === FALSE )
		{
			$query = $this ->db->query('select * from log_productos_con_stockminimo where nLocal_id='.$local["nLocal_id"]);
			return $query -> result_array();
		}
		$query = $this ->db->query('select * from log_productos_con_stockminimo where nLocal_id='.$local["nLocal_id"].' and nProducto_id='.$nProducto_id);
		return $query->row_array();
	}


 	public function get_useradmin()
	{
		$query = $this->db->query("SELECT * FROM adm_email_administrador;");
		return $query->result_array();
	}

 	

}

?>

