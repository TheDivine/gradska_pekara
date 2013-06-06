<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{
	public static $open_methods = array('login','postLogin');

	public function __construct()
	{
		parent::__construct();

		$this->layout = 'layouts/admin';

		if((!$this->session->userdata('logged_in')) AND (!in_array($this->router->method,static::$open_methods)))
		{
			redirect('login');	
		}

		$this->load->library('form_validation');

		$this->load->model('users_model','user');
		$this->load->model('attribute_model','attribute');
		$this->load->model('attribute_category_model','attrcat');
		$this->load->model('category_model', 'category');
        $this->load->model('product_model', 'product');
        $this->load->model('partner_model', 'partner');
	}
}