<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    // Edit user
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];

    $edit = mysqli_query($conn, "UPDATE user SET username='$username', password='$password', hak_akses='$hak_akses' WHERE id_user = $id_user");
    if($edit) {
        header('location:user.php');
    } else {
        echo "Gagal";
        header('location:edit_user.php');
    }

?>