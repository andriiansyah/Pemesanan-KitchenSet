<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Menambah barang baru
    $id_user = $_POST['id_user'];
    $nama_admin = $_POST['nama_admin'];
    $no_telp_admin = $_POST['no_telp_admin'];
    $alamat_admin = $_POST['alamat_admin'];

    $addtotable = mysqli_query($conn, "INSERT INTO admin (id_user, nama_admin, no_telp_admin, alamat_admin) VALUES('$id_user', '$nama_admin', '$no_telp_admin', '$alamat_admin')");
    if($addtotable) {
        header('location:admin.php');
    } else {
        echo "Gagal";
        header('location:tambah_admin.php');
    }

?>