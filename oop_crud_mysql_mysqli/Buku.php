<?php    

    class Buku{
	
		
		protected $HOST="localhost";
		protected $USER="root";
		protected $PSWD="";
		protected $DB="website_crud";
		protected $koneksi_mysqli; 
	 
	
	
		function __construct(){
			
			//Mysqli
			$this->koneksi_mysqli = new mysqli($this->HOST, $this->USER, $this->PSWD,$this->DB);
			
		}

		
		function getBuku(){
			$query="SELECT * FROM buku";
			$hasil=$this->koneksi_mysqli->query($query);
			while($row=mysqli_fetch_array($hasil,MYSQLI_ASSOC)){
				$data[]=$row;
			}
			return $data;
		}
		
		
		function addBuku($data) {
			$penulis=$data['penulis'];
            $judul=$data['judul'];
            $kota=$data['kota'];
            $penerbit=$data['penerbit'];
            $tahun=$data['tahun'];
		
	        $query="INSERT INTO buku VALUES (NULL,'$penulis','$judul','$kota','$penerbit','$tahun',NULL,NULL)";
            $result=$this->koneksi_mysqli->query($query);
			
			if($result == 1) {
				return TRUE;
			}
			
			return FALSE;
		
	    }
		
		function getBukuBy($id){
			$query="SELECT * FROM buku WHERE id='$id'";
			$hasil=$this->koneksi_mysqli->query($query);
			while($row=mysqli_fetch_array($hasil,MYSQLI_ASSOC)){
				$data[]=$row;
			}
			
			return $data;
	    }
		
		
		function updateBukuBy($id, $data) {
			$penulis=$data['penulis'];
			$judul=$data['judul'];
			$kota=$data['kota'];
			$penerbit=$data['penerbit'];
			$tahun=$data['tahun'];
			

			$query="UPDATE buku SET penulis='$penulis',judul='$judul',kota='$kota',penerbit='$penerbit',tahun='$tahun' WHERE id='$id'";
			$result=$this->koneksi_mysqli->query($query);
							
			if($result == 1) {
				return TRUE;
			}
			
			return FALSE;
	
		}
		
		
		function deleteBukuBy($id) {
			$query="DELETE FROM buku WHERE id='$id'";
            $result=$this->koneksi_mysqli->query($query);	
	
			if($result == 1) {
				return TRUE;
			}
			
			return FALSE;
	    }
	}
?>