<?php
 require_once("config.php");

 if(isset($_POST['submit'])){
	$penulis=$_POST['penulis'];
    $judul=$_POST['judul'];
    $kota=$_POST['kota'];
    $penerbit=$_POST['penerbit'];
    $tahun=$_POST['tahun'];
		
	$query="INSERT INTO buku VALUES (NULL,'$penulis','$judul','$kota','$penerbit','$tahun',NULL,NULL)";
    $result=$db->query($query);
	 
	if($result == 1) {
		header('location:index.php');
	}	
	 
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
