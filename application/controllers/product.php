<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends Admin_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
         
	}

	public function edit($id)
	{
		$this->data['result'] = $this->product->get($id);

		if(!$this->data['result']) show_404();

		if($_POST)
		{
			if(!isset($_POST['stock'])) $_POST['stock'] = 0;

			if($this->product->update($_POST['id'],$_POST))
			{
				$this->session->set_flashdata('message','Product successfuly updated!');
			}

			redirect("category/view/{$this->data['result']->category_id}");
		}
	}
	
	public function post_create()
	{
		if($_POST)
		{
			$this->form_validation->set_rules('val1', 'value 1', 'required|trim');

			if($this->form_validation->run())
			{
				$this->product->insert($_POST);	
			}

			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function post_delete($id)
	{
		$this->product->delete($id);
		
		redirect($_SERVER['HTTP_REFERER']);
	}
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */