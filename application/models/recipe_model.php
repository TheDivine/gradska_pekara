<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recipe_model extends MY_Model {
    
    public $_table = 'recipes';
    public $before_create = array('timestamps');

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

    protected function timestamps($recipe)
    {
        $recipe['created_at'] = $recipe['updated_at'] = date('Y-m-d H:i:s');
        return $recipe;
    }

    public function get_recipes_by($criteria,$option,$limit=null, $offset=null)
    {
        $this->db->select("r.name,r.desc,r.permalink,r.type,rc.name AS rcname")
                ->from('recipes AS r');

        if($criteria!='all' AND $option!='all')
        {
            if($criteria == 'category')
                $criteria = 'r_category_id';

            if($criteria == 'vegeterian' OR $criteria == 'fasting' )
                 $option = 1;
             
            $this->db->where('r.'.$criteria, $option);
        }

        $this->db->where('r.published',1);

        $this->db->join('r_categories AS rc','rc.id = r.r_category_id','LEFT');

        $this->db->limit($limit , $offset);

        $this->db->order_by('r.created_at','desc');
                
        $data['results'] = $this->db->get()->result();

        $this->db->select('COUNT(*) AS count',false);

        if($criteria!='all' AND $option!='all')
        {
            if($criteria == 'category')
                $criteria = 'r_category_id';

            if($criteria == 'vegeterian' OR $criteria == 'fasting' )
                 $option = 1;

            $this->db->where($criteria, $option);
        }
        $this->db->where('published',1);
        $temp = $this->db->get($this->_table)->row();
        $data['num_rows'] = $temp->count;

        return $data;
    }   

    public function get_recipe($permalink)
    {
        $this->db->select("r.*,DATE_FORMAT(r.created_at,'%d.%m.%Y') AS created,rc.name AS rcname",false)
                ->from('recipes AS r')
                ->where('r.permalink',$permalink)
                ->where('r.published',1)
                ->join('r_categories AS rc','rc.id = r.r_category_id','LEFT');    
        return $this->db->get()->row();
    }

    public function make_permalink($string)
    {
        return url_title($string,'_',true);
    }

}