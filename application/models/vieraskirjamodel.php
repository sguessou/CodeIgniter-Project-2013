<?php

class Vieraskirjamodel extends CI_Model
{
	protected $data = array(); 

	function __construct()	{
		parent::__construct();
	}

	public function insertData($data) {

		$query = 'INSERT INTO vieraskirja (nimi, email, teksti) VALUES (:nimi, :email, :teksti)';
		
		$stmt = $this->db->conn_id->prepare($query);
		$stmt->bindParam(':nimi', $data['nimi'], \PDO::PARAM_STR );
		$stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR );
		$stmt->bindParam(':teksti', $data['viesti'], \PDO::PARAM_STR );

		if( $stmt->execute() )
		{
			return;
		}
		else
		{
			exit( print_r($stmt->errorInfo()) );
		}
	}

	public function fetchData() {

		$query = 'SELECT * FROM vieraskirja ORDER BY id DESC';

		$stmt = $this->db->conn_id->prepare($query);

		if($stmt->execute()) 
		{
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);		
		} 
		else 
		{
			print_r($stmt->errorInfo());		
		}
	}


	
}//End class Vieraskirjamodel

/* End of file vieraskirjamodel.php */
/* Location: ./application/models/vieraskirjamodel.php */