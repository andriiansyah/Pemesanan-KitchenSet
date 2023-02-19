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