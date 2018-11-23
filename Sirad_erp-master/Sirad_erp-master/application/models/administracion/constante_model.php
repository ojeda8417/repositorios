<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class constante_model extends CI_Model
{
	
	function __construct() {
		parent::__construct();
	}

	public function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('constante',$data);

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

	public function update($id,$data){
		
		$this->db->trans_start();
		
		$this->db->trans_begin();

		$this->db->where('nConstante_id',$id);
		$this->db->update('constante',$data);

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

	public function get_constantes($nConstante_id = FALSE)
	{
		if($nConstante_id === FALSE )
		{
			$query = $this ->db->get ('constante');
			return $query -> result_array();
		}
		$query = $this->db->get_where('constante', array('nConstante_id' => $nConstante_id));
		return $query->row_array();
	}

	public function get_ByClase($nConstanteClase)
	{
		$query = $this->db->get_where('constante', array('nConstanteClase' => $nConstanteClase,'cConstanteValor !='=>0));
		return $query->result_array();
	}

	public function get_Clases()
	{
		$query = $this->db->get_where('constante', array('cConstanteValor' => 0));
		return $query->result_array();
	}
}
?>