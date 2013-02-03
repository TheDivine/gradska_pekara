<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner extends MY_Controller {
    
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
		$this->load->model('partner_model','partner');
	}
	
	public function index()
	{
         /*
		 * Get all partners
		 */
		$this->view_data['partners'] = $this->partner->order_by('city')->get_all();
	}
	
	public function create()
	{
		if($_POST)
		{
			$this->load->library('form_validation');
			/*
			 * Validation rules
			*/
			$this->form_validation->set_rules('company', 'company', 'required|trim');
			$this->form_validation->set_rules('city', 'city', 'required|trim');
			$this->form_validation->set_rules('web', 'web', 'trim');
			$this->form_validation->set_rules('phone', 'phone', 'trim');
				
			if($this->form_validation->run())
			{
				if($this->partner->insert($_POST))
					$this->session->set_flashdata('message','Partner successfuly created!');
				
				redirect('partner');
			}
		}
	}
	
	public function edit($id)
	{
		$this->view_data['result'] = $this->partner->get($id);
	}

	public function post_update()
	{
		if($_POST)
		{
			$this->load->library('form_validation');
			/*
			 * Validation rules
			*/
			$this->form_validation->set_rules('company', 'company', 'required|trim');
			$this->form_validation->set_rules('city', 'city', 'required|trim');
			$this->form_validation->set_rules('web', 'web', 'trim');
			$this->form_validation->set_rules('phone', 'phone', 'trim');

			if($this->form_validation->run())
			{
				if($this->partner->update($_POST['id'],$_POST))
					$this->session->set_flashdata('message','Partner successfuly updated!');
				
				redirect('partner');
			}	
		}
	}
	
	public function activate($id)
	{
		$this->partner->update($id,array('status'=>'active'));
			$this->session->set_flashdata('message','Parnter activated!');
	
		redirect('partner');
	}
	
	public function deactivate($id)
	{
		$this->partner->update($id,array('status'=>'inactive'));
			$this->session->set_flashdata('message','Parnter deactivated!');
		
		redirect('partner');
	}

	public function delete($id)
	{
		$this->partner->delete($id);
			$this->session->set_flashdata('message','Partner successfuly deleted!');
		
		redirect('partner');
	}
}

/* End of file partner.php */
/* Location: ./application/controllers/partner.php */