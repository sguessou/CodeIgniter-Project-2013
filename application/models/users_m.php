<?php

class Users_m extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		//$this->load->database();
	}
	
	/*
	*	This function is called when validating login and password against similar values in database.
	*	@param string $login, string $password	
	*	@return on success return boolean TRUE, on failure return FALSE or exit with error message.
	*/
	public function check_login($login, $password)
	{
		// Query to count number of users with this combination
		$sql = "SELECT COUNT(*) AS num_users FROM user WHERE login =:login AND password = :pass";
			      
		$stmt = $this->db->conn_id->prepare($sql);
		// bind the user input
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':pass', $password);
		
		if($stmt->execute())
		{
			$row = $stmt->fetch( \PDO::FETCH_ASSOC );
		}
		else
		{
			exit(print_r($stmt->errorInfo()));
		}
		
		// If there isn't exactly one entry, return FALSE
		if ( $row['num_users'] != 1 )
		{    
			return FALSE;
		}
		// Else is a valid user, return TRUE
		else
		{
			return TRUE;
		}
		
	}//End method check_login
	
	/**
	* 	This method fetches the user record from the user table 
	*	@param string  
	* 	@return array
	*/	
	public function get_user_record($login)
	{
		$sql = "SELECT * FROM user WHERE login = :login";
	  	$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':login', $login);
		
		if( $stmt->execute() )
		{
			return $row = $stmt->fetch(\PDO::FETCH_ASSOC);
		}
		else
		{
			exit(print_r($stmt->errorInfo()));
		}
	}//End method get_user_record
	
	/**
	* 	This method returns TRUE if admin column is set to 1 in user record
	*	@param string  
	* 	@return boolean
	*/	
	public function is_admin($login)
	{
		$sql = "SELECT admin FROM user WHERE login = :login";
	  	$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(':login', $login);
		
		if( $stmt->execute() )
		{
			$row = $stmt->fetch(\PDO::FETCH_ASSOC);
			return ($row['admin']) ? TRUE : FALSE;
		}
		else
		{
			exit(print_r($stmt->errorInfo()));
		}
	}//End method is_admin
	
	
}//End class Users_m

/* End of file users_m.php */
/* Location: ./application/models/users_m.php */
