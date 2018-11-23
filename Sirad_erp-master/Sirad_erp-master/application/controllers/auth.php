<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	

	//redirect if needed, otherwise display the user list
	function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

			$this->_render_page('auth/index', $this->data);
		}
	}

	public function login()
	{
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$this->load->model('ventas/inicie_caja_model','inicie');
			$remember = (bool) $this->input->post('remember');
			if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'),$remember))
			{
				$this->session->set_flashdata('message', $this->ion_auth->messages());

				$this->inicie->get_EstadoCaja();				
				
				$this->load->model('administracion/trabajadores_model','tra');
				$trabajador=$this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);

				$this->session->set_userdata('trabajador',$trabajador);

				redirect('auth/select_local', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh'); 
			}
		}
		else
		{
			$dataheader['title'] = 'SIRAD ERP - Login -';
			$dataheader['isloginview'] = true;
			$this->load->view('templates/headers.php',$dataheader);
			$this->data['message'] = $this->session->flashdata('message');
			$this->load->view('login/login.php', $this->data);
			$datafooter['jsvista'] = '';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
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

	public function select_local()
	{
		if ($this->ion_auth->logged_in())
		{
			$this->load->model('administracion/Local_Model','lo');
			if(isset($_POST) && !empty($_POST))
			{
				$current_local = $this->lo->get_locales($this->input->post('local'));
				$this->session->set_userdata('current_local', $current_local);
				redirect('/', 'refresh');
			}
			else
			{
				$dataheader['isloginview'] = true;
				$dataview["locales"] = $this->lo->by_user($this->session->userdata('user_id'));
				$dataheader['title'] = 'Sirad - Select Local';
				$this->load->view('templates/headers.php',$dataheader);
				$this->load->view('login/select_local.php', $dataview);
				$datafooter['jsvista'] = '';
				$datafooter['active'] = '';
				$datafooter['dropactive'] = '';
				$this->load->view('templates/footer.php',$datafooter);
			}
		}
		else
			redirect('login', 'refresh');
	}


	public function getUsersAll(){
		$result = $this->ion_auth->users_personal();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	function forgot_password()
	{	
		if(isset($_POST['email']))
		{
			if($_POST['email'] != "")
			{
				$identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
		        if(empty($identity)) 
		        {
		            $this->ion_auth->set_message('forgot_password_email_not_found');
		            $this->session->set_flashdata('message', $this->ion_auth->messages());
		            redirect("auth/forgot_password", 'refresh');
		        }
		        
				//run the forgotten password method to email an activation code to the user
				$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

				if ($forgotten)
				{
					//if there were no errors
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect("auth/forgot_password", 'refresh');
				}
			}
			else
			{
				$this->ion_auth->set_message('forgot_password_email_not_found');
	            $this->session->set_flashdata('message', $this->ion_auth->messages());
	            redirect("auth/forgot_password", 'refresh');
			}
		        
		}
		else
		{
			$this->data['message'] = $this->session->flashdata('message');
			$dataheader['isloginview'] = true;
			$dataheader['title'] = 'Dicars - Select Local';
			$this->load->view('templates/headers.php',$dataheader);			
			$this->load->view('login/forgot_password',$this->data);
			$datafooter['jsvista'] = '';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	//change password
	function change_password()
	{
		if ($this->ion_auth->logged_in())	
		{	
			if(isset($_POST) && !empty($_POST))
			{
				$form = $this->input->post('formulario');				
				$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));
				$change = $this->ion_auth->change_password($identity,$form["oldpassword"], $form["password"]);
				if ($change)
					$this->logout();
				else
					$this->output->set_status_header('400');
			}	
			else
				$this->output->set_status_header('400');
		}
		else
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("finish"));
	}

	//activate the user
	function activate()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$activation = $this->ion_auth->activate($this->input->post('user_id'));
			if (!$activation)
				$this->output->set_status_header('400');
		}

		$this->output
				->set_content_type('application/json')
				->set_output(json_encode("finish"));
	}

	//deactivate the user
	function deactivate()
	{
		$is_admin = FALSE;
		if(isset($_POST) && !empty($_POST))
		{
			$user_id = $this->input->post('user_id');
			if(!$this->ion_auth->is_admin($user_id))
				$this->ion_auth->deactivate($user_id);
			else
				$is_admin = TRUE;
		}
		else
			$this->output->set_status_header('400');

		$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array("is_admin"=>$is_admin)));
	}

	//create a new user
	function create_user()
	{
		$this->load->model('administracion/UserLocal_Model','ulom');
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('login', 'refresh');
		}
		if(isset($_POST) && !empty($_POST))
		{
			$formserialized = $this->input->post("formulario");
			$form = array();
			parse_str($formserialized,$form);
			$user_id = $this->ion_auth->register($form["username"],  $form["password"], $form["email"], array(
				'nPersonal_id' => $form["nPersonal_id"]), $form["groups"]);

			if ($user_id === FALSE)
				$this->output->set_status_header('400');
			else
			{
				$UserLocal = array();
				foreach ($form["locales"] as $local) 
					$UserLocal[] = array("nLocal_id"=>$local,"users_id"=> $user_id);
				if(!$this->ulom->insert_batch($UserLocal))
					$this->output->set_status_header('400');
			}
		}
		else
			$this->output->set_status_header('400');

		$this->output
				->set_content_type('application/json')
				->set_output(json_encode("finish"));
	}

	//edit a user
	function edit_user()
	{
		$this->load->model('administracion/UserLocal_Model','ulom');
		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}
		if(isset($_POST) && !empty($_POST))
		{
			$formserialized = $this->input->post("formulario");
			$form = array();
			parse_str($formserialized,$form);
			$user_id = $form["user_id"];

			if(!$this->ion_auth->is_admin($user_id))
			{
				if($form["password"]!="")
				{
					$data = array("password" => $form["password"]);
					$this->ion_auth->update($user_id, $data);
				}

				if (isset($form["groups"]) && !empty($form["groups"]))
				{			
					$this->ion_auth->remove_from_group('', $user_id);
					foreach ($form["groups"] as $grp)
					{
						$this->ion_auth->add_to_group($grp, $user_id);
					}
				}
				if($this->ulom->clear($user_id))
				{
					$UserLocal = array();
					foreach ($form["locales"] as $local) 
						$UserLocal[] = array("nLocal_id"=>$local,"users_id"=> $user_id);
					if(!$this->ulom->insert_batch($UserLocal))
						$this->output->set_status_header('400');
				}
			}
		}
		else
			$this->output->set_status_header('400');

		$this->output
				->set_content_type('application/json')
				->set_output(json_encode("finish"));
	}

	// create a new group
	function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		if (isset($_POST['group_name']) && isset($_POST['description']))
		{
			$additional_data = array(
				"tipo"=>$this->input->post('tipo')
				);
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'),$additional_data);
			if($new_group_id)
			{
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->_render_page('auth/create_group', $this->data);
		}
	}

	//edit a group
	/*function edit_group($id)
	{
		// bail if no group id given
		if(!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		//validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash|xss_clean');
		$this->form_validation->set_rules('group_description', $this->lang->line('edit_group_validation_desc_label'), 'xss_clean');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['group'] = $group;

		$this->data['group_name'] = array(
			'name'  => 'group_name',
			'id'    => 'group_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_name', $group->name),
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth/edit_group', $this->data);
	}


	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}*/

	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}

}
