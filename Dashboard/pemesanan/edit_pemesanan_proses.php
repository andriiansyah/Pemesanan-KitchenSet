<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Edit admin
    $id_pemesanan = $_POST['id_pemesanan'];
    $id_kitchen = $_POST['id_kitchen'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $rincian_pemesanan = $_POST['rincian_pemesanan'];
    $status = $_POST['status'];
    $tgl_pemesanan = $_POST['tgl_pemesanan'];

    $edit = mysqli_query($conn, "UPDATE pemesanan SET id_kitchen='$id_kitchen', id_pelanggan='$id_pelanggan', rincian_pemesanan='$rincian_pemesanan', status = '$status', tgl_pemesanan = '$tgl_pemesanan' WHERE id_pemesanan = $id_pemesanan");
    if($edit) {
        header('location:pemesanan.php');
    } else {
        echo "Gagal";
        header('location:edit_pemesanan.php');
    }

?>