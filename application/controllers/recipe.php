<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipe extends Admin_Controller {
    
    public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->data['recipes'] = $this->recipe->get_all();
	}

	public function create()
	{
		if($_POST)
		{
			if($_FILES['userfile']['name'])
			{
				$image = $this->_upload_image($_POST['permalink']);
		
				$_POST['image'] = $image['image'];
				$_POST['img_thumb'] = $image['img_thumb'];	
			}

			if($this->recipe->insert($_POST))
			{
				$this->session->set_flashdata('message','Recipe successfuly created!');
				redirect('recipe');
			}
		}

		$this->data['r_categories'] = $this->rc->order_by('name')->dropdown('id','name');
	}

	public function edit($id)
	{
		if(!$this->data['result'] = $this->recipe->get($id))
			show_404();

		if($_POST)
		{
			if(!isset($_POST['vegeterian']))
				$_POST['vegeterian'] = 0;
			if(!isset($_POST['fasting']))
				$_POST['fasting'] = 0;
			if(!isset($_POST['published']))
				$_POST['published'] = 0;

			if($_FILES['userfile']['name'])
			{
				$image = $this->_upload_image($_POST['permalink']);
		
				$_POST['image'] = $image['image'];
				$_POST['img_thumb'] = $image['img_thumb'];	
			}

			if($this->recipe->update($_POST['id'],$_POST))
			{
				$this->session->set_flashdata('message','Recipe successfuly updated!');
				redirect('recipe');
			}
		}

		$this->data['r_categories'] = $this->rc->order_by('name')->dropdown('id','name');
	}

	// public function post_update()
	// {
	// 	if($_POST)
	// 	{
	// 		if(!isset($_POST['vegeterian']))
	// 			$_POST['vegeterian'] = 0;
	// 		if(!isset($_POST['fasting']))
	// 			$_POST['fasting'] = 0;
	// 		if(!isset($_POST['published']))
	// 			$_POST['published'] = 0;

	// 		if($_FILES['userfile']['name'])
	// 		{
	// 			$image = $this->_upload_image($_POST['permalink']);
		
	// 			$_POST['image'] = $image['image'];
	// 			$_POST['img_thumb'] = $image['img_thumb'];	
	// 		}

	// 		if($this->recipe->update($_POST['id'],$_POST))
	// 		{
	// 			$this->session->set_flashdata('message','Recipe successfuly updated!');
	// 			redirect('recipe');
	// 		}
	// 		else
	// 		{
	// 			$this->session->set_flashdata('errors',validation_errors());
	// 			redirect($_SERVER['HTTP_REFERER']);
	// 		}
	// 	}		
	// }
	
	// public function post_create()
	// {
	// 	if($_POST)
	// 	{
			
	// 		if($this->recipe->insert($_POST))
	// 			redirect($_SERVER['HTTP_REFERER']);			
	// 	}
	// }
	/**
	 * Public (open) function, accessible by users.
	 * Displays recipe.
	 * @param  string $permalink Permalink
	 */
	public function view($permalink)
	{
		$this->layout_view = 'web';

		$this->view_data['recipe'] = $this->recipe->get_recipe($permalink);

		/*
		 * If recipe is not found (wrong permalink supplied),
		 * show 404 error
		 */
		if(!$this->view_data['recipe'])
			show_404();

		$this->view_data['rcname'] = $this->rc->get_by('id',$this->view_data['recipe']->r_category_id);
		$this->view_data['subt'] = $this->view_data['recipe']->name;
	}
	
	public function delete($id)
	{
		/**
		 * Only administrators can delete recipes
		 */
		if($this->session->userdata('is_admin') == 1)
			$this->recipe->delete($id);
		else
			$this->session->set_flashdata('message','Only admins can delete recipes!');

			redirect($_SERVER['HTTP_REFERER']);
	}

	private function _upload_image($file_name)
	{
		$this->load->library('upload');
			
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $file_name;
			
		$this->upload->initialize($config);
		
		
		if($this->upload->do_upload())
		{
			$results = $this->upload->data();
		
			$this->_create_thumbnail($results['file_name']);
		
			$data['image'] = '/uploads/'.$results['file_name'];
			$data['img_thumb'] = '/uploads/'.$results['raw_name'].'_thumb'.$results['file_ext'];
		}
		
		return $data;
	}
	
	private function _create_thumbnail($image)
	{
		$this->load->library('image_lib');
	
		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/' . $image;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 300;
		$config['height'] = 300;
		$config['new_image'] = './uploads/'.$image;
	
		$this->image_lib->initialize($config);
		 
		if(!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
	}
	
	public function make_permalink($string)
	{
		return url_title($string,'_',true);
	}
}

/* End of file recipe.php */
/* Location: ./application/controllers/recipe.php */