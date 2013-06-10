<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recipe_model extends MY_Model {
    
    public $_table = 'recipes';

    public $before_create = array('timestamps','make_permalink');

    public $before_update = array('make_permalink');

    public $belongs_to = array('r_category','r_category');

    public $validate = array(
        array( 'field' => 'permalink', 
               'label' => 'permalink',
               'rules' => 'required|callback_make_permalink' ),
        array( 'field' => 'name',
               'label' => 'name',
               'rules' => 'required|trim' ),
        array( 'field' => 'type',
               'label' => 'type',
               'rules' => 'required|trim' ),
        array( 'field' => 'r_category_id',
               'label' => 'category',
               'rules' => 'required|trim' ),
        array( 'field' => 'desc',
               'label' => 'description',
               'rules' => 'required|trim' ),
        array( 'field' => 'ingredients',
               'label' => 'ingredients',
               'rules' => 'required|trim' ),
        array( 'field' => 'instructions',
               'label' => 'instructions',
               'rules' => 'required|trim' ),
        array( 'field' => 'time_to_prepare',
               'label' => 'time to prepare',
               'rules' => 'required|trim' ),
        array( 'field' => 'num_servings',
               'label' => '# of servings',
               'rules' => 'required|trim' ),
    );


    public function getAllRecipes($filter = '', $limit = 25, $offset = 0)
    {
        $this->db->select("r.name,r.desc,r.permalink,r.type,rc.name AS rcname")->from('recipes AS r');

        if('' !== $filter)
        {
            if(uif::_isAssoc($filter))
            {
                foreach($filter as $key => $value) 
                {
                    $this->_set_where(array($key,$value));
                }
            }
            else
            {
                $this->_set_where($filter);
            }
        }

        $this->db->where('r.published',1);

        $this->db->join('r_categories AS rc','rc.id = r.r_category_id','LEFT');

        $this->db->limit($limit , $offset);

        $this->db->order_by('r.created_at','desc');
                
        $data['results'] = $this->db->get()->result();

        $this->db->select('COUNT(*) AS count',false);

        if('' !== $filter)
        {
            if(uif::_isAssoc($filter))
            {
                foreach($filter as $key => $value) 
                {
                    $this->_set_where(array($key,$value));
                }
            }
            else
            {
                $this->_set_where($filter);
            }
        }
        
        $this->db->where('published',1);

        $temp = $this->db->get($this->_table)->row();
        
        $data['num_rows'] = $temp->count;

        return $data;
    }

    ///////////////
    // OBSERVERS //
    ///////////////
    protected function make_permalink($recipe)
    {
        $recipe['permalink'] =  url_title($recipe['permalink'],'_',true);

        return $recipe;
    }

    protected function timestamps($recipe)
    {
        $recipe['created_at'] = $recipe['updated_at'] = date('Y-m-d H:i:s');
        return $recipe;
    }
}