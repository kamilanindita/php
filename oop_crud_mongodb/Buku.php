<?php    

    class Buku{
	
		private $database="mywebsite_crud";
		private $collection="buku";
		private $conn;
		
		
		function __construct() {
		     $this->conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			 
	    }
		
		function getBuku(){
			$query = new MongoDB\Driver\Query([]); 
			$hasil = $this->conn->executeQuery($this->database.'.'.$this->collection, $query);
			return $hasil;
		}
		
		
		function addBuku($data) {
		
			$query = new MongoDB\Driver\BulkWrite();
			$query->insert($data);
			
			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
			
			if($result == 1) {
				return TRUE;
			}
			
			return FALSE;
		
	    }
		
		function getBukuBy($_id){
			$filter = ['_id' => new MongoDB\BSON\ObjectId($_id)];
		    $query = new MongoDB\Driver\Query($filter); 
			$hasil = $this->conn->executeQuery($this->database.'.'.$this->collection, $query);
			return $hasil;
	    }
		
		
		function updateBukuBy($_id, $data) {

			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => $data]);
			
			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
			
			if($result == 1) {
				return TRUE;
			}
			
			return FALSE;
	
		}
		
		
		function deleteBukuBy($_id) {
			$query = new MongoDB\Driver\BulkWrite();
			$query->delete(['_id' => new MongoDB\BSON\ObjectId($_id)]);
			
			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
			
			if($result == 1) {
				return TRUE;
			}
			
			return FALSE;
	    }
	}
?>