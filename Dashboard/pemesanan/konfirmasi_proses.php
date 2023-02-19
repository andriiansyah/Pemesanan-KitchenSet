<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Edit admin
    $id_pemesanan = $_POST['id_pemesanan'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $konfirmasi_pemesanan = $_POST['konfirmasi_pemesanan'];
    $proses = $_POST['proses'];
    $pengiriman = $_POST['pengiriman'];
    $harga_pemesanan = $_POST['harga_pemesanan'];
    // $id_kitchen = $_POST['id_kitchen'];
    // $id_pelanggan = $_POST['id_pelanggan'];
    // $rincian_pemesanan = $_POST['rincian_pemesanan'];
    // $status = $_POST['status'];
    // $tgl_pemesanan = $_POST['tgl_pemesanan'];

    $edit = mysqli_query($conn, "UPDATE pemesanan SET konfirmasi_pemesanan='$konfirmasi_pemesanan', proses='$proses', pengiriman='$pengiriman', harga_pemesanan='$harga_pemesanan' WHERE id_pemesanan = $id_pemesanan");

    // Tambah data Pembayaran

    $result = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pemesanan = $id_pemesanan");
    while($data = mysqli_fetch_array($result))
    {
        $id_pemesanan2 = $data['id_pemesanan'];
    }

    $result_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan");
    while($data_pelanggan = mysqli_fetch_array($result_pelanggan))
    {
        $id_user = $data_pelanggan['id_user'];
        $nama_pelanggan = $data_pelanggan['nama_pelanggan'];
        $no_telp_pelanggan = $data_pelanggan['no_telp_pelanggan'];
        $alamat_pelanggan = $data_pelanggan['alamat_pelanggan'];
    }

    if($id_pemesanan == $id_pemesanan2) {
        if($konfirmasi_pemesanan == "Tidak") {
            mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pemesanan = $id_pemesanan");
        }else if($konfirmasi_pemesanan == "Ya"){
            mysqli_query($conn, "UPDATE pembayaran SET nominal='$harga_pemesanan' WHERE id_pemesanan = $id_pemesanan");
        }
    }else if($konfirmasi_pemesanan == "Ya") {
        $addtotable = mysqli_query($conn, "INSERT INTO pembayaran 
        (id_pemesanan, no_rek_tujuan, atas_nama, no_telp, alamat, nominal, status) VALUES
        ('$id_pemesanan', '123456789', '$nama_pelanggan', '$no_telp_pelanggan', '$alamat_pelanggan', '$harga_pemesanan', 'Pendding')");
    }

    if($edit) {
        header('location:pemesanan.php');
    } else {
        echo "Gagal";
        header('location:konfirmasi.php');
    }

?>