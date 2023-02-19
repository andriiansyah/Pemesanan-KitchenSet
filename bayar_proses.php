<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("dashboard/koneksi.php");

    // Menambah barang baru
    $id_pemesanan = $_POST['id_pemesanan'];
    $atas_nama = $_POST['atas_nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $nominal = $_POST['nominal'];
    $status = $_POST['status'];

    $addtotable = mysqli_query($conn, "INSERT INTO pembayaran 
    (id_pemesanan, no_rek_tujuan, atas_nama, no_telp, alamat, nominal, status) VALUES
    ('$id_pemesanan', '123456789', '$atas_nama', '$no_telp', '$alamat', '$nominal', 'Pendding')");
    if($addtotable) {
        header('location:produk.php');
    } else {
        echo "Gagal";
        header("location:bayar_final.php?id=$id_pemesanan");
    }

?>