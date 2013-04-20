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
$route['about_us'] = 'home/index';
$route['categories'] = 'home/categories';
//$route['partners'] = 'home/partners';
$route['catering'] = 'home/catering';
$route['caffe'] = 'home/caffe';
$route['contact'] = 'home/contact';

$route['kategorija/(:any)'] = 'home/category/$1';


/*
 * Administration Routes
 */
$route['login'] = 'admin/login';
$route['logout'] = 'admin/logout';
$route['dashboard'] = 'admin/index';

/* End of file routes.php */
/* Location: ./application/config/routes.php */