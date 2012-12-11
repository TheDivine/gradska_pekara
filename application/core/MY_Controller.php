<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	//Layout /autoview functionality
	protected $layout_view = 'web';
	protected $content_view = '';
	protected $view_data = array();
	
	function __construct()
	{
		parent::__construct();
	}

	public function _output($output)
	{
		//set default content view
		if($this->content_view !== FALSE && empty($this->content_view))
			$this->content_view = $this->router->class . '/' . $this->router->method;
		
		//render content view
		$content = file_exists(APPPATH . 'views/'. $this->content_view . EXT) ?
			$this->load->view($this->content_view,$this->view_data,TRUE) : FALSE;
			
		//render the layout
		if($this->layout_view)
			echo $this->load->view('layouts/'. $this->layout_view, array('content'=>$content), TRUE);
		else
			echo $content;			
	}	
}
