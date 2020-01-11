<?php
 require_once("config.php");

 if(isset($_POST['submit'])){
	$data=[
            "penulis"=>$_POST['penulis'],
            "judul"=>$_POST['judul'],
            "kota"=>$_POST['kota'],
            "penerbit"=>$_POST['penerbit'],
            "tahun"=>$_POST['tahun']
	];
		
	$query = new MongoDB\Driver\BulkWrite();
	$query->insert($data);
			
	$db->executeBulkWrite($database.'.'.$collection, $query);
	header('location:index.php');
	 
 }
 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
</head>
<body>
    <form method="POST">
            <table>
                <tr>
                    <td>Penulis</td>
                    <td>:&nbsp;<input type="text" name="penulis" id="penulis"/></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>:&nbsp;<input type="text" name="judul" id="judul"/></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td>:&nbsp;<input type="text" name="kota" id="kota"/></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>:&nbsp;<input type="text" name="penerbit" id="penerbit"/></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:&nbsp;<input type="text" name="tahun" id="tahun"/></td>
                </tr>
            </table>
            <button name="submit" type="submit">Tambah</button>
        </form>
</body>
</html>
