<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $site_title;
	var $css;
	var $base_url;
	var $data = array();
	
	public function __construct()
	{
	  parent::__construct();
	  $this->site_title = $this->config->item('site_title');
	  $this->css = $this->config->item('css');
	  $this->base_url = $this->config->item('base_url');
	  $this->load->library('session');		
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['css'] = $this->css;
		$data['site_title'] = $this->site_title;
		$data['base_url'] = $this->base_url;
		
		$this->load->model('products_m');
		
		$data['books'] = $this->products_m->fetch_products('Book', 4);
		$data['dvds'] = $this->products_m->fetch_products('Dvd', 4);
		
		$data['cart_content'] = $this->cart->contents();
		$data['cart_total'] = $this->cart->total();
		$data['cart_total_items'] = $this->cart->total_items();
		
		$data['session'] = $this->session->all_userdata();
		
		$this->load->view('./index/welcome_main_v', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
