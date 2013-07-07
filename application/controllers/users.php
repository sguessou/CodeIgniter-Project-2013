<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{
	var $site_title;
	var $css;
	var $base_url;
	var $data;    
	
	/**
	 *
	 * @param 
	 * @return [type] [description]
	 * 
	 */
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
	/*
	*	This method loads the main view of the login section,
	*	@param none
	*	@return void
	*/
	public function index()
	{
		$data = array();
		
		$this->load->model('products_m');
		$this->load->model('users_m');
		$this->load->model('accesslog_m');
		

		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();
		
	
		if ( $this->auth->is_logged() )
		{
			header('Location:'.$this->base_url.'/users/view_account/');	
		}
		else
		{
			$data['logged'] = FALSE;
			$this->accesslog_m->register( 'CI_BS->users->index', $_SERVER['REMOTE_ADDR'], gethostbyaddr( $_SERVER['REMOTE_ADDR'] ) );
			$this->load->view('/users/users_main_v', $data);
		}
	}
	
	/*
	*
	*
	*/
	public function view_account()
	{
		$data = array();
		
		$this->load->model('users_m');
		$this->load->model('accesslog_m');
		
		
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();
		
		$this->auth->login();
		
		$data['user_data'] = $this->users_m->get_user_record($this->my_session->get('login'));
		$data['logged'] = TRUE; //$this->my_session->get('logged');
		$data['msg'] = 'Welcome back ';

		$this->accesslog_m->register( 'CI_BS->users->account', $_SERVER['REMOTE_ADDR'], gethostbyaddr( $_SERVER['REMOTE_ADDR'] ) );	
		$this->load->view('/users/users_account_v', $data);
			
	}
	
	/*
	*
	*
	*/
	public function view_open_orders()
	{
		$data = array();
		
		$this->load->model('users_m');
		$this->load->model('accesslog_m');
		
		
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();
		
		$this->auth->confirm_auth();
		
		$data['logged'] = TRUE;
		$data['user_data'] = $this->users_m->get_user_record($this->my_session->get('login'));
		
		$this->accesslog_m->register( 'CI_BS->users->view_orders', $_SERVER['REMOTE_ADDR'], gethostbyaddr( $_SERVER['REMOTE_ADDR'] ) );
		$this->load->view('/users/users_open_orders_v', $data);
	}
	
	
	/*
	*
	*
	*/
	public function update_user_data()
	{
		$data = array();
		
		$this->load->model('users_m');
		$this->load->model('accesslog_m');
		$this->load->model('country_m');
		
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;

		$data['countries'] = $this->country_m->get_countries();
		
		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();
		
		$this->auth->confirm_auth();
		
		$data['logged'] = TRUE;
		$data['user_data'] = $this->users_m->get_user_record($this->my_session->get('login'));

        //$action = $this->input->post('PType');


        $data['user_personal'] = TRUE;
        $data['user_password'] = FALSE;
        $data['user_address'] = FALSE;
        $this->accesslog_m->register( 'CI_BS->users->update_user_personal', $_SERVER['REMOTE_ADDR'], gethostbyaddr( $_SERVER['REMOTE_ADDR'] ) );
        $this->load->view('/users/users_update_main_v', $data);	
        
	}

	/*
	*
	*
	*/
	public function update_data($action)
	{
		$data = array();
		
		$this->load->model('users_m');
		
		$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		list($data['cart_content'], $data['cart_total'], $data['cart_total_items']) = $this->my_cart->get_cart();
		
		$this->auth->confirm_auth();
		
		$data['logged'] = TRUE;
		$data['user_data'] = $this->users_m->get_user_record($this->my_session->get('login'));

		$data['action'] = $action;

		if ($action == 'personal')
		{
			$data['flag'] = '';
			$this->load->view('/users/users_update_v', $data);
		}
		elseif ($action == 'passwd')
		{
			$data['flag'] = '';
			$data['passwd_error'] = '';
			$this->load->view('/users/users_update_v', $data);	
		}
		elseif ($action == 'address')
		{
			$this->load->view('/users/users_update_v', $data);	
		}
		else
		{
        	header('Location:'.$this->base_url.'/users/update_user_data/');
        }	

	}


	/*
	*
	*
	*/
	public function logout()
	{
		$this->auth->logout();
	}

}//End class Users

/* End of file users.php */
/* Location: ./application/controllers/users.php */
	
