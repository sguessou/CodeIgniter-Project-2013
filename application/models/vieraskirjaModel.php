<?php

class VieraskirjaModel extends CI_Model
{

	function __construct()	{
		parent::__construct();
	}

	public function insertData($data) {

		

		$query = 'INSERT INTO vieraskirja (nimi, email, teksti) VALUES (:nimi, :email, :teksti)';
		
		$stmt = $this->db->conn_id->prepare($query);
		$stmt->bindParam(':nimi', $data['nimi'], \PDO::PARAM_STR );
		$stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR );
		$stmt->bindParam(':teksti', $data['teksti'], \PDO::PARAM_STR );

		if( $stmt->execute() )
		{
			return;
		}
		else
		{
			exit( print_r($stmt->errorInfo()) );
		}
	}

	
}//End class VieraskirjaModel

/* End of file vieraskirjaModel.php */
/* Location: ./application/models/vieraskirjaModel.php */