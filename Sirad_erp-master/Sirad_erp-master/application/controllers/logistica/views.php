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
		if($this->ion_auth->in_group_type(2))
		{			
			$dataheader['title'] = 'Logistica';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/homepage.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/homepage.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/', 'refresh');
	}

	public function cons_ordencompra()
	{
		if($this->ion_auth->in_group("log_ord_comp"))
		{			
			$dataheader['title'] = 'Orden de Compras - ';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/cons_ordencompras.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/cons_ordencompras.js';
			$datafooter['active'] = 'ord_com';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function reg_ordencompra()
	{
		if($this->ion_auth->in_group("log_ord_comp"))
		{
			$dataheader['title'] = 'OrdenCompras (Registrar)';			
			$pagedata["local"] = $this->session->userdata('current_local');			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/reg_ordencompras.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/reg_ordencompras.js';
			$datafooter['active'] = 'ord_com';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function ver_ordencompras($nOrdenCom_id)
	{
		if($this->ion_auth->in_group("log_ord_comp"))
		{
			$this->load->model('logistica/ordcompra_model','ordcomp');
			$dataheader['title'] = 'OrdenCompras (Ver)';			
			$pagedata = $this->ordcomp->get_OrdCompra_views($nOrdenCom_id);				
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/ver_ordencompras.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/ver_ordencompras.js';
			$datafooter['active'] = 'ord_com';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function cons_ingresoproductos()
	{
		if($this->ion_auth->in_group("log_ing_prod"))
		{
			$dataheader['title'] = 'Ingreso Productos - ';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/cons_ingresoproductos.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/cons_ingresoproductos.js';
			$datafooter['active'] = 'ing_prod';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}	
	public function reg_ingresoproductos()
	{
		if($this->ion_auth->in_group("log_ing_prod"))
		{
			$dataheader['title'] = 'Ingreso Productos (Registrar)';
			$pagedata["local"] = $this->session->userdata('current_local');			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/reg_ingresoproductos.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/reg_ingresoproductos.js';
			$datafooter['active'] = 'ing_prod';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}
	public function editar_ingresoproductos($nIngProd_id)
	{
		if($this->ion_auth->in_group("log_ing_prod"))
		{
			$this->load->model('logistica/ingproducto_model','ingprod');
			$dataheader['title'] = 'Ingreso Productos (Editar)';	
			$pagedata = $this->ingprod->get_IngProducto($nIngProd_id);			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/editar_ingresoproductos.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/editar_ingresoproductos.js';
			$datafooter['active'] = 'ing_prod';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}
	public function ver_ingresoproductos($nIngProd_id)
	{
		if($this->ion_auth->in_group("log_ing_prod"))
		{
			$this->load->model('logistica/ingproducto_model','ingprod');
			$dataheader['title'] = 'Ingreso Productos (Ver)';				
			$pagedata = $this->ingprod->get_IngProducto($nIngProd_id);			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/ver_ingresoproductos.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/ver_ingresoproductos.js';
			$datafooter['active'] = 'ing_prod';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function kardex()
	{
		if($this->ion_auth->in_group("log_gen_kardex"))
		{
			$dataheader['title'] = 'Kardex - ';			
			$pagedata["local"] = $this->session->userdata('current_local');			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/kardex.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/kardex.js';
			$datafooter['active'] = 'gen_kardex';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function productos()
	{
		if($this->ion_auth->in_group("log_prod"))
		{
			$dataheader['title'] = 'Productos - ';			
			$pagedata["local"] = $this->session->userdata('current_local');
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/productos.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/productos.js';
			$datafooter['active'] = 'admin_prod';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function proveedores()
	{
		if($this->ion_auth->in_group("log_prove"))
		{
			$dataheader['title'] = 'Proveedores - ';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/proveedores.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/proveedores.js';
			$datafooter['active'] = 'admin_provee';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function cons_salidaproductos()
	{
		if($this->ion_auth->in_group("log_sal_prod"))
		{
			$dataheader['title'] = 'Salida Productos - ';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/cons_salidaproductos.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/cons_salidaproductos.js';
			$datafooter['active'] = 'sal_prod';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}
	public function reg_salidaproductos()
	{
		if($this->ion_auth->in_group("log_sal_prod"))
		{
			$dataheader['title'] = 'Salida Productos (Registrar) ';			
			$pagedata["local"] = $this->session->userdata('current_local');			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/reg_salidaproductos.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/reg_salidaproductos.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function ver_salidaproductos($nSalProd_id)
	{
		if($this->ion_auth->in_group("log_sal_prod"))
		{
			$this->load->model('logistica/salproducto_model','salprod');			
			$dataheader['title'] = 'Salida Productos (Ver)';
			$pagedata = $this->salprod->get_SalProducto($nSalProd_id);
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/ver_salidaproductos.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/ver_salidaproductos.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function saldo_inicial()
	{
		if($this->ion_auth->in_group("log_sal_ini"))
		{
			$dataheader['title'] = 'Saldo Inicial - ';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/saldo_inicial.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/saldo_inicial.js';
			$datafooter['active'] = 'saldos';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}
	public function cons_ordencompra_mat()
	{
		if($this->ion_auth->in_group("log_ord_com_mat"))
		{			
			$dataheader['title'] = 'Orden de Compras Materiales - ';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/cons_compras_mat.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/cons_compras_mat.js';
			$datafooter['active'] = 'ord_mat';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function reg_ordencompra_mat()
	{
		//if($this->ion_auth->in_group("log_ord_com_mat"))
		//{			
			$dataheader['title'] = 'Registrar Compra Materiales - ';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/reg_compras_mat.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/reg_compras_mat.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		//}
		//else
		//	redirect('/logistica', 'refresh');
	}
	public function ver_ordencomprasmat($nOrdenComMat_id)
	{
		if($this->ion_auth->in_group("log_ord_com_mat"))
		{
			$this->load->model('logistica/compramat_model','ordcomp');
			$dataheader['title'] = 'Orden Materiales (Ver)';			
			$pagedata = $this->ordcomp->get_OrdCompraMat_views($nOrdenComMat_id);				
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/ver_ordenMateriales.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/logistica/ver_ordenMateriales.js';
			$datafooter['active'] = 'ord_com';
			$datafooter['dropactive'] = 'droplogistica';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	/*public function cons_pedidos()
	{
		if($this->ion_auth->in_group("log_ord_ped"))
		{
			$dataheader['title'] = 'Dicars - Pedidos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/pedidos.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/pedidos.js';
			$datafooter['active'] = 'ord_ped';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function reg_pedidos()
	{
		if($this->ion_auth->in_group("log_ord_ped"))
		{
			$this->load->model('administracion/Trabajadores_Model','tra');
			$pagedata["trabajador"] = $this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);
			$pagedata["local"] = $this->session->userdata('current_local');
			$dataheader['title'] = 'Dicars - Pedidos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/reg_pedidos.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_pedidos.js';
			$datafooter['active'] = 'ord_ped';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	}

	public function ver_pedidos($nOrdPed_id)
	{
		if($this->ion_auth->in_group("log_ord_ped"))
		{
			$this->load->model('logistica/OrdPedido_Model','ordped');
			$pagedata = $this->ordped->get_OrdPedido_Views($nOrdPed_id);
			$dataheader['title'] = 'Dicars - Pedidos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/ver_pedidos.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_pedidos.js';
			$datafooter['active'] = 'ord_ped';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/logistica', 'refresh');
	} */
	
}