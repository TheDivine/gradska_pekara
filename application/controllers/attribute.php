<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attribute extends MY_Controller {
    
    public function __construct()
	{
		parent::__construct();

		$this->layout_view = 'admin';
		
		/*
		 * Checks if user is not logged in, 
		 * then redirects to login page.
		 */
		if(!$this->session->userdata('logged_in'))
			redirect('login');
		
		/*
		 * Load Models
		 */
		$this->load->model('attribute_model','attribute');
	}
	
	public function index()
	{
         /*
		 * Get all attributes
		 */
		$this->view_data['attributes'] = $this->attribute->get_all();
	}
	
	public function create()
	{
		if($_POST)
		{
			$this->load->library('form_validation');
			/*
			 * Validation rules
			*/
			$this->form_validation->set_rules('name_mk', 'name mk', 'required|trim');
			$this->form_validation->set_rules('name_sr', 'name sr', 'trim');
			$this->form_validation->set_rules('name_en', 'name en', 'trim');
			
			if($this->form_validation->run())
			{
				$this->attribute->insert($_POST);
					$this->session->set_flashdata('message','Attribute successfuly created!');
				
				redirect('attribute');
			}					
		}
	}
	
	public function edit($id)
	{
		$this->view_data['result'] = $this->attribute->get($id);
	}
	
	public function post_update()
	{
		if($this->attribute->update($_POST['id'],$_POST))
			$this->session->set_flashdata('message','Attribute successfuly updated!');
		
		redirect('attribute');
	}
	
	public function delete($id)
	{
		$this->attribute->delete($id);
			$this->session->set_flashdata('message','Attribute successfuly deleted!');
		
		redirect('attribute');
	}
}

/* End of file attribute.php */
/* Location: ./application/controllers/attribute.php */