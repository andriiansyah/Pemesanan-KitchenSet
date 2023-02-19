<?php

    require_once("dashboard/koneksi.php");

    $id_kitchen = $_POST['id_kitchen'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $rating = $_POST['rating'];
    $kategori_kitchen = $_POST['kategori_kitchen'];

    $addtotable = mysqli_query($conn, "INSERT INTO tb_rating (id_kitchen, id_pelanggan, rating) 
                                        VALUES('$id_kitchen', '$id_pelanggan', '$rating')");

    $result = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE kategori_kitchen = '$kategori_kitchen'");

    // print_r($result);

    while($data = mysqli_fetch_array($result))
    {
        $id_kitchen2 = $data['id_kitchen'];
        if($id_kitchen == $id_kitchen2)
        {
            
        }else {
            $addtotable2 = mysqli_query($conn, "INSERT INTO tb_rating (id_kitchen, id_pelanggan, rating) 
                                        VALUES('$id_kitchen2', '$id_pelanggan', 0)");
        }
    }


    echo $kategori_kitchen . "<br>";
    // echo $id_kitchen;

    header('location:produk.php');

?>