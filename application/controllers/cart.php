<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller 
{
	var $base_url;
	
	public function __construct()
	{
		parent::__construct();
		$this->base_url = $this->config->item('base_url'); 
	}
	 
	public function index($id, $qty, $price, $name, $location = NULL)
	{
		$data = array( 'id' => $id,
					   'qty' => $qty,
					   'price' => $price,
					   'name' => urldecode($name));
					   
		$found = FALSE; 			   
		foreach($this->cart->contents() as $items)
		{
			if(urldecode($name) == $items['name'])
			{
				$items['qty'] += 1;
				$var = array( 'rowid' => $items['rowid'],
							  'qty' => $items['qty'] );	 
				$this->cart->update($var);
				$found = TRUE;
			}			   
		}			   
		
		if(!$found)
		{
			$this->cart->insert($data);	
		}
		
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
			
	}//End method index

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
	
	
}//End class Cart

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */
