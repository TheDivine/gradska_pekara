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
    //      $this->data['subt'] = 'Партнери';
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

            $this->email->from($this->input->post('email'), $this->input->post('name'));

            $this->email->to($this->config->item('appEmail'));
                
            $this->email->subject("Порака од {$this->input->post('name')} - {$this->config->item('appHost')}");

            $message = $this->input->post('message') . "\r\n";
            $message .= "--------------------------------------------------------------------\r\n";
            $message .= 'Request Time: ' . date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);
            $message .= 'Remote Address: ' . $_SERVER['REMOTE_ADDR'] . "\r\n";
            $message .= 'User Agent: ' . $_SERVER['HTTP_USER_AGENT']. "\r\n";

            $this->email->message($message);

            if(!$this->news->get_by('email',$this->input->post('email')))
            {
                $this->news->insert(array('email' => $this->input->post('email')));
            }
                
            if($this->email->send())
            {
                $this->output->set_header(200);
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
        if(!$_POST) show_404();
        /*
         * Honeypot
         */
        if($_POST['yolo'] != '')
        {
            $this->output->set_header(200);
            exit;
        }
            
        /*
        * Check if email already exist in database.
        * Email does not exist in the database
        */
        if(!$this->news->get_by('email',$_POST['email']))
        {
            if($this->news->insert(array('email'=>$_POST['email'])))
            {
                 $this->output->set_header(200);
            }
            else
            {
                $this->output->set_header(500);
            }   
        }    
        exit;
    }
    
    // public function lang($lang)
    // {
    //  //$languages = array('mk','sr','en');
    //  /*
    //      Only Macedonian is currently enabled
    //   */
    //  $languages = array('mk');

    //  if(!in_array($lang,$languages))
    //      $lang = 'mk';
        
    //  $this->session->set_userdata('lng',$lang);
    //      redirect($_SERVER['HTTP_REFERER']);
    // }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */