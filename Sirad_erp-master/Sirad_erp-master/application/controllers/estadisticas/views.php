<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler producto
*/
class views extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if ($this->ion_auth->logged_in())
		{
			if(!$this->ion_auth->selected_local())
				redirect('auth/select_local', 'refresh');
		}
		else
			redirect('login', 'refresh');
	}

	public function index()
	{
		if($this->ion_auth->in_group_type(4))
		{			
			$dataheader['title'] = 'Estadisticas';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('estadisticas/homepage.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/estadisticas/homepage.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/', 'refresh');
	}

	public function homepage_estadistica_logistica()
	{
		if($this->ion_auth->in_group_type(4))
		{			
			$dataheader['title'] = 'Estadisticas';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('estadisticas/homepage_estadistica_logistica.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/estadisticas/homepage.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/', 'refresh');
	}

	public function homepage_estadistica_venta()
	{
		if($this->ion_auth->in_group_type(4))
		{			
			$dataheader['title'] = 'Estadisticas';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('estadisticas/homepage_estadistica_venta.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/estadisticas/homepage.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/', 'refresh');
	}

	public function ventas_por_cliente()
	{
		/*if($this->ion_auth->in_group(""))*/
		{
			$dataheader['title'] = 'Ventas por Clientes - ';			
			$pagedata["local"] = $this->session->userdata('current_local');
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('estadisticas/ventas_por_clientes.php',$pagedata);
			//$datafooter['jsvista'] = base_url().'assets/js/jsvistas/estadisticas/vent_by_cli.js';
			//$datafooter['jsvista'] = base_url().'assets/js/jsvistas/estadisticas/ventas_por_cliente.js';
			$datafooter['active'] = 'ventas_por_cliente';
			$datafooter['dropactive'] = 'dropestadistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		/*else
			redirect('/estadisticas', 'refresh');*/
	}

	public function ventas_por_producto()
	{
		/*if($this->ion_auth->in_group(""))*/
		{
			$dataheader['title'] = 'Ventas por Productos - ';			
			$pagedata["local"] = $this->session->userdata('current_local');
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('estadisticas/ventas_por_productos.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/estadisticas/ventas_por_productos.js';
			$datafooter['active'] = 'vent_prod';
			$datafooter['dropactive'] = 'dropestadistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		/*else
			redirect('/estadisticas', 'refresh');*/
	}

	public function ingr_egr_general()
	{
		/*if($this->ion_auth->in_group(""))*/
		{
			$dataheader['title'] = 'Ingresos y Egresos Generales - ';			
			$pagedata["local"] = $this->session->userdata('current_local');
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('estadisticas/ing_egr_generales.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/estadisticas/ingr_egre_gen.js';
			$datafooter['active'] = 'ingr_egre_gen';
			$datafooter['dropactive'] = 'dropestadistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		/*else
			redirect('/estadisticas', 'refresh');*/
	}
	public function vent_by_cli_prod()
	{
		/*if($this->ion_auth->in_group(""))*/
		{
			$dataheader['title'] = 'Ventas por Clientes y Productos - ';			
			$pagedata["local"] = $this->session->userdata('current_local');
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('estadisticas/vent_client_prod.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/estadisticas/vent_by_cli_prod.js';
			$datafooter['active'] = 'vent_by_cli_prod';
			$datafooter['dropactive'] = 'dropestadistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		/*else
			redirect('/estadisticas', 'refresh');*/
	}
	public function ingr_egre_by_prod()
	{
		/*if($this->ion_auth->in_group(""))*/
		{
			$dataheader['title'] = 'Ingresos y Egresos por Producto - ';			
			$pagedata["local"] = $this->session->userdata('current_local');
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('estadisticas/ing_egr_by_prod.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/estadisticas/ingr_egre_by_prod.js';
			$datafooter['active'] = 'ingr_egre_by_prod';
			$datafooter['dropactive'] = 'dropestadistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		/*else
			redirect('/estadisticas', 'refresh');*/
	}

	
}