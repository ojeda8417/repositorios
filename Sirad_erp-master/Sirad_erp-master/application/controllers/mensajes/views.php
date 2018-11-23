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
		if($this->ion_auth->in_group_type(4))
		{
			$this->load->model('administracion/trabajadores_model','tra');
			$dataheader['title'] = 'Home Page';			
			$dataheader['trabaja']=$this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);
			$data["trabajador"] = $this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php',$data);
			$this->load->view('administracion/homepages.php');
			$datafooter['jsvista'] = base_url().'assets/js/jsvistas/administracion/homepages.js';
			$datafooter['active'] = '';			
			$datafooter['dropactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/', 'refresh');
	}

	public function producto_minstock()
	{
		$this->load->model('administracion/trabajadores_model','tra');
		$dataheader['title'] = 'Notificación';					
		$dataheader['trabaja']=$this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);
		$data["trabajador"] = $this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php',$data);
		$this->load->view('mensajes/producto_minstock.php');
		$datafooter['jsvista'] = base_url().'assets/js/jsvistas/mensajes/producto_minstock.js';
		$datafooter['active'] = '';
		$datafooter['dropactive'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}