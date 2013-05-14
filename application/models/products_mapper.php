<?php

class Products_mapper extends CI_Model
{
	protected $_data;
	protected $_conn;
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function fetch_products($ptype_id = 1, $limit)
	{
		$sql = "SELECT * FROM products WHERE ptype_id = :ptype_id 
		                                     ORDER BY product_id DESC
		                                     LIMIT :limit";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindparam(":ptype_id", $ptype_id, \PDO::PARAM_INT);
		$stmt->bindparam(":limit", $limit, \PDO::PARAM_INT);
		
		$this->_data = array();
		
		if($stmt->execute())
		{
			return $this->_data = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
		}
		else
		{
			print_r($stmt->errorInfo());
		}
		
		
	}
	
}

?>
