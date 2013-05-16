<?php
class Front_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->session->set_userdata('lng','mk');

		$this->lng = 'mk';

		$this->load->model('category_model', 'category');
		$this->load->model('product_model', 'product');
		$this->load->model('partner_model', 'partner');
		$this->load->model('newsletter_model', 'news');
	}
}