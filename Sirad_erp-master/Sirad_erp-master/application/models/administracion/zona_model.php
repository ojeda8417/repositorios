<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class zona_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_zona',$data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	function update($id,$data){
		
		$this->db->trans_start();
		
		$this->db->trans_begin();

        $this->db->where('nZona_id',$id);
		$this->db->update('ven_zona',$data);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	public function get_zonas($nZona_id = FALSE)
	{
		if($nZona_id === FALSE )
		{
			$query = $this ->db->query ('select * from ven_zona_all');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_zona', array('nZona_id' => $nZona_id));
		return $query->row_array();
	}

	public function get_zonas_activos()
	{
			$query = $this ->db->query ('select * from ven_zona_all where nZonaEst=1');
			return $query -> result_array();
	}


	public function get_ByUbigeo($nUbigeo_id)
	{		
			$query = $this ->db->query('select * from ven_zona_all where nZonaEst=1 and nUbigeo_id='.$nUbigeo_id);
			return $query -> result_array();
	}
}