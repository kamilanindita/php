<?php
 require_once("config.php");
 $query = new MongoDB\Driver\Query([]); 
 $data = $db->executeQuery($database.'.'.$collection, $query);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Buku</title>
</head>
<body>
    <h3><a href="tambah.php">Tambah Buku</a>
    <br>
    <table>
        <tr>
            <th>Penulis</th>
            <th>Judul</th>            
            <th>Kota</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Action</th>
        </tr>
    <?php foreach($data as $buku ): ?>
        <tr>
            <td><?=$buku->penulis;?></td>
            <td><?=$buku->judul;?></td>
            <td><?=$buku->kota;?></td>
            <td><?=$buku->penerbit;?></td>
            <td><?=$buku->tahun;?></td>
            <td>
                <a href="edit.php?_id=<?=$buku->_id;?>">Edit</a> 
                |
                <a href="hapus.php?_id=<?=$buku->_id;?>">Hapus</a>
            </td>
        </tr>
    <?php endforeach ?>
    </table>

</body>
</html>
