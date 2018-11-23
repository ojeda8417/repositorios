<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class servicios extends CI_Controller {

	
	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getProductos(){
		$this->load->model('logistica/producto_model','prod');
		$result = $this->prod->get_producto();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}

	public function getProductosLog(){
		$this->load->model('logistica/producto_model','prod');
		$result = $this->prod->get_produtolog();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}

	public function getProveedor(){		
		$this->load->model('logistica/proveedor_model','pro');
		$proveedores = $this->pro->get_proveedor();
		foreach ($proveedores as $key => $proveedor) {
			switch ($proveedor["nProveedorEstado"]) {				
			    case 0:
			        $proveedores[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $proveedores[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}

		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $proveedores)));
	}	
	public function get_trabajadores_activos(){
		//$id_local = $this->session->userdata('current_local')["nLocal_id"];		
		$this->load->model('administracion/trabajadores_model','tra');
		$result = $this->tra->get_trabajadores_activos();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}	
	public function getOrdenPedido(){
		
		$this->load->model('logistica/ordpedido_model','ordpe');
		$result = $this->ordpe->get_ordenpedido();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}	

	public function get_log_ordcompras()
	{		
			$this->load->model('logistica/detordcompra_model','detordcompra');
			$detalles=$this->detordcompra->get_OrdCompra();
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('aaData' => $detalles)));		
	}

	public function get_log_detordcompras($nOrdenCom_id)
	{		
			$this->load->model('logistica/detordcompra_model','detordcompra');
			$detalles=$this->detordcompra->get_DetOrdCompra($nOrdenCom_id);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $detalles)));		
	}

	//CARGAR POR RANGO DE FECHAS
	public function get_log_ingprod($Desde,$Hasta){		
			$this->load->model('logistica/ingproducto_model','ingprod');
			$result = $this->ingprod->get_fromrange($Desde,$Hasta);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}
	
	public function get_log_salprod($Desde,$Hasta){		
			$this->load->model('logistica/salproducto_model','salpro');
			$result = $this->salpro->get_fromrange($Desde,$Hasta);
			foreach ($result as $key => $value) {
				$result[$key]["SerieNum"] = $value["cSalProdSerie"]." - ".$value["cSalProdNro"];
			}

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}

	public function get_log_ordcompra_rangefechas($Desde,$Hasta){		

			$this->load->model('logistica/ordcompra_model','ordcomp');
			$ordenCompra = $this->ordcomp->get_fromrange($Desde,$Hasta);
			foreach ($ordenCompra as $key => $ordenCompras) {
			switch ($ordenCompras["cOrdComEst"]) {				
			    case 0:
			        $ordenCompra[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
			        break;
			    case 1:
			        $ordenCompra[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $ordenCompra)));		
		}
	}

	public function get_log_saldoinicial_byfecha($fecha){

			$id_local = $this->session->userdata('current_local')["nLocal_id"];
			$fec = date_create_from_format('Y-m-d', $fecha);
			$this->load->model('logistica/saldo_model','sal');
			$result = $this->sal->get_saldoinicial_byfecha($fec,$id_local);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}

	public function get_saldoactual_byfecha($fecha){
			$fec = date_create_from_format('Y-m-d', $fecha);
			$this->load->model('logistica/saldo_model','sal');
			$result = $this->sal->get_saldoactual_byfecha($fec);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}

	public function get_kardex_byfecha($fecha){
			$local = $this->session->userdata('current_local')["nLocal_id"];
			$fec = date_create_from_format('Y-m-d', $fecha);
			$this->load->model('logistica/kardex_model','kar');
			$result = $this->kar->get_kardex_byfecha($fec,$local);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}
	public function get_kardex_rptvalorizado($fecha){
			$local = $this->session->userdata('current_local')["nLocal_id"];
			$fec = date_create_from_format('Y-m-d', $fecha);
			$this->load->model('logistica/kardex_model','kar');
			$result = $this->kar->get_reporte_valorizado($fec,$local);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));		
	}

	//CARGAR DETALLES(TABLAS)
	public function get_log_detingprod($nIngProd_id){		

			$this->load->model('logistica/detingproducto_model','detingprod');
			$detalles=$this->detingprod->get_DetIngProducto($nIngProd_id);
			foreach ($detalles as $key => $detalle) 
			{
			    $detalles[$key]["estadolabel"] = '<span class="label label-success">Activo</span>';
			    $detalles[$key]["band"] = 1;

			}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $detalles)));		
	}

	public function get_log_detsalprod($nSalProd_id){		

			$this->load->model('logistica/detsalproducto_model','detsalprod');
			$detalles=$this->detsalprod->get_DetIngProducto($nSalProd_id);
			foreach ($detalles as $key => $detalle) 
			{
			    $detalles[$key]["estadolabel"] = '<span class="label label-success">Activo</span>';
			    $detalles[$key]["band"] = 1;

			}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $detalles)));		
	}

	public function get_log_detordpedido($nOrdPed_id){		

			$this->load->model('logistica/detordpedido_model','detordped');
			$detalles=$this->detordped->get_DetOrdPedido($nOrdPed_id);
			foreach ($detalles as $key => $detalle) 
			{
			    $detalles[$key]["estadolabel"] = '<span class="label label-success">Activo</span>';
			    $detalles[$key]["band"] = 1;

			}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $detalles)));		
	}
	public function cierremes(){		
			$id_local= $this->session->userdata('current_local')["nLocal_id"];
			$this->load->model('logistica/saldo_model','sal');
			$result=$this->sal->cierremes($id_local);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('Ok')));		
	}

	public function getdata_from_ruc($nro_ruc)
	{
		$this->load->helper(array('ganon'));
		$ruc_xml = file_get_dom("http://www.sunat.gob.pe/w/wapS01Alias?ruc=".$nro_ruc);

		$array_data = $ruc_xml('small');

		$correcto=$array_data[0];

		if ($correcto("b",0)->getPlainText()!="El numero Ruc ingresado es invalido.")
			$data_ruc = array(
				"valido"=>1,
				"ruc" => substr($array_data[0]->getPlainText(),13,11),
				"nombre" => substr($array_data[0]->getPlainText(),26),
				"estado" => substr($array_data[3]->getPlainText(),7),
				"direccion"=>substr($array_data[6]->getPlainText(),11),
				"situacion"=>substr($array_data[7]->getPlainText(),11),
				"dependencia"=>substr($array_data[9]->getPlainText(),13),
				"tipo"=>substr($array_data[10]->getPlainText(),6)
			);
		else
			$data_ruc = array("valido"=>0);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data_ruc));
	}
	
	public function get_log_ordcompmaterial($Desde,$Hasta){		
			$this->load->model('logistica/compramat_model','ocm');
			$ordmat = $this->ocm->get_fromrange($Desde,$Hasta);

			foreach ($ordmat as $key => $ordmats) {
			switch ($ordmats["cOrdComMatEst"]) {				
			    case 0:
			        $ordmat[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
			        break;
			    case 1:
			        $ordmat[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}

			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $ordmat)));		
		}
	}

	public function get_log_detordcomprasMateriales($nOrdenComMat_id)
	{		
			$this->load->model('logistica/detcompramat_model','detordcompra');
			$detalles=$this->detordcompra->get_DetOrdCompra($nOrdenComMat_id);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $detalles)));		
	}


	

}




