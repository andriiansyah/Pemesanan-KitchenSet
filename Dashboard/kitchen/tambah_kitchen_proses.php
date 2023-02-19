<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Menambah barang baru
    $nama_kitchen = $_POST['nama_kitchen'];
    $kategori_kitchen = $_POST['kategori_kitchen'];
    $foto_nama = $_FILES['foto_kitchen']['name'];
    $foto_size = $_FILES['foto_kitchen']['size'];

    // $addtotable = mysqli_query($conn, "INSERT INTO kitchen_set (nama_kitchen, kategori_kitchen, alamat_pelanggan) VALUES('$nama_kitchen', '$kategori_kitchen', '$alamat_pelanggan')");
    // if($addtotable) {
    //     header('location:pelanggan.php');
    // } else {
    //     echo "Gagal";
    //     header('location:tambah_pelanggan.php');
    // }


    // Mengecek apakah file lebih besar 2 MB atau tidak
if ($foto_size > 2097152) {
	// Jika File lebih dari 2 MB maka akan gagal mengupload File
	// header("location:insert.php?pesan=size");
    header("location:tambah_kitchen.php");
}else{

	// Mengecek apakah Ada file yang diupload atau tidak
	if ($foto_nama != "") {
		// Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
		$ekstensi_izin = array('png','jpg','jepg');
		// Memisahkan nama file dengan Ekstensinya
		$pisahkan_ekstensi = explode('.', $foto_nama); 
		$ekstensi = strtolower(end($pisahkan_ekstensi));
		// Nama file yang berada di dalam direktori temporer server
		$file_tmp = $_FILES['foto_kitchen']['tmp_name'];   
		// Membuat angka/huruf acak berdasarkan waktu diupload
		$tanggal = md5(date('Y-m-d h:i:s'));
		// Menyatukan angka/huruf acak dengan nama file aslinya
		$foto_nama_new = $tanggal.'-'.$foto_nama; 

		// Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
		if(in_array($ekstensi, $ekstensi_izin) === true)  {
			// Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, '../images/kitchen/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
            $query = mysqli_query($conn, "INSERT INTO kitchen_set VALUES ('','$nama_kitchen', '$kategori_kitchen', '$foto_nama_new', '')");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	// header("location:insert.php?pesan=berhasil");
                // header("location:kitchen.php");
                
                // LANJUTIN
                header("location:tambah_kitchen_proses2.php?nama=$nama_kitchen");
                
            } else {
                // header("location:insert.php?pesan=gagal");
                header("location:tambah_kitchen.php");
            }

        } else { 
        	// Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
        	// header("location:insert.php?pesan=ekstensi"); 
            header("location:tambah_kitchen.php");       
        }

    }else{

    	// Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
    	 $query = mysqli_query($conn, "INSERT INTO kitchen_set (nama_kitchen, kategori_kitchen) VALUES('$nama_kitchen', '$kategori_kitchen')");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	// header("location:tambah_kitchen_proses2.php?nama=$nama_kitchen");
                // header("location:kitchen.php");
            } else {
                // header("location:insert.php?pesan=gagal");
                header("location:tambah_kitchen.php");  
            }

    }

}


?>