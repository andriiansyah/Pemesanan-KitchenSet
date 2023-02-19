<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Menambah barang baru
    $id_user = $_POST['id_user'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telp_pelanggan = $_POST['no_telp_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    $addtotable = mysqli_query($conn, "INSERT INTO pelanggan (id_user, nama_pelanggan, no_telp_pelanggan, alamat_pelanggan) VALUES('$id_user', '$nama_pelanggan', '$no_telp_pelanggan', '$alamat_pelanggan')");
    if($addtotable) {
        header('location:pelanggan.php');
    } else {
        echo "Gagal";
        header('location:tambah_pelanggan.php');
    }

?>