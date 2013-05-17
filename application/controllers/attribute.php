<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attribute extends Admin_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->data['attributes'] = $this->attribute->get_all();
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
		$this->data['result'] = $this->attribute->get($id);

		if(!$this->data['result']) show_404();

		if($_POST)
		{
			$this->form_validation->set_rules('name_mk', 'name mk', 'required|trim');
			$this->form_validation->set_rules('name_sr', 'name sr', 'trim');
			$this->form_validation->set_rules('name_en', 'name en', 'trim');
			
			if($this->form_validation->run())
			{
				if($this->attribute->update($_POST['id'],$_POST))
				{
					$this->session->set_flashdata('message','Attribute successfuly updated!');
					redirect('attribute');
				}
			}
		}
	}
	
	public function delete($id)
	{
		$this->attribute->delete($id);
		{
			$this->session->set_flashdata('message','Attribute successfuly deleted!');
		}
		
		redirect('attribute');
	}
}

/* End of file attribute.php */
/* Location: ./application/controllers/attribute.php */