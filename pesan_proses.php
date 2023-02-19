<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("dashboard/koneksi.php");

    // Menambah barang baru
    $id_kitchen = $_POST['id_kitchen'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $bahan = $_POST['bahan'];
    $warna = $_POST['warna'];
    $ukuran_kitchen_set = $_POST['ukuran_kitchen_set'];
    $survey = $_POST['survey'];
    $rincian_pemesanan = $_POST['rincian_pemesanan'];
    $tgl_pemesanan = $_POST['tgl_pemesanan'];

    $addtotable = mysqli_query($conn, "INSERT INTO pemesanan (id_kitchen, id_pelanggan, bahan, warna, ukuran_kitchen_set, survey, rincian_pemesanan, tgl_pemesanan) VALUES('$id_kitchen', '$id_pelanggan', '$bahan', '$warna', '$ukuran_kitchen_set', '$survey', '$rincian_pemesanan', '$tgl_pemesanan')");
    if($addtotable) {
        $duer = "card.php?id=$id_pelanggan";
        header('location: ' . $duer);
    } else {
        echo "Gagal";
        header('location:pesan.php');
    }

?>