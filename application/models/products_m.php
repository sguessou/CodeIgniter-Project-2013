<?php

class Products_m extends CI_Model
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
	
	
	
	/*
	*	This function returns the products type id ($ptype_id), it's used in the next function 
	*	to get a list of products based on their type name.
	*	@param	string $product_name
	*	@return	associative array $row	
	*/
	public function get_product_type_id($product_name) 
	{
		
		$sql = "SELECT ptype_id FROM product_types WHERE type_name LIKE :type_name";
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(":type_name", $product_name, \PDO::PARAM_STR);
		
		$this->_data = array();
		
		if($stmt->execute()) 
		{
			return $this->_data = $stmt->fetch(\PDO::FETCH_ASSOC);		
		} 
		else 
		{
			print_r($stmt->errorInfo());		
		}
	}
	
	/*
	*	This function fetches data rows from the table products, if parameter $limit is not
	* 	indicated all rows are sent back to calling controller.
	* 	@param string $product_name, int $limit
	* 	@return associative array $this->_data 
	*/
	function fetch_products($product_name, $limit = NULL)
	{	
	  $product_type_id = $this->get_product_type_id($product_name);
	  	
	  if($limit)
	  {	
		$sql = "SELECT products.*, product_types.type_name 
	  			FROM products INNER JOIN product_types
	  				 ON products.ptype_id = product_types.ptype_id 
	  				 WHERE products.ptype_id = :ptype_id ORDER BY products.product_id DESC LIMIT :limit";
	  				 
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(":ptype_id", $product_type_id['ptype_id'], \PDO::PARAM_INT);
		$stmt->bindParam(":limit", $limit, \PDO::PARAM_INT);
	  }//End if
	  elseif($limit == NULL)
	  {
	  	$sql = "SELECT products.*, product_types.type_name 
	  			FROM products INNER JOIN product_types
	  				 ON products.ptype_id = product_types.ptype_id 
	  				 WHERE products.ptype_id = :ptype_id ORDER BY products.product_id DESC";
	  				 
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(":ptype_id", $product_type_id['ptype_id'], \PDO::PARAM_INT);
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
	}//End method fetch_products
	
	/*
	*	This function fetches data rows from the table products same as above.
	*	The variable $num_rows indicates the amount of rows to be fetched, $start_row indicates 
	*	the starting position when fetching. 
	* 	@param int $product_type_id, int $order, int $start_row, int $num_rows
	* 	@return associative array made of arrays: $this->_data and $row 
	*/
	public function fetch_products_ps($product_name, $order, $start_row, $num_rows)
    {
 		$product_type_id = $this->get_product_type_id($product_name); 
 		  
  		$stmt = $this->db->conn_id->prepare( "SELECT SQL_CALC_FOUND_ROWS products.*, product_types.type_name 
	  					                        FROM products INNER JOIN product_types
	  				 							  ON products.ptype_id = product_types.ptype_id 
	  				 							     WHERE products.ptype_id = :product_type_id 
	  				 							     ORDER BY $order DESC LIMIT :start_row, :num_rows" );
	  				 							     
  		$stmt->bindParam( ":product_type_id", $product_type_id['ptype_id'], \PDO::PARAM_INT );
  		$stmt->bindParam( ":start_row", $start_row, \PDO::PARAM_INT );
    	$stmt->bindParam( ":num_rows", $num_rows, \PDO::PARAM_INT );
    
    	$this->_data = array();
    
    	if($stmt->execute())
		{
			$this->_data = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
		}
		else
		{
			print_r($stmt->errorInfo());
			return;
		}
    
    	$stmt = $this->db->conn_id->query("SELECT found_rows() AS total_rows");
		$row = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    	return array($this->_data, $row['total_rows']);
  }
  	/*
  	*	This method fetches a single row from database based on parameter $product_id
  	*	@param int $product_id
  	*	@return associative array @this->_data 
  	*/
	public function get_row($product_id)
	{
		$stmt = $this->db->conn_id->prepare( "SELECT products.*, product_types.type_name 
												FROM products INNER JOIN product_types
													 ON products.ptype_id = product_types.ptype_id	 
													 WHERE product_id = :product_id" );
		$stmt->bindParam(':product_id', $product_id, \PDO::PARAM_INT);
		
		$this->_data = array();
    
    	if($stmt->execute())
		{
			return $this->_data = $stmt->fetch(\PDO::FETCH_ASSOC); 
		}
		else
		{
			print_r($stmt->errorInfo());
			return;
		}
		

	}//End method get_row
	
}//End class Products_m

/* End of file products_m.php */
/* Location: ./application/models/products_m.php */
