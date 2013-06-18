<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*
*/
class Cart extends CI_Controller 
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

	public function index()
	{
		$data = array();
		
		//$this->load->model('products_m');
		//$this->load->model('users_m');
		//$this->load->model('accesslog_m');
		
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();
		
		$data['logged'] = FALSE;
		if( $this->auth->is_logged() )
		{
			$data['logged'] = TRUE;
		    $data['user_data'] = $this->users_m->get_user_record($this->my_session->get('login'));
		}

		$this->load->view('/cart/cart_main_v', $data);
	}


	public function empty_cart()
	{
		$this->my_cart->remove();
		header('Location:'.$this->base_url.'/cart/');
	}
	
}//End class Cart

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */