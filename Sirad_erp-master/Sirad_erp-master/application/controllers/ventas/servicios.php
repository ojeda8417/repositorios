<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class servicios extends CI_Controller {
	
	public function getClientes()
	{
		$this->load->model('ventas/clientes_model','climod');
		$result = $this->climod->get_clientes();
	$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


	public function getProductosToVenta()
	{
		$this->load->model('logistica/producto_model','prodm');
		$productos = $this->prodm->get_toventas();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $productos)));
	}	

	public function getMovimientos($Desde,$Hasta)
	{
		$this->load->model('ventas/movimientos_model','amm');		
		$result = $this->amm->get_fromrange($Desde,$Hasta);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getClientes_cronograma()
	{
		$this->load->model('ventas/clientes_model','climod');
		$result = $this->climod->get_clientes();
		foreach ($result as $key => $value) {							
				$result[$key]["boton"] = "<a class='btn btn-success btn-sm btn-pagar' href='cronogramas_detalle/".$value["nCliente_id"]."' ><i class='icon-zoom-in icon-white'></i>
									Ver Creditos</a>";
		}
	$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_detallecronograma_bycliente($nCliente_id)
	{
		$this->load->model('ventas/ventacredito_model','cred');
		$result = $this->cred->get_Creditos_ByClientes($nCliente_id);
			foreach ($result as $key => $value) {
				if($value["creditoest"] == 2)
				{
					$result[$key]["estadolabel"] = "<span class='label label-success'>Pagada</span>";
					$result[$key]["btnpagar"] = "";
					$result[$key]["btnreporte"] = "<button type='button' class='btn btn-sm btn-success btn-cronograma' data-loading-text='Cargando...'>Reporte del Crédito</button>";		
				}else{
					$result[$key]["estadolabel"] = "<span class='label label-danger'>Pendiente</span>";
					$result[$key]["btnpagar"] = "<a class='btn btn-success btn-sm btn-pagar' href='#'>Pagar Cuotas</a>";
					$result[$key]["btnreporte"] = "<a  class='btn btn-success btn-sm btn-cronograma'>Reporte del Crédito</a>";
				}
			}
	$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}	


	public function getVentas($Desde,$Hasta)
	{
		$this->load->model('ventas/venta_model','venm');
		$result = $this->venm->get_fromrange($Desde,$Hasta);

		foreach ($result as $key => $value) {
			switch ($value["cVentaEst"]) {		
			    case 0:
			        $result[$key]["estadolabel"] = '<span class="label label-danger">Anulada</span>';
			        break;
			    case 1:
			        $result[$key]["estadolabel"] = '<span class="label label-info">Credito</span>';
			        break;
			    case 2:
			        $result[$key]["estadolabel"] = '<span class="label label-success">Pagada</span>';
			        break;
			    case 3:
			        $result[$key]["estadolabel"] = '<span class="label label-warning">Separacion</span>';
			        break;
			}
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getClienteZona($nZona_id)
	{
		$this->load->model('ventas/reportezonas_model','rptzm');
		$result = $this->rptzm->get_clinZon($nZona_id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_clientemorosos()
	{
		$this->load->model('ventas/clientes_model','cli');
		$result = $this->cli->get_clientesmorosos();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}
	public function get_clientemorosos_detallado()
	{
		$this->load->model('ventas/clientes_model','cli');
		$result = $this->cli->get_clientesmorosos_detallado();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}	

	public function get_reporteIngEgre_byfecha($Tipo,$fecha)
	{	
		$this->load->model('ventas/reporteingegr_model','rpteim');	
		$result = $this->rpteim->get_reporteIngEgre_byfecha($Tipo,$fecha);
		$this->output
		->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function reporte_ventas_bytienda()
	{		
		$tipo=1;
		$fecIni =  $this->input->post('date1',true);
		$fecFin=   $this->input->post('date2',true);
		$cliente=  $this->input->post('cliente',true);
		$vendedor=  $this->input->post('vendedor',true);
		$estado=  $this->input->post('estado',true);
		$tipoPago=  $this->input->post('tipoPago',true);
		$id_local= intval($this->session->userdata('current_local')["nLocal_id"]);
			
		$RepVenta = array($tipo,$fecIni,$fecFin,$cliente,$vendedor,$estado,$tipoPago,$id_local);

		$this->load->model('ventas/venta_model','ven');
		$result = $this->ven->reporte_ventas_bytienda($RepVenta);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));		
	}

	public function reporte_ventas_byzona()
	{		
		$tipo=1;
		$fecIni = $this->input->post('date01zona',true);
		$fecFin=  $this->input->post('date02zona',true);
		$cliente= $this->input->post('clienteZona',true);
		$vendedor= $this->input->post('vendedorZona',true);
		$estado= $this->input->post('estadoZona',true);
		$tipoPago= $this->input->post('selectTipoPag_byZona',true);
		$id_local=intval($this->session->userdata('current_local')["nLocal_id"]);
		
		$RepVenta = array($tipo,$fecIni,$fecFin,$cliente,$vendedor,$estado,$tipoPago,$id_local);
		
		$this->load->model('ventas/venta_model','ven');
		$result = $this->ven->reporte_ventas_byzona($RepVenta);
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($result));			
	}

	public function get_cronogramabyCredito($nVenCredito_id)
	{

		$this->load->model('ventas/ventacronograma_model','cronom');
		$result = $this->cronom->get_byCredito($nVenCredito_id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}


	public function get_cronpago_venta($nVenta_id)
	{
		$this->load->model('ventas/venta_model','venm');
		$this->load->model('ventas/detalleventa_model','detvenm');
		$this->load->model('ventas/ventacronograma_model','cronom');
		$Venta = $this->venm->get_venta($nVenta_id);
		$DetVenta = $this->detvenm->get_detalles($nVenta_id);
		$Cuotas = $this->cronom->get_byVenta($nVenta_id);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array(
				'detventas' => $DetVenta,
				'cuotas' => $Cuotas,
				'fecreg' => $Venta["cVentaFecReg"],
				'vendedor' => $Venta["Vendedor"],
				'amortizacion' => $Venta["nVentaTotAmt"],
				'monto' => $Venta["Total"],
				'nVenta_id' => $Venta["nVenta_id"],
				'cliente' => $Venta["Cliente"])));
	}

	public function getCaja()
	{
		$this->load->model('ventas/inicie_caja_model','acm');
		$result = $this->acm->get_caja();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getCuadrecaja()
	{
		$this->load->model('ventas/cuadre_caja_model','acm');
		$result = $this->acm->get_cuadrecaja();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function ingreso_egreso()
	{
		$this->load->model('ventas/cuadre_caja_model','ccm');
		$id_local=intval($this->session->userdata('current_local')["nLocal_id"]);
		$id_caja=$this->session->userdata('id_Caja');
		$result = $this->ccm->egreso($id_caja,$id_local);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	public function getDetalleCaja_byCaja($nCaja_id )
	{
		$this->load->model('ventas/inicie_caja_model','acm');
		$id_local=intval($this->session->userdata('current_local')["nLocal_id"]);		
		$result = $this->acm->getDetalleCaja_byCaja($nCaja_id );
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


	public function getMovimiento_byCaja($nCaja_id)
	{
		$this->load->model('ventas/inicie_caja_model','acm');
		$id_local=intval($this->session->userdata('current_local')["nLocal_id"]);
		$result = $this->acm->getMovimientos_byCaja($nCaja_id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


	public function get_serienumero($idTipo)
	{
		$this->load->model('ventas/venta_model','vm');
		$result = $this->vm->get_serie_numero($idTipo);
	}
	public function getClientes_byEmpresa()
	{
		$this->load->model('ventas/clientes_model','climod');
		$result = $this->climod->getClientes_byEmpresa();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}
	public function getClientes_Empresas()
	{
		$this->load->model('ventas/clientes_model','climod');
		$result = $this->climod->get_clientes_empresas();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	

	
}

