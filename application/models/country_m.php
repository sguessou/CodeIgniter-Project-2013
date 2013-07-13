<?php

class Country_m extends CI_Model
{
	/*
	*	protected variable used inside the class methods to send data to calling controller
	*/
	protected $_data;
	
	function __construct()
	{
		parent::__construct();
		//$this->load->database();
	}



	public function get_countries() 
	{ 
		$sql = "SELECT name, printable_name FROM country ORDER BY printable_name ASC";
		$stmt = $this->db->conn_id->query($sql);
		
		if($stmt->execute())
		{
		  return $row = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}
		else
		{
			print_r( $stmt->errorInfo() );
			return;
		} 				
	}

}//End class Country_m

/* End of file country_m.php */
/* Location: ./application/models/country_m.php */
