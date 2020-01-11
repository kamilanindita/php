<?php
require_once("config.php");

 if(isset($_POST['submit'])){
	$penulis=$_POST['penulis'];
    $judul=$_POST['judul'];
    $kota=$_POST['kota'];
    $penerbit=$_POST['penerbit'];
    $tahun=$_POST['tahun'];
	
	$id =$_POST['id'];
	$query="UPDATE buku SET penulis='$penulis',judul='$judul',kota='$kota',penerbit='$penerbit',tahun='$tahun' WHERE id='$id'";
    $result=$db->query($query);
					
	if($result == 1) {
		header('location:index.php');
	}	
	echo "Gagal Update data!";
	 
 }else{
	$id =$_GET['id'];
	$query="SELECT * FROM buku WHERE id='$id'";
	$hasil=$db->query($query);
	while($row=mysqli_fetch_array($hasil,MYSQLI_ASSOC)){
		$data[]=$row;
	}
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
    <input type="text" name="id" value="<?=$buku['id'];?>" hidden/>
        <table>
            <tr>
                <td>Penulis</td>
                <td>:&nbsp;<input type="text" name="penulis" value="<?=$buku['penulis'];?>"/></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:&nbsp;<input type="text" name="judul" value="<?=$buku['judul'];?>"/></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td>:&nbsp;<input type="text" name="kota" value="<?=$buku['kota'];?>"/></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td>:&nbsp;<input type="text" name="penerbit" value="<?=$buku['penerbit'];?>"/></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:&nbsp;<input type="text" name="tahun" value="<?=$buku['tahun'];?>"/></td>
            </tr>
        </table>
        <button name="submit" type="submit">Simpan</button>
    </form>
	<?php endforeach ?>
	
</body>
</html>
