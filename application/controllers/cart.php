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
					   
		$this->cart->insert($data);	
		
		if($location == 'book')
		{
		}
		elseif($location == 'dvd')
		{
		}
		else
		{
			header("Location:$this->base_url");
		}
			
		
			
	}

}//End class Cart

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */
