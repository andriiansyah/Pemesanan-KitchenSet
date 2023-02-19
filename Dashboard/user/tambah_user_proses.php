<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Menambah barang baru
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];

    $addtotable = mysqli_query($conn, "INSERT INTO user (username, password, hak_akses) VALUES('$username', '$password', '$hak_akses')");
    if($addtotable) {
        header('location:user.php');
    } else {
        echo "Gagal";
        header('location:tambah_user.php');
    }

?>