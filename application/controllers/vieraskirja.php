<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vieraskirja extends CI_Controller {

	protected $data = array();
	protected $viesti = array();


	public function __construct() {
		
		parent::__construct();
		$this->initialize();
	}

	public function index() {

		$this->accesslog_m->register( 'CI_BS->Vieraskirja->index', $_SERVER['REMOTE_ADDR'], gethostbyaddr( $_SERVER['REMOTE_ADDR'] ) );

		$this->data['viestit'] = $this->vieraskirjamodel->fetchData();
		
		$this->load->view('/vieraskirja/mainView', $this->data);
	}
	
	public function saveData() {

		$this->accesslog_m->register( 'CI_BS->Vieraskirja->save', $_SERVER['REMOTE_ADDR'], gethostbyaddr( $_SERVER['REMOTE_ADDR'] ) );
		
		$this->viesti = $this->input->post(NULL, TRUE); // returns all POST items with XSS filter 
		
		//var_dump($this->data);
		
		$this->vieraskirjamodel->insertData($this->viesti);

		header('Location:http://'.$_SERVER['SERVER_NAME'].'/vieraskirja/index');
	}

	protected function initialize() {

		$this->data['siteTitle'] = 'Vieraskirja';
		$this->data['baseUrl'] = 'http://'.$_SERVER['SERVER_NAME'];

		$this->load->model('vieraskirjamodel');
		$this->load->model('accesslog_m');

	}

}//End class Vieraskirja

/* End of file vieraskirja.php */
/* Location: ./application/controllers/vieraskirja.php */
