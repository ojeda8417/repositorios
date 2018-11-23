<?php
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Login producto
*/

class login extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$remember = (bool) $this->input->post('remember');
			if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'),$remember))
			{
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh'); 
			}
		}
		else
		{
			$dataheader['title'] = 'Login';
			$dataheader['isloginview'] = true;
			$this->load->view('templates/headers.php',$dataheader);
			$this->data['message'] = $this->session->flashdata('message');
			$this->load->view('login/login.php', $this->data);
			$datafooter['jsvista'] = '';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}
	public function logout()
	{
		$this->data['title'] = "Logout";
		$logout = $this->ion_auth->logout();
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('login', 'refresh');
	}

}

?>