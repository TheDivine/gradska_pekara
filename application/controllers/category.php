<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Admin_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->data['categories'] = $this->category->order_by('order')->get_all();
    }
    
    public function create()
    {
        if($_POST)
        {
            $this->form_validation->set_rules('permalink', 'permalink', 'required|trim');
            $this->form_validation->set_rules('name_mk', 'name mk', 'required|trim');
            $this->form_validation->set_rules('desc_mk', 'desc mk', 'trim');
            $this->form_validation->set_rules('name_sr', 'name sr', 'trim');
            $this->form_validation->set_rules('desc_sr', 'desc sr', 'trim');
            $this->form_validation->set_rules('name_en', 'name en', 'trim');
            $this->form_validation->set_rules('desc_en', 'desc en', 'trim');
                
            if($this->form_validation->run())
            {
                if(!empty($_FILES['userfile']['name']))
                {
                    $image = img::upload();
                
                    $_POST['image']     = $image['image'];
                    $_POST['img_thumb'] = $image['img_thumb'];

                }
                else
                {
                    $_POST['image'] = 'http://placehold.it/300x300';
                    $_POST['img_thumb'] = 'http://placehold.it/150x150';
                }
                
                if($this->category->insert($_POST))
                {
                    $this->session->set_flashdata('message','Category successfuly created!');
                }
                redirect('category');
            }
        }
    }
    
    public function edit($id)
    {
        $this->data['result'] = $this->category->get($id);

        if(!$this->data['result']) show_404();

        if($_POST)
        {
            $this->form_validation->set_rules('permalink', 'permalink', 'required|trim');
            $this->form_validation->set_rules('name_mk', 'name mk', 'required|trim');
            $this->form_validation->set_rules('desc_mk', 'desc mk', 'trim');
            $this->form_validation->set_rules('name_sr', 'name sr', 'trim');
            $this->form_validation->set_rules('desc_sr', 'desc sr', 'trim');
            $this->form_validation->set_rules('name_en', 'name en', 'trim');
            $this->form_validation->set_rules('desc_en', 'desc en', 'trim');

            if($this->form_validation->run())
            {
                //If new image is set, upload and create thumb
                if($_FILES['userfile']['name'])
                {
                    img::deleteImg($this->data['result']);

                    $image = img::upload();
            
                    $_POST['image']     = $image['image'];
                    $_POST['img_thumb'] = $image['img_thumb'];  
                }

                if($this->category->update($_POST['id'],$_POST))
                {
                    $this->session->set_flashdata('message','Category successfuly updated!');
                }
                
                redirect('category');
            }   
        }
    }
    
    public function view($id)
    {
        $this->data['result']     = $this->category->get($id);

        if(!$this->data['result']) show_404();
        
        $this->data['attributes'] = $this->category->get_attributes($id);
        
        $this->data['dd_attr']    = $this->attribute->order_by('name_mk')->dropdown('id','name_mk');
        
        $this->data['products']   = $this->product->order_by('order')->get_many_by('category_id',$id);
        
        $this->data['attr_count'] = count($this->data['attributes']);
    }

    public function delete($id)
    {
        $category = $this->category->get($id);

        if(!$category) show_404();

        //Delete category images
        img::deleteImg($category);

        $this->category->delete($id);

        redirect('category');
    }
    /////////////////////
    // AJAX FUNCTIONS //
    /////////////////////
    public function activate($id)
    {
        $this->category->update($id,array('status'=>'active'));

        $this->session->set_flashdata('message','Category activated!');
    
        redirect('category');
    }
    
    public function deactivate($id)
    {
        $this->category->update($id,array('status'=>'inactive'));
        
        $this->session->set_flashdata('message','Category deactivated!');
        
        redirect('category');
    }
    

    public function post_bind_attribute()
    {
        if($this->category->bind_attr_cat($_POST['attribute_id'],$_POST['category_id']))
        {
            $this->session->set_flashdata('message','Attribute successfuly added!');
        }
        else
        {
            $this->session->set_flashdata('message','Attribute already exists!');
        }
    
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function delete_attribute($id)
    {
        if($this->attrcat->delete($id))
        {
            $this->session->set_flashdata('message','Attribute successfuly deleted!');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function ajx_moveUp()
    {
        /*
         * Moves the attribute up
         * (order = order - 1)
         */
        if($this->category->change_attr_order($_POST['id'],'up'))
        {
            echo 1;
        }

        exit;
    }
    
    public function ajx_moveDown()
    {
        /*
         * Moves the attribute down
         * (order = order + 1)
         */
        if($this->category->change_attr_order($_POST['id'],'down'))
        {
            echo 1;
        }
            
        exit;
    }
}

/* End of file category.php */
/* Location: ./application/controllers/category.php */