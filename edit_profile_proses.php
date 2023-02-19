<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("dashboard/koneksi.php");

    // Edit pelanggan
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telp_pelanggan = $_POST['no_telp_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    $edit = mysqli_query($conn, "UPDATE pelanggan SET id_pelanggan='$id_pelanggan', nama_pelanggan='$nama_pelanggan', no_telp_pelanggan='$no_telp_pelanggan', alamat_pelanggan = '$alamat_pelanggan' WHERE id_pelanggan = $id_pelanggan");
    if($edit) {
        header('location:index.php');
    } else {
        echo "Gagal";
        // header('location:edit_admin.php');
    }

?>