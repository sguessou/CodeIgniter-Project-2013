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
	
	public function index($action = NULL, $product_name = NULL, $ebook_page = NULL, $dvd_page = NULL)
	{
		$data = array();
		
		$this->load->model('products_m');
		$this->load->model('users_m');
		$this->load->model('accesslog_m');
		
		//$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();
		
		$data['logged'] = FALSE;
		if( $this->auth->is_logged() )
		{
			$data['logged'] = TRUE;
		    $data['user_data'] = $this->users_m->get_user_record($this->my_session->get('login'));
		}
		
		if($action == 'begin' || $action == 'item_added')
		{
			$this->accesslog_m->register( 'CI_BS->products->begin', $_SERVER['REMOTE_ADDR'], gethostbyaddr( $_SERVER['REMOTE_ADDR'] ) );

			$data['ebook_page'] = 1;
			$data['dvd_page'] = 1;

		   	$data['ebook_start'] = 0;
		   	$data['dvd_start'] = 0;

		   	$data['page_size'] = 6;	

		   	$data['ebook_set'] = TRUE;
			$data['dvd_set'] = NULL;

			if ($action == 'item_added')
			{
				$data['item_added'] = TRUE;
			}
			else
			{
				$data['item_added'] = FALSE;	
			}

			list($data['ebooks'], $data['total_rows_ebooks']) = $this->products_m->fetch_products_ps('Book', 'product_id', $data['ebook_start'], $data['page_size']);
			list($data['dvds'], $data['total_rows_dvds']) = $this->products_m->fetch_products_ps('Dvd', 'product_id', $data['dvd_start'], $data['page_size']);
			
			$data['ebooks_num_pages'] = (int) ( $data['total_rows_ebooks'] / $data['page_size'] );
			if ( $data['total_rows_ebooks'] % $data['page_size'] ) $data['ebooks_num_pages'] += 1;

			$data['dvds_num_pages'] = (int) ( $data['total_rows_dvds'] / $data['page_size'] );
			if ( $data['total_rows_dvds'] % $data['page_size'] ) $data['dvds_num_pages'] += 1;

			$this->load->view('/products/products_main_v', $data);	
		}	
		
		if ( $action == 'next' && $product_name == 'ebook' )
		{
			$this->accesslog_m->register( 'CI_BS->products->ebook', $_SERVER['REMOTE_ADDR'], gethostbyaddr( $_SERVER['REMOTE_ADDR'] ) );

			$data['page_size'] = 6;
			
			$data['ebook_page'] = (int)$ebook_page;
			$data['dvd_page'] = (int)$dvd_page;;	
			

			$data['ebook_start'] = ($data['ebook_page'] - 1) * 6;
		   	$data['dvd_start'] = ($data['dvd_page'] - 1) * 6;

			$data['ebook_set'] = TRUE;
			$data['dvd_set'] = NULL;

			list($data['ebooks'], $data['total_rows_ebooks']) = $this->products_m->fetch_products_ps('Book', 'product_id', $data['ebook_start'], $data['page_size']);
			list($data['dvds'], $data['total_rows_dvds']) = $this->products_m->fetch_products_ps('Dvd', 'product_id', $data['dvd_start'], $data['page_size']);
			
			$data['ebooks_num_pages'] = (int) ( $data['total_rows_ebooks'] / $data['page_size'] );
			if ( $data['total_rows_ebooks'] % $data['page_size'] ) $data['ebooks_num_pages'] += 1;

			$data['dvds_num_pages'] = (int) ( $data['total_rows_dvds'] / $data['page_size'] );
			if ( $data['total_rows_dvds'] % $data['page_size'] ) $data['dvds_num_pages'] += 1;

			$this->load->view('/products/products_main_v', $data);
		}
		elseif ( $action == 'next' && $product_name == 'dvd' )
		{
			$this->accesslog_m->register( 'CI_BS->products->dvd', $_SERVER['REMOTE_ADDR'], gethostbyaddr( $_SERVER['REMOTE_ADDR'] ) );

			$data['page_size'] = 6;

			$data['ebook_page'] = (int)$ebook_page;
			$data['dvd_page'] = (int)$dvd_page;;	
			

			$data['ebook_start'] = ($data['ebook_page'] - 1) * 6;
		   	$data['dvd_start'] = ($data['dvd_page'] - 1) * 6;

			$data['ebook_set'] = NULL;
			$data['dvd_set'] = TRUE;

			list($data['ebooks'], $data['total_rows_ebooks']) = $this->products_m->fetch_products_ps('Book', 'product_id', $data['ebook_start'], $data['page_size']);
			list($data['dvds'], $data['total_rows_dvds']) = $this->products_m->fetch_products_ps('Dvd', 'product_id', $data['dvd_start'], $data['page_size']);
			
			$data['ebooks_num_pages'] = (int) ( $data['total_rows_ebooks'] / $data['page_size'] );
			if ( $data['total_rows_ebooks'] % $data['page_size'] ) $data['ebooks_num_pages'] += 1;

			$data['dvds_num_pages'] = (int) ( $data['total_rows_dvds'] / $data['page_size'] );
			if ( $data['total_rows_dvds'] % $data['page_size'] ) $data['dvds_num_pages'] += 1;

			$this->load->view('/products/products_main_v', $data);
		}  
		
		/*if(strtolower($product_name) == 'book')
		{
			$this->load->view('/books/books_main_v', $data);
		}
		elseif(strtolower($product_name) == 'dvd')
		{
			$this->load->view('/movies/movies_main_v', $data);
		}*/

		
 		

	}//End method index
	
	/*
	*	when called the method loads $data['product_data'] with data associated with product
	*	@param int $product_id
	*/
	/*
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
	*/
	public function add_to_cart($id, $price, $name, $product_type)
	{
		$this->load->model('accesslog_m');

		$this->load->library('my_session');
		$this->load->library('my_cart');

		$this->my_cart->add_item($id, $price, $name, $product_type);

		header('Location:'.$this->base_url.'/products/index/item_added/');

	}



}//End class Products

/* End of file products.php */
/* Location: ./application/controllers/products.php */
