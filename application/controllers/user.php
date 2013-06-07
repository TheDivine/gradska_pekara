<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {
    
    public function __construct()
	{
		parent::__construct();

		//Controller is accessible only to full administrators
		if(!$this->session->userdata('is_admin')) show_404();
	}
	
	public function index()
	{
		$this->data['users'] = $this->user->get_all();
	}

	public function create()
	{
		if($_POST)
		{
			$this->form_validation->set_rules('username', 'username', 'required|trim|min_length[4]');
			$this->form_validation->set_rules('email', 'email', 'trim|valid_email');
			$this->form_validation->set_rules('password', 'password', 'required|matches[passconf]|min_length[4]');
			$this->form_validation->set_rules('passconf', 'password confirmation', 'required');
			$this->form_validation->set_rules('admin', 'admin', 'trim');
				
			if($this->form_validation->run())
			{
				if($this->user->insert($_POST))
				{
					$this->session->set_flashdata('message','User successfuly created!');
				}
				redirect('user');
			}
		}
	}

	public function edit($id)
	{
		$this->data['user'] = $this->user->get($id);

		if(!$this->data['user']) show_404();

		if($_POST)
		{
			if(!isset($_POST['admin'])) $_POST['admin'] = 0;

			$lastAdmin = $this->user->get_many_by('admin',1);

			if(1 === count($lastAdmin))
			{
				if($lastAdmin[0]->id === $_POST['id'])
				{
					if(isset($_POST['admin']) AND ($_POST['admin'] == 0))
					{
						$this->session->set_flashdata('message','Error! There has to be at least one administrator.');

						unset($_POST['admin']);

						redirect('user');
					}
				}
			}

			$this->form_validation->set_rules('username', 'username', 'required|trim|min_length[4]');
			$this->form_validation->set_rules('email', 'email', 'trim|valid_email');
			$this->form_validation->set_rules('password', 'password', 'matches[passconf]|min_length[4]');
			$this->form_validation->set_rules('passconf', 'password confirmation', '');
			$this->form_validation->set_rules('admin', 'admin', 'trim');

			if($this->form_validation->run())
			{
				if($this->user->update($_POST['id'],$_POST))
				{
					$this->session->set_flashdata('message','User successfuly updated!');
				}
				redirect('user');
			}
		}	
	}
	
	public function delete($id)
	{
		if(!$this->user->get($id)) 
		{
			$this->session->set_flashdata('message','User does not exist!');
			redirect('user');
		}

		$lastAdmin = $this->user->get_many_by('admin',1);

		if(1 === count($lastAdmin))
		{
			if($lastAdmin[0]->id === $id)
			{
				$this->session->set_flashdata('message','Error! There has to be at least one administrator.');
				redirect('user');
				exit;
			}
		}

		$this->user->delete($id);

		$this->session->set_flashdata('message','User successfuly deleted!');

		redirect('user');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */