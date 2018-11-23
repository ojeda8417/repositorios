<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class servicios extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
	}
	
	public function getVentas_ByClientes()
	{
		$this->load->model('estadisticas/rptestadisticas_model','rsm');
		$desde="2013-01-01";
		$hasta="2015-01-01";
		$cantidad=5;
		$monto=50;

		$Params = array($desde,$hasta,$cantidad,$monto);
		$result = $this->rsm->getVentas_ByClientes($Params);
		
		echo json_encode(array('datos' => $result));			
	}

	public function getProductos_Cantidad()
	{
		$this->load->model('estadisticas/rptestadisticas_model','rsm');
		$desde="2013-01-01";
		$hasta="2015-01-01";
		$cantidad=5;

		$Params = array($desde,$hasta,$cantidad);
		$result = $this->rsm->getProductos_Cantidad($Params);
		
		echo json_encode(array('datos' => $result));			
	}

	public function get_Ingresos_Egresos()
	{
		$this->load->model('estadisticas/rptestadisticas_model','rsm');
		$anio=2014;
		$mes=4;

		$Params = array($anio,$mes);
		$result = $this->rsm->get_IngresosEgresos($Params);
		
		echo json_encode(array('aaData' => $result));			
	}
	public function get_ProductoCantidad_ByCliente()
	{
		$this->load->model('estadisticas/rptestadisticas_model','rsm');
		$idCliente=1;
		$desde="2014-01-01";
		$hasta="2014-12-01";

		$Params = array($idCliente,$desde,$hasta);
		$result = $this->rsm->get_ProductoCantidad_ByCliente($Params);
		
		echo json_encode(array('aaData' => $result));			
	}

	
	
	
}