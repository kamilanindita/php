<?php
require_once("config.php");

 if(isset($_POST['submit'])){
	 $data_update=[
            "penulis"=>$_POST['penulis'],
            "judul"=>$_POST['judul'],
            "kota"=>$_POST['kota'],
            "penerbit"=>$_POST['penerbit'],
            "tahun"=>$_POST['tahun']
	];
		
	$query = new MongoDB\Driver\BulkWrite();
	$query->update(['_id' => new MongoDB\BSON\ObjectId($_POST['_id'])], ['$set' => $data_update]);
			
	$result = $db->executeBulkWrite($database.'.'.$collection, $query);
			
	if($result == 1) {
		header('location:index.php');
	}	
	echo "Gagal Update data!";
	 
 }else{
	$filter = ['_id' => new MongoDB\BSON\ObjectId($_GET['_id'])];
	$query = new MongoDB\Driver\Query($filter); 
	$data = $db->executeQuery($database.'.'.$collection, $query);
 }
 
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<?php foreach($data as $buku ): ?>
    <form method="POST">
    <input type="text" name="_id" value="<?=$buku->_id;?>" hidden/>
        <table>
            <tr>
                <td>Penulis</td>
                <td>:&nbsp;<input type="text" name="penulis" value="<?=$buku->penulis;?>"/></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:&nbsp;<input type="text" name="judul" value="<?=$buku->judul;?>"/></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>:&nbsp;<input type="text" name="kota" value="<?=$buku->kota;?>"/></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:&nbsp;<input type="text" name="penerbit" value="<?=$buku->penerbit;?>"/></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:&nbsp;<input type="text" name="tahun" value="<?=$buku->tahun;?>"/></td>
            </tr>
        </table>
        <button name="submit" type="submit">Simpan</button>
    </form>
	<?php endforeach ?>
	
</body>
</html>
