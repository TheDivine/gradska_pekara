<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Front_Controller {
    
    public function __construct()
	{
		parent::__construct();    
	}
	
	public function index()
	{
	    $this->data['subt'] = 'За Нас';  
	}
	
	public function categories($permalink = '')
	{
		/**
		 * If permalink is provided, fetch
		 * single category by permalink, else
		 * dispaly all categories
		 */
		if($permalink !== '')
		{
			$this->data['category'] = $this->category->get_by('permalink',(string)$permalink);
        
	        if(!$this->data['category']) show_404();

	        $this->data['subt'] = $this->data['category']->name_mk;
	        
	        $category_id = $this->data['category']->id;
	        
			$this->data['categories'] = $this->category->order_by('order')->get_many_by('status','active');
			
			$this->data['attributes'] = $this->category->get_attributes($category_id);
			
			$this->data['products']   = $this->product->order_by('order')->get_many_by('category_id',$category_id);
			
			$this->data['attr_count'] = count($this->data['attributes']);

	        $this->view = 'home/category';
		}
		else
		{
			$this->data['subt'] = 'Производи';
        
        	$this->data['categories'] = $this->category->order_by('order')->get_many_by('status','active');

        	$this->view = 'home/categories';	
		}
	}
	
	// public function partners()
	// {
 	// 		$this->data['subt'] = 'Партнери';
	// }

	public function catering()
	{
		$this->data['subt'] = 'Нарачки';
	}

	public function quality()
	{
		$this->data['subt'] = 'Квалитет';
	}

	public function caffe()
	{
		$this->data['subt'] = 'Кафе';
	}
	
	public function contact()
	{
    	$this->data['subt'] = 'Контакт';       
	}

	public function post_contact()
	{
		if(!$_POST) show_404();
		/*
		 * Honeypot
		 */
		if($_POST['yolo'] != '')
		{
			$this->output->set_header(200);
			exit;
		}

		if(!$this->input->is_ajax_request()) redirect('home/contact');
			
		$this->form_validation->set_rules('name', 'име', 'required|trim|min_lenght[3]|max_lenght[30]');
		$this->form_validation->set_rules('email', 'и-меил', 'valid_email|required|trim');
		$this->form_validation->set_rules('phone', 'телефон', 'trim|min_lenght[5]|max_lenght[30]');
		$this->form_validation->set_rules('message', 'порака', 'required|trim|min_lenght[10]');

		if ($this->form_validation->run())
		{
			$this->load->library('email');

			$this->email->from($_POST['email'], $_POST['name']);

			$this->email->to('info@gradskapekara.mk');
				
			$this->email->subject("Информации за {$_POST['name']} - gradskapekara.mk");

			$this->email->message($_POST['message']);

			if(!$this->news->get_by('email',$_POST['email']))
			{
				$this->news->insert(array('email'=>$_POST['email']));
			}
				
			if($this->email->send())
			{
				$this->output->set_header(200);
				echo json_encode('success');
			}
			else
			{
				$this->output->set_header(500);
			}
		}
		exit;
	}

	public function post_newsletter_email()
	{
		/*
		 * Saves email addresses into 
		 * database for Newsletter
		 */
		if($_POST)
		{
			/*
			 * Honeypot
			 */
			if($_POST['yolo'])
				/*
				 * Spam robot has submitted the form,
				 * ignore it.
				 */
				exit;
			
			/*
			 * Check if email already exist in database.
			 * Email does not exist in the database
			 */
			 if(!$this->news->get_by('email',$_POST['email']))
			 {
			 	/*
				 * Saves the email into the database
				 */
			 	$success = $this->news->insert(array('email'=>$_POST['email']));
			 	
				if($success)
					echo 'Вашата и-меил адреса е успешно внесена. Благодариме!';
				else
					echo 'Проблем при испраќање на формата. Обидете се повторно!';
			 }
			 else 
			 	/*
			 	 * Email already in database
			 	 */
			 	echo 'Вашиот и-меил е веќе во нашата листа.';			
		}
		exit;
	}
	
	// public function lang($lang)
	// {
	// 	//$languages = array('mk','sr','en');
	// 	/*
	// 		Only Macedonian is currently enabled
	// 	 */
	// 	$languages = array('mk');

	// 	if(!in_array($lang,$languages))
	// 		$lang = 'mk';
		
	// 	$this->session->set_userdata('lng',$lang);
	// 		redirect($_SERVER['HTTP_REFERER']);
	// }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */