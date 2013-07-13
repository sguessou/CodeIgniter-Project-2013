<?php

class Accesslog_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function register( $pageUrl, $ip, $host )
	{
		$sql = "INSERT INTO accessLog( pageUrl, ip, host ) VALUES( :pageUrl, :ip, :host )";
		$stmt = $this->db->conn_id->prepare( $sql );
		$stmt->bindParam( ':pageUrl', $pageUrl );
		$stmt->bindParam( ':ip', $ip );
		$stmt->bindParam( ':host', $host );

		if($stmt->execute()) 
		{
			return; 
		} 
		else 
		{
			print_r($stmt->errorInfo());		
		}
	}

}//End class Accesslog_m

/* End of file accesslog_m.php */
/* Location: ./application/models/accesslog_m.php */