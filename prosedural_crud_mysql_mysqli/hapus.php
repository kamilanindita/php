 <?php
	require_once("config.php"); 
	$id=$_GET['id'];
	$query="DELETE FROM buku WHERE id='$id'";
    $result=$db->query($query);	
	
	if($result == 1) {
		header('location:index.php');
	}
	echo "Gagal hapus data!";
  


?>