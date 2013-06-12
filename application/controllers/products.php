<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*
*/
class Products extends CI_Controller 
{
	var $site_title;
	var $css;
	var $base_url;
	var $data;
	
	public function __construct()
	{
		parent::__construct();
	  
		$this->site_title = $this->config->item('site_title');
		$this->css = $this->config->item('css');
		$this->base_url = $this->config->item('base_url');  
	  
		$this->load->library('my_session');
	    $this->load->library('my_cart');
	    $this->load->library('auth');		
	}
	
	public function index($action, $product_name, $start = NULL, $first = NULL)
	{
		$data = array();
		
		$this->load->model('products_m');
		$this->load->model('users_m');
		
		$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();
		
		$data['logged'] = FALSE;
		if( $this->auth->is_logged() )
		{
			$data['logged'] = TRUE;
		    $data['user_data'] = $this->users_m->get_user_record($this->my_session->get('login'));
		}
		
		if($action == 'begin')
		{
			$data['first'] = 1;
		   	$data['start'] = 0;
		   	$data['page_size'] = 10;		
			list($data['products'], $data['total_rows']) = $this->products_m->fetch_products_ps($product_name, 'product_id', $data['start'], 10);	
		}	
		
		if($action == 'next')
		{
			$data['page_size'] = 10;
		    $data['start']  = (int)$start;
			$data['first'] = (int)$first;
			list($data['products'], $data['total_rows']) = $this->products_m->fetch_products_ps($product_name, 'product_id', $data['start'], 10);
		} 
		
		if(strtolower($product_name) == 'book')
		{
			$this->load->view('/books/books_main_v', $data);
		}
		elseif(strtolower($product_name) == 'dvd')
		{
			$this->load->view('/movies/movies_main_v', $data);
		}
	}//End method index
	
	/*
	*	when called the method loads $data['product_data'] with data associated with product
	*	@param int $product_id
	*/
	public function describe_product($product_type, $product_id)
	{
		$data = array();
		
		$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		$this->load->model('products_m');
		$this->load->model('users_m');
		
		$data['product_data'] = $this->products_m->get_row($product_id);
		
		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();
		
		$data['logged'] = FALSE;
		if( $this->auth->is_logged() )
		{
			$data['logged'] = TRUE;
		    $data['user_data'] = $this->users_m->get_user_record($this->my_session->get('login'));
		}
		
		if($product_type == 'Book')
		{
			$this->load->view('/books/books_display_v', $data);
		}
		elseif($product_type == 'Dvd')
		{
			$this->load->view('/movies/movies_display_v', $data);
		}
	}//End method describe_product
	
	



}//End class Products

/* End of file products.php */
/* Location: ./application/controllers/products.php */
