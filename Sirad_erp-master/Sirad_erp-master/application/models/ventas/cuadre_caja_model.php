<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cuadre_caja_model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
	}


	public function get_EstadoCaja()
	{
		
	}


	public function get_cuadrecaja()
	{
		$query = $this ->db->query ('select * from ven_consultar_caja_all;');
		return $query -> result_array();
	
	}
	public function cuadre_caja($data)
	{
		$this->db->trans_start();
		
		$this->db->trans_begin();

		$fechaActual=date('Y-m-d');

        $this->db->where('dCajaFechaApertura',$fechaActual);
		$this->db->update('caja',$data);

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
	public function ingreso_egreso($idcaja,$idlocal){
		$procedure="call sp_consultar_ing_egre_byCaja(?,?)";
		
		$params =array($idcaja,$idlocal);

		$result = $this->db->query($procedure,$params);
		
		$cajaingreso = $result -> result_array();

		$result->next_result();
		$result->free_result();
		
		if ($this->db->trans_status() === FALSE)
			{
			return false;
			}
		else
			{
			$total = 0;
			foreach ($cajaingreso as $key => $value) {
				$total += $value["Ingreso"];
			}
			return $total;
			}
	}

	public function egreso($idcaja,$idlocal){
		$procedure="call sp_consultar_ing_egre_byCaja(?,?)";
		
		$params =array($idcaja,$idlocal);

		$result = $this->db->query($procedure,$params);
		
		$cajaegreso = $result -> result_array();

		$result->next_result();
		$result->free_result();
		
		if ($this->db->trans_status() === FALSE)
			{
			return false;
			}
		else
			{
			$total = 0;
			foreach ($cajaegreso as $key => $value) {
				$total += $value["Egreso"];
			}
			return $total;
			}
	}	

	public function monto_total($idcaja,$idlocal){
		$procedure="call sp_consultar_ing_egre_byCaja(?,?)";
		
		$params =array($idcaja,$idlocal);

		$result = $this->db->query($procedure,$params);
		
		$cajatot = $result -> result_array();

		$result->next_result();
		$result->free_result();
		
		if ($this->db->trans_status() === FALSE)
			{
			return false;
			}
		else
			{
			$total = 0;
			foreach ($cajatot as $key => $value) {
				$total = $value["Ingreso"] - $value["Egreso"];
			}
			return $total;
			}
	}

}