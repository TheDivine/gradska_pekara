<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
    
    public function __construct()
	{
		parent::__construct();

		$this->layout_view = 'admin';
		
		/*
		 * Checks if user is not logged in, 
		 * then redirects to login page.
		 */
		if((!$this->session->userdata('logged_in')) OR
			($this->session->userdata('is_admin') == 0))
			redirect('login');	
		
		/*
		 * Load Models
		 */
		$this->load->model('users_model','user');
	}
	
	public function index()
	{
        /*
		 * Get all recipes
		 */
		$this->view_data['users'] = $this->user->get_all();
	}

	public function create()
	{
		if($_POST)
		{
			$this->load->library('form_validation');
			/*
			 * Validation rules
			*/
			$this->form_validation->set_rules('password', 'password', 'requiredd');
			$this->form_validation->set_rules('username', 'username', 'required|trim');
			$this->form_validation->set_rules('email', 'email', 'required|trim');
			$this->form_validation->set_rules('admin', 'admin', 'trim');
				
			if($this->form_validation->run())
			{
				if($this->user->insert($_POST))
					$this->session->set_flashdata('message','User successfuly created!');
				
				redirect('user');
			}
		}
	}

	public function edit($id)
	{
		$this->view_data['user'] = $this->user->get($id);
	}

	public function post_update()
	{
		if($_POST)
		{
			if(!isset($_POST['admin']))
				$_POST['admin'] = 0;

			$this->load->library('form_validation');
			/*
			 * Validation rules
			*/
			$this->form_validation->set_rules('password', 'password', 'requiredd');
			$this->form_validation->set_rules('username', 'username', 'required|trim');
			$this->form_validation->set_rules('email', 'email', 'required|trim');
			$this->form_validation->set_rules('admin', 'admin', 'trim');

			if($this->form_validation->run())
			{
				if(!strlen($_POST['password']))
					unset($_POST['password']);

				if($this->user->update($_POST['id'],$_POST))
					$this->session->set_flashdata('message','User successfuly updated!');
		
				redirect('user');
			}
		}		
	}
	
	public function delete($id)
	{
		$this->user->delete($id);
			redirect($_SERVER['HTTP_REFERER']);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */