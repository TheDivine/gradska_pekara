<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends MY_Model {
	
	public $_table = 'categories';
	
	public $has_many = array( 'products');
	
	public function get_attributes($category_id)
	{
		/*
		 * Get all attributes which describe the products
		 * in this particular category
		 */	
		$this->db->select('a.*, ac.id AS acid, ac.order')
                ->from('attributes_categories AS ac')
                ->where('category_id',$category_id)
                ->join('attributes AS a','a.id = ac.attribute_id','LEFT')
                ->order_by('ac.order','asc');
                
        return $this->db->get()->result();
	}
	
	public function change_attr_order($attr_cat_id, $direction)
	{
		$directions = array('up','down');
		
		if(!in_array($direction,$directions))
			return false;
		
		$order = $this->_current_order($attr_cat_id);
		
		if($direction == 'up')
			$this->db->set('order',$order - 1);
				
		if($direction == 'down')
			$this->db->set('order',$order + 1);
		
		$this->db->where('id',$attr_cat_id);
		
		$this->db->update('attributes_categories');
		
		return $this->db->affected_rows();
	}
	
	public function bind_attr_cat($attr_id,$cat_id)
	{
		if($this->_check_attr_cat($attr_id, $cat_id))
			return false;
		
		$data['attribute_id'] = $attr_id;
		$data['category_id'] = $cat_id;
		
		$this->db->insert('attributes_categories',$data);
		
		return $this->db->insert_id();
	}
	
	private function _check_attr_cat($attr_id,$cat_id)
	{
		return $this->db->where('attribute_id',$attr_id)->where('category_id',$cat_id)
			->get('attributes_categories')->row();
	}
	
	private function _current_order($attr_cat_id)
	{
		$order = $this->db->select('order')->where('id',$attr_cat_id)
			->get('attributes_categories')->row();
		return $order->order;
	}
}