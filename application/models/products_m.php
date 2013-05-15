<?php

class Products_m extends CI_Model
{
	protected $_data;
	protected $_conn;
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/*
This function returns the products type id (ptype_id), it's used in the next function 
to get a list of products based on their type name.
*/
	public function get_product_type_id($product_name) 
	{
		$sql = "SELECT ptype_id FROM product_types WHERE type_name LIKE :type_name";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(":type_name", $product_name, \PDO::PARAM_STR);
		
		
		if($stmt->execute()) 
		{
			return $row = $stmt->fetch(\PDO::FETCH_ASSOC);		
		} 
		else 
		{
			print_r($stmt->errorInfo());		
		}
	}
	
	function fetch_products($product_name, $limit = NULL)
	{
	
	  $product_type_id = $this->get_product_type_id($product_name);
	  	
	  if($limit)
	  {	
		$sql = "SELECT * FROM products WHERE ptype_id = :ptype_id 
		                                     ORDER BY product_id DESC
		                                     LIMIT :limit";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindparam(":ptype_id", $product_type_id['ptype_id'], \PDO::PARAM_INT);
		$stmt->bindparam(":limit", $limit, \PDO::PARAM_INT);
	  }//End if
	  elseif($limit == NULL)
	  {
	  	$sql = "SELECT * FROM products WHERE ptype_id = :ptype_id 
		                                     ORDER BY product_id DESC";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindparam(":ptype_id", $product_type_id['ptype_id'], \PDO::PARAM_INT);
	  }//End elseif
	  
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
