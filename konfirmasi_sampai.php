<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("dashboard/koneksi.php");

    // Edit user
    $id_pembayaran = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran = $id_pembayaran");

    while($data = mysqli_fetch_array($result))
    {
        $id_pemesanan = $data['id_pemesanan'];
    }

    // Edit pemesanan pada konfirmasi pemesanan menjadi selesai
    $edit2 = mysqli_query($conn, "UPDATE pemesanan SET konfirmasi_pemesanan='Selesai' WHERE id_pemesanan = $id_pemesanan");
    $edit = mysqli_query($conn, "UPDATE pembayaran SET status='Sampai', konfirmasi_pembayaran='Selesai' WHERE id_pembayaran = $id_pembayaran");
    if($edit && $edit2) {
        header("location:rating.php?id=$id_pemesanan");
    } else {
        echo "Gagal";
        // header('location:edit_user.php');
    }

?>