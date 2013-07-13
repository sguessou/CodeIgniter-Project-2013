<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_session
{
	public function __construct()
	{
		$this->_open_session();
	}
	 /*
	 * 
	 * 
	 * 
	*/  	
	protected function _open_session()
	{
	/*	if (session_status() != PHP_SESSION_ACTIVE)
		{
			session_start();
		}
		else
		{
			session_regenerate_id(true);
		}*/
		if( !isset( $_SESSION['active'] ) || !( $_SESSION['active'] == TRUE ) )
			{
				session_start();
				 $_SESSION['active'] = TRUE;
			}
			else
			{
				session_regenerate_id(true);
			}
	}
	
	 /*
	 * 
	 * 
	 * 
	*/
	public function set( $name, $value )
	{
		$_SESSION[$name] = $value;
	}
	
	 /*
	 * 
	 * 
	 * 
	*/
	public function get( $name )
	{
		if( isset( $_SESSION[$name]) )
		{
			return $_SESSION[$name];
		}
		else
		{
			return false;
		} 
	}
	
	 /*
	 * 
	 * 
	 * 
	*/
	public function del( $name )
	{
		unset( $_SESSION[$name] );
	}
	
	 /*
	 * 
	 * 
	 * 
	*/
	public function is_set( $name )
	{
		return 	(isset($_SESSION[$name])) ? TRUE : FALSE;
	}
	
	 /*
	 * 
	 * 
	 * 
	*/
	public function destroy()
	{
		$_SESSION = array();
		session_destroy();
		session_regenerate_id();
	}		
	
	 /*
	 * 
	 * 
	 * 
	*/
	public function get_session_content()
	{
	  $sess = array();
		foreach($_SESSION as $key => $value)
		{
		   array_push($sess, array($key => $value));	
		}	
	  return $sess;		
	}	
}//End class My_Session

/* End of file My_Session.php */
/* Location: ./application/libraries/My_Session.php */
