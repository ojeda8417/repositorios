<?php 

/**
* Modelo prodeucto
*/
class producto_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	function insert($Producto){
		$procedure=("call sp_ins_producto(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

		$params =array(
			$Producto['cProductoSerie'],$Producto['cProductoTalla'],$Producto['nProductoMarca'],
			  $Producto['nProductoTipo'],$Producto['cProductoDesc'],$Producto['nProductoPContado'],
			  $Producto['nProductoPCredito'],$Producto['nProductoPCosto'],$Producto['cProductoImage'],
			  $Producto['nCategoria_id'],$Producto['nProductoStockMin'],$Producto['nProductoStockMax'],
			  $Producto['nProductoStock'],$Producto['cProductoEst'],$Producto['nProductoPorcUti'],
			  $Producto['nProductoUtiBruta'],$Producto['nProductoUnidMedida'],$Producto['nProductoPVenta'],
			  $Producto['nProductoAfectoImpuesto']				
			);
		$result = $this->db->query($procedure,$params);
		$id = $result->row_array()["id"];
		$result->next_result();
		$result->free_result();
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return $id;
		}
	}

	function update($id,$data){
		
		$this->db->trans_start();
		
		$this->db->trans_begin();

        $this->db->where('nProducto_id',$id);
		$this->db->update('producto',$data);

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

	public function get_producto($nProducto_id = FALSE)
	{
		$local = $this->session->userdata('current_local');
		if($nProducto_id === FALSE )
		{
			$query = $this ->db->query('select * from ven_producto_all where nLocal_id='.$local["nLocal_id"]);
			return $query -> result_array();
		}
		$query = $this ->db->query('select * from ven_producto_all where nLocal_id='.$local["nLocal_id"].' and nProducto_id='.$nProducto_id);
		return $query->row_array();
	}
	public function get_produtolog($nProducto_id = False)
	{
		$local = $this->session->userdata('current_local');
		if($nProducto_id === FALSE )
		{
			$query = $this ->db->query('select * from log_productos_all where nLocal_id='.$local["nLocal_id"]);
			return $query -> result_array();
		}
		$query = $this ->db->query('select * from log_productos_all where nLocal_id='.$local["nLocal_id"].' and nProducto_id='.$nProducto_id);
		return $query->row_array();
	}

	public function get_byoferta($nOferta_id)
	{
		$local = $this->session->userdata('current_local');
		$productos = $this->db->query('SELECT * FROM ven_productosoferta where nLocal_id='.$local["nLocal_id"].' and nOferta_id='.$nOferta_id);
		return $productos->result_array();
	}

	public function get_sinoferta()
	{
		$local = $this->session->userdata('current_local');
		$productos = $this->db->query('SELECT * FROM ven_productossinoferta where nLocal_id='.$local["nLocal_id"]);
		return $productos->result_array();
	}

	public function get_toventas()
	{
		$local = $this->session->userdata('current_local');
		$productos = $this->db->query('SELECT * FROM ven_productosventa where nLocal_id='.$local["nLocal_id"]);
		return $productos->result_array();
	}

	public function insert_det($data){

		$this->db->insert_det('local_producto',$data);
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


}

?>