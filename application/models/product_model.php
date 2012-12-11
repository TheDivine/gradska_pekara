<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends MY_Model {
	
	public $_table = 'products';
	public $belongs_to = array('category');
	
}