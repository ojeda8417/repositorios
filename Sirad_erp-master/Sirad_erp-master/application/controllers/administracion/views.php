<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler HomePages
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
		if($this->ion_auth->in_group_type(3))
		{			
			$dataheader['title'] = 'Home Page';		
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/homepages.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/homepages.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/', 'refresh');
	}

	/************************Cargos***************************************/
	public function cargos()
	{
		if($this->ion_auth->in_group("admin_cargo"))
		{
			$dataheader['title'] = 'Cargos';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/cargos.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/cargos.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**********************Categorias**********************************/
	public function categorias()
	{
		if($this->ion_auth->in_group("admin_categ"))
		{			
			$dataheader['title'] = 'Categorias';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');		
			$this->load->view('administracion/categorias');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/categorias.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}

	/*************************CONSTANTES***********************************/
	public function constantes()
	{
		if($this->ion_auth->in_group("admin_const"))
		{			
			$dataheader['title'] = 'Constantes';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/constantes.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/constantes.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/******************LOCALES***********************/
	public function locales()
	{
		if($this->ion_auth->in_group("admin_local"))
		{			
			$dataheader['title'] = 'Locales';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/locales.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/locales.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**********************MARCAS*******************************/
	public function marcas()
	{
		if($this->ion_auth->in_group("admin_marca"))
		{			
			$dataheader['title'] = 'Marcas';		
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/marcas.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/marcas.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/****************TIPO IGVS*******************/
	public function tipoIGV()
	{
		if($this->ion_auth->in_group("admin_igv"))
		{			
			$dataheader['title'] = 'Tipo IGV';		
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/tipoIGV.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/tipoIGV.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**************************TIPO MONEDAS*************************************/
	public function tipoMonedas()
	{
		if($this->ion_auth->in_group("admin_mon"))
		{			
			$dataheader['title'] = 'Tipo Moneda';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/tipoMonedas.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/tipoMonedas.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**************USUARIOS¨¨¨¨¨¨¨¨*******************/
	public function usuarios()
	{
		if($this->ion_auth->in_group("admin_us"))
		{
			$this->load->model('administracion/local_model','lo');			
			$dataview["locales"] = $this->lo->get_activos();
			$dataview["groups_ventas"] = $this->ion_auth->groups_bytipo(1);
			$dataview["groups_logistica"] = $this->ion_auth->groups_bytipo(2);
			$dataview["groups_administracion"] = $this->ion_auth->groups_bytipo(3);
			$dataheader['title'] = 'Usuarios';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/usuarios.php',$dataview);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/usuarios.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**********************ZONA EDIT************************/
	public function editar_zonasPersonal()
	{
		if($this->ion_auth->in_group("admin_pers"))
		{			
			$dataheader['title'] = 'Zona_Edit';		
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/editar_zonasPersonal.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/zona_edit.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**********ZONA PERSONAL**************/
	public function zona_personal()
	{
		if($this->ion_auth->in_group("admin_zonpers"))
		{			
			$dataheader['title'] = 'Zona_Edit';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/zona_personal.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/zona_personal.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/***********************ZONAS*************************/
	public function cons_zonas()
	{
		if($this->ion_auth->in_group("admin_zona"))
		{			
			$dataheader['title'] = 'Zonas';		
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/cons_zonas.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/zonas.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	
	//Trabajadores

	public function trabajadores()
	{
		if($this->ion_auth->in_group("admin_trab"))
		{			
			$dataheader['title'] = 'Trabajadores';			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/trabajadores.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/trabajadores.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}

	
    //Ofertas
	public function ofertas()
	{
		if($this->ion_auth->in_group("admin_ofert"))
		{			
			$dataheader['title'] = 'Ofertas';		
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/ofertas.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/ofertas.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}

	//Editar Ofertas
	public function editar_ofertas($nOferta_id)
	{
		if($this->ion_auth->in_group("admin_ofert"))
		{
			$this->load->model('administracion/oferta_model','ofertm');
			$pagedata = $this->ofertm->get_ofertas($nOferta_id);
			$dataheader['title'] = 'Ofertas';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/editar_ofertas.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/editar_ofertas.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}

	//Editar Ofertas
	public function change_password()
	{		
		$dataheader['title'] = 'Cambiar contraseña';		
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/change_password.php');
		$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/change_password.js';
		$datafooter['active'] = 'admin';
		$datafooter['dropactive'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function material()
	{
		if($this->ion_auth->in_group("admin_material"))
		{			
			$dataheader['title'] = 'Materiales';
			$pagedata["local"] = $this->session->userdata('current_local');			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/materiales.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/materiales.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}

	public function config_doc()
	{
		/*if($this->ion_auth->in_group("admin_material"))*/
		{			
			$dataheader['title'] = 'Configuración de Documentos';
			$pagedata["local"] = $this->session->userdata('current_local');			
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/config_doc.php',$pagedata);
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/config_doc.js';
			$datafooter['active'] = 'admin';
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		/*else
			redirect('/administracion', 'refresh');*/
	}

}