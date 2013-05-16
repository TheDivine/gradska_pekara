<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "home";
$route['404_override'] = '';

/*
 * ===========================
 * Custom Routes
 */

/*
 * Static pages routes
 */
$route['about_us']          = 'home/index';
$route['categories']        = 'home/categories';
$route['categories/(:any)'] = 'home/categories/$1';
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