<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	protected $open_methods = array('login');
	
    public function __construct()
	{
		parent::__construct();

		$this->layout_view = 'admin';

		/*
		 * Checks if user is not logged in, and trying
		 * to access authenticated area, if so, redirects
		 * to login page.
		 */
		if((!$this->session->userdata('logged_in')) AND 
			(!in_array($this->router->method,$this->open_methods)))
			redirect('login');
		
		/*
		 * Load Models
		 */
		$this->load->model('users_model','user');
		$this->load->model('attribute_model','attribute');
		$this->load->model('category_model', 'category');
        $this->load->model('product_model', 'product');
        $this->load->model('partner_model', 'partner');
	}
	
	public function index()
	{
		/*
		 * Get all categories
		 */
		$this->view_data['categories'] = $this->category->order_by('order')->get_all();
	}
	
	public function login()
	{
		/*
		 * If user is logged in, redirects to
		 * index page of this controller
		 */
		if($this->session->userdata('logged_in') == true)
			redirect('dashboard');
		
		if($_POST)
		{
			if($this->_check_login($_POST['username'],$_POST['password']))
				redirect('dashboard');
			else
				redirect('login');
		}
	}
	
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
	
	public function logout()
	{
		/*
		 * Destroy session and redirects
		 * to index page of this controller
		 */
		$this->session->sess_destroy();
		
		redirect('login');
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */