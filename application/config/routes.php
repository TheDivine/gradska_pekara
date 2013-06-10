<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "home";
$route['404_override'] = '';

/*
 * ===========================
 * Custom Routes
 */

/*
 * Front Routes
 */
$route['categories/(:any)'] = 'home/categories/$1';
$route['recipes/(:any)']    = 'home/recipes/$1';
$route['categories']        = 'home/categories';
$route['recipes']           = 'home/recipes';
$route['about_us']          = 'home/index';
$route['quality']           = 'home/quality';
$route['catering']          = 'home/catering';
$route['caffe']             = 'home/caffe';
$route['contact']           = 'home/contact';


/*
 * Administration Routes
 */
$route['login']     = 'admin/login';
$route['logout']    = 'admin/logout';

/* End of file routes.php */
/* Location: ./application/config/routes.php */