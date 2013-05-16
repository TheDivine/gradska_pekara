<?php
class Admin_Controller extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->layout = 'layouts/admin';

		/*
		 * Checks if user is not logged in, and trying
		 * to access authenticated area, if so, redirects
		 * to login page.
		 */
		if((!$this->session->userdata('logged_in')) AND (!in_array($this->router->method,array('login'))))
		{
			redirect('login');	
		}
		
		/*
		 * Load Models
		 */
		$this->load->model('users_model','user');
		$this->load->model('attribute_model','attribute');
		$this->load->model('category_model', 'category');
        $this->load->model('product_model', 'product');
        $this->load->model('partner_model', 'partner');
	}
}