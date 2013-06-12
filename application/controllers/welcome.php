<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		
		$this->load->library('my_session');
	   	$this->load->library('my_cart');
	    	$this->load->library('auth');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{		
		$this->load->model('products_m');
		$this->load->model('users_m');
		$this->load->library('my_session');
		$this->load->library('my_cart');


		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();

		$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		$data['dummy'] = $this->cart_m->content_dum();	
		$data['books'] = $this->products_m->fetch_products('Book', 4);
		$data['dvds'] = $this->products_m->fetch_products('Dvd', 4);
		$data['cart_id_dum'] = $this->my_cart->get_cart_id();	
		//$this->my_cart->set_cart_id();

            
	        //if(!$data['cart_content']) die(print_r('nothing returned from db!'));

		$data['sess_data'] = $this->my_session->get_session_content(); 
		
		$data['logged'] = FALSE;
		if( $this->auth->is_logged() )
		{
		    $data['logged'] = TRUE;
		    $data['user_data'] = $this->users_m->get_user_record($this->my_session->get('login'));
		}
		
		//header("Location:$this->base_url/welcome/");

		$this->load->view('./index/welcome_main_v', $data);
		//$this->load->view('./index/welcome_bootstrap_v', $data);
	}
	/*
	*
	*
	*	@param int, int, string, string, string 
	* 	@return void
   */
	public function add_to_cart($id, $price, $name, $product_type, $location = NULL)
	{
		$this->my_cart->add_item($id, $price, $name, $product_type);
			
		if(strtolower($location) == 'book')
		{
			header("Location:$this->base_url/products/index/begin/Book/");
		}
		elseif(strtolower($location) == 'dvd')
		{
			header("Location:$this->base_url/products/index/begin/Dvd/");
		}
		elseif(strtolower($location) == 'users')
		{
			header("Location:$this->base_url/users/");
		}
		else
		{
			header("Location:$this->base_url");
		}
	}//End method add_to_cart
	
	/*
	*
	*
	*	@param int, string 
	* 	@return void
   */
	public function empty_cart($id = NULL, $location = NULL)
	{
		$this->my_cart->remove($id);
		
		if(strtolower($location) == 'book')
		{
			header("Location:$this->base_url/products/index/begin/Book/");
		}
		elseif(strtolower($location) == 'dvd')
		{
			header("Location:$this->base_url/products/index/begin/Dvd/");
		}
		elseif(strtolower($location) == 'users')
		{
			header("Location:$this->base_url/users/");
		}
		else
		{
			header("Location:$this->base_url");
		}
	}//End method empty_cart
	
	/*
	*
	*
	*	@param int, string 
	* 	@return void
   */
	public function update_cart($id, $qty, $location = NULL)
	{
		$this->my_cart->update($id, $qty);
		
		if(strtolower($location) == 'book')
		{
			header("Location:$this->base_url/products/index/begin/Book/");
		}
		elseif(strtolower($location) == 'dvd')
		{
			header("Location:$this->base_url/products/index/begin/Dvd/");
		}
		elseif(strtolower($location) == 'users')
		{
			header("Location:$this->base_url/users/");
		}
		else
		{
			header("Location:$this->base_url");
		}
	}//End method update_cart
	
}//End class Welcome

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
