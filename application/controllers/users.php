<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
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
	  //$this->load->library('session');	//Initializing a session
	  //$this->load->database();	
	}
	/*
	*	This method loads the main view of section: login, with the login form
	*	@param none
	*	@return void
	*/
	public function index()
	{
		$data = array();
		$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		//$this->load->model('products_m');
		
		$data['cart_content'] = $this->cart->contents();
		$data['cart_total'] = $this->cart->total();
		$data['cart_total_items'] = $this->cart->total_items();
		
		//$data['session'] = $this->session->all_userdata();
		
		$this->load->view('/users/users_main_v', $data);
	}
	
	/*
	*
	*
	*/
	public function login()
	{
		$data = array();
		$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		$this->load->model('users_m');
		
		$data['cart_content'] = $this->cart->contents();
		$data['cart_total'] = $this->cart->total();
		$data['cart_total_items'] = $this->cart->total_items();
		
		$this->load->library('../controllers/auth');
		$this->auth->login();
		$data['session'] = $this->session->userdata;
		
		
		if($this->session->userdata('logged') === TRUE)
		{
			$data['user_data'] = $this->users_m->get_user_record($this->session->userdata('login'));
			$data['msg'] = 'Welcome back ';
			$this->load->view('/users/users_account_v', $data);
		}
		else
		{
			header('Location:'.$this->base_url.'/users/login/');
		}	
	}
	
	/*
	*
	*
	*/
	public function view_open_orders()
	{
		$data = array();
		$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		$this->load->model('users_m');
		
		$data['cart_content'] = $this->cart->contents();
		$data['cart_total'] = $this->cart->total();
		$data['cart_total_items'] = $this->cart->total_items();
		
		$this->load->library('../controllers/auth');
		$this->auth->confirm_auth();
		
		$data['session'] = $this->session->userdata;
		$data['user_data'] = $this->users_m->get_user_record($this->session->userdata('login'));
		
		$this->load->view('/users/users_open_orders_v', $data);
	}
	
	/*
	*
	*
	*/
	public function logout()
	{
		$this->load->library('../controllers/auth');
		
		$this->auth->logout();
	}

}//End class Users

/* End of file users.php */
/* Location: ./application/controllers/users.php */
	
