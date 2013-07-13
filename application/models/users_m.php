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
	* Updates table user, set the personal data and it's related columns
	* @param array $data 
	* @return none
	*/
	public function update_personal_info( $data )
	{
		$sql = "UPDATE user SET firstname = :firstname,
								 lastname = :lastname,
								    email = :email,
							   updated_at = :updated
								    WHERE login = :login 
									  AND user_id = :user_id";
														
	  $stmt = $this->db->conn_id->prepare($sql);

	  $stmt->bindParam(':firstname', $data['firstname'], \PDO::PARAM_STR );
	  $stmt->bindParam(':lastname', $data['lastname'], \PDO::PARAM_STR );
	  $stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR );
	  $date = date("Y-m-d H:i:s");
	  $stmt->bindParam(':updated', $date, \PDO::PARAM_STR );  
	  $stmt->bindParam(':login', $data['username'], \PDO::PARAM_STR );
	  $stmt->bindParam(':user_id', $data['user_id'], \PDO::PARAM_INT );
		
		if( $stmt->execute() )
		{
			return;
		}
		else
		{
			exit(print_r($stmt->errorInfo()));
		}
	}//End method update_personal_info

	/**
	* Updates table user, set the personal data and it's related columns
	* @param array $_POST 
	* @return none
	*/
	public function update_address( $data )
	{
		$sql = "UPDATE user SET address_line_1 = :address_line_1,
								address_line_2 = :address_line_2,
								     town_city = :city,
								        county = :county,
									   country = :country,
								    updated_at = :updated
								   WHERE login = :login 
								   AND user_id = :user_id";
														
	  $stmt = $this->db->conn_id->prepare($sql);

	  $stmt->bindParam(':address_line_1', $data['address_line_1'], \PDO::PARAM_STR );
	  $stmt->bindParam(':address_line_2', $data['address_line_2'], \PDO::PARAM_STR );
	  $stmt->bindParam(':city', $data['city'], \PDO::PARAM_STR );
	  $stmt->bindParam(':county', $data['county'], \PDO::PARAM_STR );
	  $stmt->bindParam(':country', $data['country'], \PDO::PARAM_STR );
	  $date = date("Y-m-d H:i:s");
	  $stmt->bindParam(':updated', $date, \PDO::PARAM_STR );  
	  $stmt->bindParam(':login', $data['username'], \PDO::PARAM_STR );
	  $stmt->bindParam(':user_id', $data['user_id'], \PDO::PARAM_INT );
		
		if( $stmt->execute() )
		{
			return;
		}
		else
		{
			exit(print_r($stmt->errorInfo()));
		}
	}//End method update_address

	/**
	* Updates table user, set the password column
	* @param array $_POST 
	* @return none
	*/
	public function update_password( $data )
	{
		$sql = "UPDATE user SET password = MD5(:password),
								updated_at = :updated
								WHERE login = :login 
									  AND user_id = :user_id";
														
	  $stmt = $this->db->conn_id->prepare($sql);

	  $stmt->bindParam(':password', $data['new_passwd_1'], \PDO::PARAM_STR );
	  $date = date("Y-m-d H:i:s");
	  $stmt->bindParam(':updated', $date, \PDO::PARAM_STR );  
	  $stmt->bindParam(':login', $data['username'], \PDO::PARAM_STR );
	  $stmt->bindParam(':user_id', $data['user_id'], \PDO::PARAM_INT );
		
		if( $stmt->execute() )
		{
			return;
		}
		else
		{
			exit(print_r($stmt->errorInfo()));
		}
	}//End method update_password

	
}//End class Users_m

/* End of file users_m.php */
/* Location: ./application/models/users_m.php */
