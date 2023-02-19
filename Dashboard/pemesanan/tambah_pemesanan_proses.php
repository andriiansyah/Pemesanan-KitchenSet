<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Menambah barang baru
    $id_kitchen = $_POST['id_kitchen'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $rincian_pemesanan = $_POST['rincian_pemesanan'];
    // $konfirmasi_pemesanan = $_POST['konfirmasi_pemesanan'];
    $harga_pemesanan = $_POST['harga_pemesanan'];
    $tgl_pemesanan = $_POST['tgl_pemesanan'];

    $addtotable = mysqli_query($conn, "INSERT INTO pemesanan (id_kitchen, id_pelanggan, rincian_pemesanan, konfirmasi_pemesanan, harga_pemesanan, tgl_pemesanan) VALUES('$id_kitchen', '$id_pelanggan', '$rincian_pemesanan', 'Tidak', '$harga_pemesanan', '$tgl_pemesanan')");
    if($addtotable) {
        header('location:pemesanan.php');
    } else {
        echo "Gagal";
        header('location:tambah_pemesanan.php');
    }

?>