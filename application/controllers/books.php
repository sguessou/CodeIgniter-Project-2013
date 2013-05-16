<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller 
{
	var $site_title;
	var $css;
	var $base_url;
	var $data = array();
	
	public function __construct()
	{
	  parent::__construct();
	  $this->site_title = $this->config->item('site_title');
	  $this->css = $this->config->item('css');
	  $this->base_url = $this->config->item('base_url');  		
	}
	
	public function index($action, $start = NULL, $first = NULL)
	{
		$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		$this->load->model('products_m');
		
		if($action == 'begin')
		{
			$data['first'] = 1;
		   	$data['start'] = 0;
		   	$data['page_size'] = 10;		
			list($data['products'], $data['total_rows']) = $this->products_m->fetch_products_ps(1, 'product_id', $data['start'], 10);	
		}	
		
		if($action == 'next' && $start && $first)
		{
			$data['page_size'] = 10;
		    $data['start']  = (int)$start;
			$data['first'] = (int)$first;
			list($data['products'], $data['total_rows']) = $this->products_m->fetch_products_ps(1, 'product_id', $data['start'], 10);
		} 
		
		$this->load->view('/books/books_main_v', $data);
	}
	
	



}

/* End of file books.php */
/* Location: ./application/controllers/books.php */
