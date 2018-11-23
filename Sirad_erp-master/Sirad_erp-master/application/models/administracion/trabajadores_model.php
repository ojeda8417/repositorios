<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class trabajadores_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_personal',$data);

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

        $this->db->where('nPersonal_id',$id);
		$this->db->update('ven_personal',$data);

		if(isset($data['cPersonalEmail']))
		{
			$this->db->where('nPersonal_id',$id);
			$this->db->update('users',array("email"=>$data['cPersonalEmail']));
		}

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


 	public function get_trabajadores($nPersonal_id = FALSE)
	{
		//$id_local = $this->session->userdata('current_local')["nLocal_id"];
		if($nPersonal_id === FALSE )
		{
			$query = $this ->db->query("select * from ven_personal_all;");
			return $query -> result_array();
		}
		$query = $this ->db->query("select * from ven_personal_all where nPersonal_id=".$nPersonal_id);
		return $query -> row_array();
	}



	public function get_trabajadores_activos()
	{	
		$id_local = $this->session->userdata('current_local')["nLocal_id"];
		$query = $this ->db->query("select * from ven_trabajadores_activos where id_local=".$id_local);
		return $query -> result_array();
	}

	public function get_trabajadores_sinzona()
	{
		$query = $this ->db->query('select * from ven_trabajadores_sinzona');
		return $query -> result_array();
	}

	public function get_trabajadores_bylocal($nLocal_id)
	{
		$query = $this ->db->query("SELECT * FROM ven_personal_all  where id_local =" .$nLocal_id);
		return $query -> result_array();
	}
	public function get_trabajadores_nouser()
	{
		$query = $this ->db->query("SELECT * FROM  ven_trabajadores_no_user");
		return $query -> result_array();
	}

}