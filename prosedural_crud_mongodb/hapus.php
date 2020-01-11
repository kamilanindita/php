 <?php
	require_once("config.php"); 
	$query = new MongoDB\Driver\BulkWrite();
	$query->delete(['_id' => new MongoDB\BSON\ObjectId($_GET['_id'])]);
			
	$result = $db->executeBulkWrite($database.'.'.$collection, $query);
			
	if($result == 1) {
		header('location:index.php');
	}
	echo "Gagal hapus data!";
  


?>