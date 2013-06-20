<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_cart 
{
	//Assign by reference the CodeIgniter object to variable $_CI that will be used instead of $this
	protected $_CI;
	
	//Variable to hold the cart id
	protected $_cart_id;
	
	protected $_data;
	
	protected $_total;
	protected $_total_items;
	
	
	public function __construct()
	{
		//parent::__construct();
		$this->_CI =& get_instance();
		$this->_CI->load->library('my_session');
		$this->_CI->load->helper('cookie');


		$this->set_cart_id();
	}

	public function get_cart_id()
	{
		// Ensure we have a cart id for the current visitor
		if( !isset( $this->_cart_id ) )
			   $this->set_cart_id();
			
		return $this->_cart_id;
	}

	/*
	*
	*
	*	@param int, int, string, string 
	* 	@return void
   */
	public function add_item($id, $price, $name, $product_type)
	{
		$this->_CI->load->model('cart_m');
		$this->_CI->load->model('products_m');

		$product_data = $this->_CI->products_m->get_row($id);
		
		//$description = implode(' ', array_slice(explode(' ', $product_data['product_description']), 0, 40));
		//$description .= '...'; 
		
		$attributes = serialize( array( 'name' => urldecode($name),
										'product_type' => $product_type,
										'price' => $price,
										'description' => $product_data[0]['product_description'], 
										'language' => $product_data[0]['product_language'],
										'isbn10' => $product_data[0]['product_isbn10']) );
					   
		$this->_CI->cart_m->insert_item($this->get_cart_id(), $id, $attributes);
		
		return;	
	}//End method add_item
	
	/*
	*
	*
	*	@param int 
	* 	@return void
   */
	public function remove($id = NULL)
	{
		$this->_CI->load->model('cart_m');
					   
		$this->_CI->cart_m->remove_item($this->_cart_id, $id);
		
		return;	
	}//End method add_item
	
	/*
	*
	*
	*	@param int, int
	* 	@return void
   */
	public function update($id, $qty)
	{
		$this->_CI->load->model('cart_m');
					   
		$this->_CI->cart_m->update_item($this->_cart_id, $id, $qty);
		
		return;	
	}//End method add_item
	
	/*
	*
	* @param void
	* @return void  
	*/
	public function set_cart_id() 
   	{
		
		$this->_CI->load->helper('cookie');
		
		// If Cart ID hasn't been set yet...
		if( $this->_cart_id == '' ) 
		{
			// If ID is in the session, get it from there 
			if($this->_CI->my_session->is_set('CICartId')) 
			{
				$this->_cart_id = $this->_CI->my_session->get('CICartId');
			}
			// If not, check wether the ID was saved as a cookie
			elseif($this->_CI->input->cookie('CICartId', TRUE))
			{
				$this->_cart_id = $this->_CI->input->cookie('CICartId', TRUE);
				$this->_CI->my_session->set('CICartId', $this->_cart_id);
  			
				// Regenerate cookie to be valid for 7 days (604800 seconds)
				$this->_CI->input->set_cookie( 'CICartId', $this->_cart_id, time() + 604800, '.127.0.0.1', '/', '', '' );
			}
			else 
			{
				// Generate cart id and save it to $_cart_id, the session and a cookie
				$this->_cart_id = md5( uniqid(rand(), true) );
				$this->_CI->my_session->set('CICartId', $this->_cart_id);
				$this->_CI->input->set_cookie( 'CICartId', $this->_cart_id, time() + 604800, '.127.0.0.1', '/', '', '' );
}
		}
	}//End method set_cart_id
	
	/*
	*
	* @param void
	* @return array  
	*/
	public function get_cart()
	{	
		$this->_data = array();
		
		
		$this->_CI->load->model('cart_m');
		
		$this->_data = $this->_CI->cart_m->content($this->get_cart_id());
		//return $this->_data;	
		for($i = 0; $i < count($this->_data); $i++)
		{
			$this->_data[$i]['attributes'] = unserialize($this->_data[$i]['attributes']);
			unset($this->_data[$i][2]);
		}
		
		for($i = 0; $i < count($this->_data); $i++)
		{
			$this->_total_items += (int)$this->_data[$i]['quantity']; 

			(float)$this->_total += (float)$this->_data[$i]['attributes']['price'] * (int)$this->_data[$i]['quantity'];
		}
		
		if ( !$this->_total_items ) $this->_total_items = 0;
		return array($this->_data, $this->_total, $this->_total_items);	
	}
	/*
	public function update_cart($rowid, $qty, $location = NULL)
	{
		$data = array( 'rowid' => $rowid,
				  	   'qty' => $qty );
	
		$this->cart->update($data);
		
		if(strtolower($location) == 'book')
		{
			header("Location:$this->base_url/products/index/begin/Book/");
		}
		elseif(strtolower($location) == 'dvd')
		{
			header("Location:$this->base_url/products/index/begin/Dvd/");
		}
		else
		{
			header("Location:$this->base_url");
		}		 		
	}//End method update_cart
	
	public function empty_cart($location = NULL)
	{
		$this->cart->destroy();
		
		if(strtolower($location) == 'book')
		{
			header("Location:$this->base_url/products/index/begin/Book/");
		}
		elseif(strtolower($location) == 'dvd')
		{
			header("Location:$this->base_url/products/index/begin/Dvd/");
		}
		else
		{
			header("Location:$this->base_url");
		}	
	}//End method empty_cart
	*/
	
}//End class Cart

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */
