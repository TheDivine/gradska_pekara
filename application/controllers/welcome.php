<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {
    
    protected $lng;
    
    public function __construct()
	{
		parent::__construct();
        
        /*
         * Get current language from SESSION,
         * if its not set, defaults to 'mk'
         */
         //if(!$this->session->userdata('lng'))
         $this->session->set_userdata('lng','mk');
            
         $this->lng = $this->session->userdata('lng');
         
         /*
          * Load Models
          */
         $this->load->model('category_model', 'category');
         $this->load->model('product_model', 'product');
         $this->load->model('partner_model', 'partner');
         $this->load->model('newsletter_model', 'news');
	}
	
	public function index()
	{
	    $this->view_data['subt'] = 'За Нас';  
	}
	
	public function categories()
	{
            $this->view_data['subt'] = 'Производи';
        
        $this->view_data['categories'] = $this->category->order_by('order')->get_many_by('status','active');
	}
    
    public function category($permalink = false)
	{
		$this->view_data['category'] = $this->category->get_by('permalink',$permalink);
        
        if(!$this->view_data['category'] OR $permalink == false)
        	redirect('products');
        
        $title = 'name_'.$this->lng;
        $this->view_data['subt'] = $this->view_data['category']->$title;
        
        $category_id = $this->view_data['category']->id;
        
        $this->view_data['categories'] = $this->category->order_by('order')->get_many_by('status','active');
        
        $this->view_data['attributes'] = $this->category->get_attributes($category_id);
        
        $this->view_data['products'] = $this->product->order_by('order')->get_many_by('category_id',$category_id);
        
        $this->view_data['attr_count'] = count($this->view_data['attributes']);    
	}
	
	// public function partners()
	// {
 	// 		$this->view_data['subt'] = 'Партнери';
	// }

	public function catering()
	{
            $this->view_data['subt'] = 'Нарачки';
	}

	public function caffe()
	{
            $this->view_data['subt'] = 'Кафе';
	}
	
	public function contact()
	{
    	$this->view_data['alert_name_req'] = 'Името е задолжително!';
    	$this->view_data['alert_email_req'] = 'И-меилот е задолжителен!';
    	$this->view_data['alert_email_inv'] = 'И-меилот што го внесовте е невалиден!';
    	$this->view_data['alert_msg_req'] = 'Мора да внесете порака!';
    	$this->view_data['alert_succ'] = '<p>Вашата порака е успешно испратена!</p>';
    	$this->view_data['alert_err'] = 'Проблем при испраќање на формата. Обидете се повторно!';
    	$this->view_data['subt'] = 'Контакт';       
	}
	
	public function post_contact_form()
	{
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
			 * Ajax Test. Checks whether user
			 * submited the form through AJAX request
			 * or standard HTTP POST
			 */
			(isset($_POST['ajax']) AND strlen($_POST['ajax'])) ? $ajax = true : $ajax = false;
				
				
			$this->form_validation->set_rules('name', 'име', 'required|trim');
			$this->form_validation->set_rules('email', 'И-меил', 'valid_email|required|trim');
			$this->form_validation->set_rules('phone', 'телефон', 'trim');
			$this->form_validation->set_rules('message', 'порака', 'required|trim');

			if ($this->form_validation->run())
			{
				/*
				 * If validation successfuly passed,
				 * sends the email and redirect to the contact page again.
				 */
				$this->load->library('email');

				$this->email->from($_POST['email'], $_POST['name']);
				$this->email->to('info@fortis.mk');
					
				$this->email->subject("Информации за {$_POST['name']} - Fortis");
				$this->email->message($_POST['message']);

				/*
				 * Checks if the email already exists in the newsletters
				 * database, if not - inserts it
				 */
				if(!$this->news->get_by('email',$_POST['email']))
					$this->news->insert(array('email'=>$_POST['email']));
					
				if($this->email->send())
				{
					/*
					 * Email successfuly sent
					 */
					if($ajax)
					{
						/*
						 * If sent through AJAX,
						 * resond success with 1, and exit
						 */
						echo 1;
						exit;
					}
					else
						/*
						 * If user's browser has disabled JS,
						 * redirect to main page
						 */
						redirect('welcome/index');
				}
				else
				{
					/*
					 * Email NOT sent!
					 */
					if($ajax)
						/*
						 * If sent through AJAX,
						 * exit (report error)
						 */
						exit;
					else
						/*
						 * If user's browser has disabled JS,
						 * redirect to contact page again
						 */
						redirect('welcome/contact');
				}
			}
			else
			{
				/*
				 * Validation failed
				 */
				if($ajax)
					exit;
				else 
					redirect('welcome/contact');
			}
		}
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