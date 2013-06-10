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
        if(!$this->data['result'] = $this->recipe->get($id)) show_404();

        if($_POST)
        {
            if(!isset($_POST['vegeterian'])) $_POST['vegeterian'] = 0;
            if(!isset($_POST['fasting'])) $_POST['fasting'] = 0;
            if(!isset($_POST['published'])) $_POST['published'] = 0;

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

            if($this->recipe->update($_POST['id'],$_POST))
            {
                $this->session->set_flashdata('message','Recipe successfuly updated!');
                redirect('recipe');
            }
        }

        $this->data['r_categories'] = $this->rc->order_by('name')->dropdown('id','name');
    }

    public function view($permalink)
    {
        $this->layout_view = 'web';

        $this->data['recipe'] = $this->recipe->get_recipe($permalink);

        if(!$this->data['recipe']) show_404();

        $this->data['rcname'] = $this->rc->get_by('id',$this->data['recipe']->r_category_id);
        $this->data['subt'] = $this->data['recipe']->name;
    }
    
    public function delete($id)
    {
        /**
         * Only administrators can delete recipes
         */
        if($this->session->userdata('is_admin') == 1)
        {
            $this->recipe->delete($id);
        }
        else
        {
            $this->session->set_flashdata('message','Only admins can delete recipes!');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}

/* End of file recipe.php */
/* Location: ./application/controllers/recipe.php */