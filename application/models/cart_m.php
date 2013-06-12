<?php

class Cart_m extends CI_Model
{
	/*
	*	protected variable used inside the class methods to send data to calling controller
	*/
	protected $_data;
	protected $_result;
	
	function __construct()
	{
		parent::__construct();
	}
	
	
	 /*
	 * 
	 * 
	 * 
	*/
	public function insert_item($cart_id, $product_id, $attributes)
	{	
		$sql = 'SELECT COUNT(*) as cnt FROM cart WHERE cart_id = :cart_id AND product_id = :product_id';
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(":cart_id", $cart_id, \PDO::PARAM_STR);
		$stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
		
		if($stmt->execute()) 
		{
			$this->_result = $stmt->fetch(\PDO::FETCH_ASSOC);		
		} 
		else 
		{
			exit( print_r($stmt->errorInfo()) );		
		}
		
		if ($this->_result['cnt'] > 0)
		{
			$sql = 'UPDATE cart SET quantity = quantity + 1 WHERE cart_id = :cart_id AND product_id = :product_id';
			$stmt = $this->db->conn_id->prepare($sql);
			$stmt->bindParam(":cart_id", $cart_id, \PDO::PARAM_STR);
			$stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
			
			if($stmt->execute()) 
			{
				return;		
			} 
			else 
			{
				exit( print_r($stmt->errorInfo()) );		
			}
		}
		else
		{
			$sql = 'INSERT INTO cart(cart_id, product_id, attributes) 
						   VALUES(:cart_id, :product_id, :attributes)';
			$stmt = $this->db->conn_id->prepare($sql);
			$stmt->bindParam(":cart_id", $cart_id, \PDO::PARAM_STR);
			$stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
			$stmt->bindParam(":attributes", $attributes, \PDO::PARAM_STR);
			
			if($stmt->execute()) 
			{
				return;		
			} 
			else 
			{
				exit( print_r($stmt->errorInfo()) );		
			}
		}
	}//End method insert_item    
	
	 /*
	 * 
	 * @param: int, int, string  
	 * @return: void
	*/
	public function update_item($cart_id, $product_id, $qty)
	{
		if ((int)$qty == 0)
		{
			$sql = 'DELETE FROM cart WHERE cart_id = :cart_id AND product_id = :product_id';
			$stmt = $this->db->conn_id->prepare($sql);
			$stmt->bindParam(":cart_id", $cart_id, \PDO::PARAM_STR);
			$stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
			
			if($stmt->execute()) 
			{
				return;		
			} 
			else 
			{
				exit( print_r($stmt->errorInfo()) );		
			}
					
		}
		else
		{
			$sql = 'UPDATE cart SET quantity = :quantity WHERE cart_id = :cart_id AND product_id = :product_id';
			$stmt = $this->db->conn_id->prepare($sql);
			$stmt->bindParam(":cart_id", $cart_id, \PDO::PARAM_STR);
			$stmt->bindParam(":product_id", $product_id, \PDO::PARAM_INT);
			$stmt->bindParam(":quantity", $qty, \PDO::PARAM_INT);
			
			if($stmt->execute()) 
			{
				return;		
			} 
			else 
			{
				exit( print_r($stmt->errorInfo()) );		
			}
		}
	}//End method update_item
	
	/*
	 * 
	 * 
	 * 
	*/
	public function remove_item($cart_id, $id)
	{
		if($id)
		{
			$sql = 'DELETE FROM cart WHERE product_id = :product_id AND cart_id = :cart_id';
			$stmt = $this->db->conn_id->prepare($sql);
			$stmt->bindParam(":cart_id", $cart_id, \PDO::PARAM_STR);
			$stmt->bindParam(":product_id", $id, \PDO::PARAM_INT);
			
			if($stmt->execute()) 
			{
				return;		
			} 
			else 
			{
				exit( print_r($stmt->errorInfo()) );		
			}
		}
		elseif(!$id)
		{
			$sql = 'DELETE FROM cart WHERE cart_id = :cart_id';
			$stmt = $this->db->conn_id->prepare($sql);
			$stmt->bindParam(":cart_id", $cart_id, \PDO::PARAM_STR);
			
			if($stmt->execute()) 
			{
				return;		
			} 
			else 
			{
				exit( print_r($stmt->errorInfo()) );		
			}
		}
		
	}//End method remove_item
	
	 /*
	 * 
	 * 	@param none
	 *	@return array 
	 */
	public function content($cart_id)
	{
		$sql = 'SELECT product_id, quantity, attributes  FROM cart WHERE cart_id = :cart_id';
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(":cart_id", $cart_id, \PDO::PARAM_STR);
		
		if($stmt->execute()) 
		{
			return $stmt->fetchAll();		
		} 
		else 
		{
			exit( print_r($stmt->errorInfo()) );		
		}

		
	}//End method content
	public function content_dum()
	{
		$sql = 'SELECT product_id, quantity, attributes  FROM cart';
		$stmt = $this->db->conn_id->prepare($sql);
		$stmt->bindParam(":cart_id", $cart_id, \PDO::PARAM_STR);
		
		if($stmt->execute()) 
		{
			return $stmt->fetchAll();		
		} 
		else 
		{
			exit( print_r($stmt->errorInfo()) );		
		}

		
	}
}//End class Cart_m

/* End of file Cart_m.php */
/* Location: ./application/models/Cart_m.php */
