<?php

    require_once("dashboard/koneksi.php");

    $id_rating = $_POST['id_rating'];
    $rating = $_POST['rating'];

    $edit = mysqli_query($conn, "UPDATE tb_rating SET rating='$rating' WHERE id_rating = $id_rating");
    if($edit) {
        echo "Berhasil";
        header('location:produk.php');
    } else {
        echo "Gagal";
        // header('location:edit_admin.php');
    }

    echo $id_rating . " " . $rating;

?>