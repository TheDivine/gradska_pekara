<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
	
    public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			redirect('category/index');	
		}
		
		$this->login();
	}
	
	public function login()
	{
		if($this->session->userdata('logged_in'))
		{
			redirect('category/index');	
		}
	}

	public function postLogin()
	{
		if(!$_POST) show_404();

		if($this->_check_login($_POST['username'],$_POST['password']))
		{
			if($this->input->is_ajax_request())
			{
				$this->output->set_status_header(200);
				echo site_url('category/index');
				exit;
			}
			else
			{
				redirect('category/index');
			}
		}
		if($this->input->is_ajax_request())
		{
			$this->output->set_status_header(401);
			exit;
		}
		else
		{
			redirect('admin/login');
		}
	}
	
	public function logout()
	{
		/*
		 * Destroy session and redirects
		 * to index page of this controller
		 */
		$this->session->sess_destroy();
		
		redirect('login');
	}

	////////////////////////
	// PRIVATE FUNCTION  //
	////////////////////////
	private function _check_login($username, $password)
	{
		/*
		 * Checks username and password,
		 * and sets session data if valid
		 */
		$user = $this->user->check_login($username,$password);
		
		if($user)
		{
			/*
			 * Login successful!
			 * Sets session user data
			 */
			$this->session->set_userdata('logged_in',true);
			$this->session->set_userdata('user_id',$user->id);
			$this->session->set_userdata('username',$user->username);
			$this->session->set_userdata('is_admin',$user->admin);
			
			return true;
		}
		
		return false;
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */