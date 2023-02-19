<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Edit admin
    $id_admin = $_POST['id_admin'];
    $id_user = $_POST['id_user'];
    $nama_admin = $_POST['nama_admin'];
    $no_telp_admin = $_POST['no_telp_admin'];
    $alamat_admin = $_POST['alamat_admin'];

    $edit = mysqli_query($conn, "UPDATE admin SET id_user='$id_user', nama_admin='$nama_admin', no_telp_admin='$no_telp_admin', alamat_admin = '$alamat_admin' WHERE id_admin = $id_admin");
    if($edit) {
        header('location:admin.php');
    } else {
        echo "Gagal";
        header('location:edit_admin.php');
    }

?>


<?php 
// Menghubungkan file ini dengan file database
include '../koneksi.php';
// Mengecek apakah ID ada datanya atau tidak
if (isset($_POST['id_kitchen'])) {
    if ($_POST['id_kitchen'] != "") {
        // Mengambil data dari form lalu ditampung didalam variabel
        $id_kitchen = $_POST['id_kitchen'];
        $nama_kitchen = $_POST['nama_kitchen'];
        $kategori_kitchen = $_POST['kategori_kitchen'];
        $foto_nama = $_FILES['foto_kitchen']['name'];
        $foto_size = $_FILES['foto_kitchen']['size'];

    }else{
        header("location:kitchen.php");
    }

    // Mengecek apakah file lebih besar 2 MB atau tidak
    if ($foto_size > 2097152) {
	   // Jika File lebih dari 2 MB maka akan gagal mengupload File
    //    header("location:index.php?pesan=size");
        header("location:kitchen.php");
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

            // Mengambil data siswa_foto didalam table siswa
            $get_foto = "SELECT foto_kitchen FROM kitchen_set WHERE id_kitchen = '$id_kitchen'";
            $data_foto = mysqli_query($conn, $get_foto); 
            // Mengubah data yang diambil menjadi Array
            $foto_lama = mysqli_fetch_array($data_foto);

            // Menghapus Foto lama didalam folder FOTO
            unlink("../images/kitchen/".$foto_lama['foto_kitchen']);    

			// Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, '../images/kitchen/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
            $query = mysqli_query($conn, "UPDATE kitchen_set SET nama_kitchen='$nama_kitchen', kategori_kitchen='$kategori_kitchen', foto_kitchen='$foto_nama_new' WHERE id_kitchen = '$id_kitchen'");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	// header("location:index.php?pesan=berhasil");
                header("location:kitchen.php");
            } else {
                // header("location:index.php?pesan=gagal");
                header("location:kitchen.php");
            }

        } else { 
        	// Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
        	// header("location:index.php?pesan=ekstensi");
            header("location:tambah_kitchen.php");
        }

        }else{

    	// Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
          $query = mysqli_query($conn, "UPDATE kitchen_set SET nama_kitchen='$nama_kitchen', kategori_kitchen='$kategori_kitchen' WHERE id_kitchen='$id_kitchen'");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
                // header("location:index.php?pesan=berhasil");
                header("location:kitchen.php");
            }else {
                // header("location:index.php?pesan=gagal");
                header("location:kitchen.php");
            }
        }

    }
}else{
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    // header("location:index.php");
    header("location:kitchen.php");
}
?>