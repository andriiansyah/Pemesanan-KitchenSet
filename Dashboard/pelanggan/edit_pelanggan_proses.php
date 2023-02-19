<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Edit admin
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_user = $_POST['id_user'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telp_pelanggan = $_POST['no_telp_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    $edit = mysqli_query($conn, "UPDATE pelanggan SET id_user='$id_user', nama_pelanggan='$nama_pelanggan', no_telp_pelanggan='$no_telp_pelanggan', alamat_pelanggan = '$alamat_pelanggan' WHERE id_pelanggan = $id_pelanggan");
    if($edit) {
        header('location:pelanggan.php');
    } else {
        echo "Gagal";
        header('location:edit_pelanggan.php');
    }

?>