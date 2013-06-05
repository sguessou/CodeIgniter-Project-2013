<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	//Url to re-direct to in case not authenticated
	protected $_redirect; 

	//String to use when making hash of username and password
	protected $_hash_key;

	//Var to hold username
	protected $_login;
	
	//variable for various purposes
	protected $_data;
	
	
	
	public function __construct()
	{
	  parent::__construct();
	  $this->_redirect = $this->config->item('base_url').'/users/';
	  $this->_hash_key = 'CodeIgniter is awesome! 28 may 2013 zetla is ok 22';
	  //$this->load->library('session');	//Initializing a session	
	  $this->load->library('encrypt');
	  //$this->load->database();
	}
	
	public function index()
	{
		$this->_data = array();
		
		//$this->load->model('products_m');
		
	}//End method index
	
	/*
	*	This method authenticates values submitted by user against credentials in database 
  	*   @param	none
  	* 	@return	void
	*/
	public function login()
	{
		$this->load->model('users_m');
		
		// See if we have values already stored in the session
		if($this->session->userdata('hash'))
		{
		  if($this->confirm_auth())
		  {
		  	return;
		  }
		}

		// If this is a fresh login, check $_POST variables, also check that both variables contains only alphanumerical characters 
		if ( !$this->input->post('login') || !$this->input->post('password') ) //|| !ctype_alnum($_POST['login']) || !ctype_alnum($_POST['password']) )
		{
			$this->redirect();
		}
		
		
		$login = $this->input->post('login');
		
        //Encrypt password
		$password = md5($this->input->post('password'));
		
		//if check_login returns TRUE, set variables into session
		if( $this->users_m->check_login($login, $password) )
		{
			$this->store_auth($login, $password);
			$this->_login = $login;
			return;
		}
		else
		{
			$this->redirect();
		}
		
	  }//End method login
	  
	/*
	*	This method sets the session variables after a successful login
	*	
	*/
	public function store_auth( $login, $password )
  	{
    	$this->_data = array( 'login' => $login,
  							  'password' => $password,
  							  'hash' => md5($this->_hash_key.$login.$password),
  							  'logged' => TRUE
  							 );
  							   		
		$this->session->set_userdata($this->_data);
		return;
		
  	}//End method store_auth  
  	
  	/*
  	*	Confirms that an existing login is still valid
	*	@param none
	*	@return boolean
	*/
	public function confirm_auth()
  	{
		$login = $this->session->userdata('login');
		$password = $this->session->userdata('password');
		$hash_key = $this->session->userdata('hash');
		$logged = $this->session->userdata('logged');
		
		if ( md5($this->_hash_key.$login.$password) != $hash_key)
		{
		  	$this->logout();
		}
		return TRUE;
  	}//End method confirm_auth
  	
  	/*
  	*	Same method as above, except that we don't redirect also the user session values are emptied locally 
	*	@param none
	*	@return boolean
	*/
	public function is_logged()
  	{
		$login = $this->session->userdata('login');
		$password = $this->session->userdata('password');
		$hash_key = $this->session->userdata('hash');
		$logged = $this->session->userdata('logged');
		
		if ( md5($this->_hash_key.$login.$password) != $hash_key)
		{
		  	$this->session->unset_userdata('login');
			$this->session->unset_userdata('password');
			$this->session->unset_userdata('hash');
			$this->session->unset_userdata('logged');
		  	return FALSE;
		}
		return TRUE;
  	}//End method is_logged
  	
  	/*
  	*	Logs the user out
	*	@param none
	*	@return void
	*/
	public function logout()
  	{	  
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('hash');
		$this->session->unset_userdata('logged');
	
		//$this->session->sess_destroy();
		$this->redirect();
		  
  	}//End method logout
  	
  	/*
  	*	Redirects browser and terminates script execution
	*	@param none
	*	@return void
	*/
	private function redirect()
  	{
		header( 'Location:'.$this->_redirect);	
		exit();	
  	}//End method redirect

}//End class Auth

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
	
