<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Edit admin
    $id_pembayaran = $_POST['id_pembayaran'];
    $konfirmasi_pembayaran = $_POST['konfirmasi_pembayaran'];
    $status = $_POST['status'];

    $edit = mysqli_query($conn, "UPDATE pembayaran SET konfirmasi_pembayaran='$konfirmasi_pembayaran', status='$status' WHERE id_pembayaran = $id_pembayaran");

    $result = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran = $id_pembayaran ");
    while($data = mysqli_fetch_array($result))
    {
        $id_pemesanan = $data['id_pemesanan'];
        $transfer_atas_nama = $data['transfer_atas_nama'];
        $atas_nama = $data['atas_nama'];
        $no_telp = $data['no_telp'];
        $alamat = $data['alamat'];
        $nominal = $data['nominal'];
        $bukti_tranfer = $data['bukti_tranfer'];
        $konfirmasi_pembayaran = $data['konfirmasi_pembayaran'];
        $status = $data['status'];
        $tgl_pembayaran = $data['tgl_pembayaran'];
        $tgl_selesai = $data['tgl_selesai'];
        $tgl_sampai = $data['tgl_sampai'];
    }

    $result2 = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_pemesanan = $id_pemesanan ");
    while($data2 = mysqli_fetch_array($result2))
    {
        $proses = $data2['proses'];
        $pengiriman = $data2['pengiriman'];
    }

    if($tgl_selesai == "" && $tgl_sampai == "")
    {
        // Tanggal sekarang
        $tgl_sekarang = date("Y/m/d");

        // Tanggal selesai kitchen set, status pembayaran belum di acc
        $tgl_selesai_res = date('Y-m-d', strtotime('+' . $proses . ' days', strtotime($tgl_sekarang)));

        // Tanggal sampai kitchen set ke pelanggan
        $hitung_tgl_sampai = $proses + $pengiriman;
        $tgl_sampai_res = date('Y-m-d', strtotime('+' . $hitung_tgl_sampai . ' days', strtotime($tgl_sekarang)));

        // Mengupdate tgl_selesai, dan tgl_sampai, yang tadinya tidak ada data menjadi ada data
        mysqli_query($conn, "UPDATE pembayaran SET tgl_selesai='$tgl_selesai_res', tgl_sampai='$tgl_sampai_res' WHERE id_pembayaran = $id_pembayaran");
        echo "MANTAP";
    }

    if($edit) {
        header('location:pembayaran.php');
    } else {
        echo "Gagal";
        header('location:konfirmasi.php');
    }

?>