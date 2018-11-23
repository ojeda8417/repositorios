<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}
	}
	public function index()
	{
		$dataheader['title'] = 'Sirad_erp - Productos -';
		$this->load->model('administracion/trabajadores_model','tra');
		$dataheader['trabaja']=$this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);
		$data["trabajador"] = $this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);		
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php',$data);
		$this->load->view('principal');
		$datafooter['jsvista'] = 'assets/js/jsvistas/principal.js';
		$datafooter['active'] = '';
		$datafooter['dropactive'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}