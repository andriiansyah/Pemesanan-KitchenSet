<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("dashboard/koneksi.php");

    // Menambah barang baru
    $id_user = $_POST['id_user'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telp_pelanggan = $_POST['no_telp_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];

    $addtotable = mysqli_query($conn, "INSERT INTO pelanggan 
    (id_user, nama_pelanggan, no_telp_pelanggan, alamat_pelanggan) VALUES
    ('$id_user', '$nama_pelanggan', '$no_telp_pelanggan', '$alamat_pelanggan')");
    if($addtotable) {
        $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_user = $id_user");
        while($data = mysqli_fetch_array($result))
        {
            $id_pelanggan = $data['id_pelanggan'];
            $nama_pelanggan = $data['nama_pelanggan'];
            $no_telp_pelanggan = $data['no_telp_pelanggan'];
            $alamat_pelanggan = $data['alamat_pelanggan'];
        }
        $_SESSION['id_pelanggan'] = $id_pelanggan;
        header('location:index.php');
    } else {
        echo "Gagal";
        header('location:profile.php');
    }

?>