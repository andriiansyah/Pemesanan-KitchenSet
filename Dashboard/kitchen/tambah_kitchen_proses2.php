<?php 

    // session_start();
    // require_once("../../function.php");
    require_once("../koneksi.php");

    $nama_kitchen = $_GET['nama'];

    // $addtotable = mysqli_query($conn, "INSERT INTO pelanggan 
    // (id_user, nama_pelanggan, no_telp_pelanggan, alamat_pelanggan) VALUES
    // ('$id_user', '$nama_pelanggan', '$no_telp_pelanggan', '$alamat_pelanggan')");

    $i = 0;

    $result2 = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE nama_kitchen = '$nama_kitchen'");
    while($data2 = mysqli_fetch_array($result2))
    {
        $id_kitchen = $data2['id_kitchen'];
        $kategori_kitchen = $data2['kategori_kitchen'];

        $result5 = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE kategori_kitchen = '$kategori_kitchen' LIMIT 1");
        while($data5 = mysqli_fetch_array($result5))
        {
            $id_kitchen2 = $data5['id_kitchen'];
            // echo $id_kitchen;
            $result6 = mysqli_query($conn, "SELECT * FROM tb_rating WHERE id_kitchen = $id_kitchen2");
            while($data6 = mysqli_fetch_array($result6))
            {
                $id_pelanggan = $data6['id_pelanggan'];
                // echo $id_pelanggan . "<br>";
                if($i == 0)
                {
                    mysqli_query($conn, "INSERT INTO tb_rating 
                    (id_kitchen, id_pelanggan, rating) VALUES
                    ('$id_kitchen', '$id_pelanggan', 1)");
                    
                    $i = $i+1;
                }else {
                    mysqli_query($conn, "INSERT INTO tb_rating 
                    (id_kitchen, id_pelanggan, rating) VALUES
                    ('$id_kitchen', '$id_pelanggan', 0)");
                }
                
            }
            // $result3 = mysqli_query($conn, "SELECT DISTINCT id_pelanggan FROM tb_rating");
            // while($data3 = mysqli_fetch_array($result3))
            // {
            //     $id_pelanggan = $data3['id_pelanggan'];
            //     // echo $id_pelanggan . "<br>";
            //     $result4 = mysqli_query($conn, "SELECT * FROM tb_rating WHERE id_pelanggan = $id_pelanggan AND id_kitchen = '$id_kitchen' ORDER BY id_pelanggan");
            //     while($data4 = mysqli_fetch_array($result4))
            //     {
            //         if($i == 0)
            //         {
            //             mysqli_query($conn, "INSERT INTO tb_rating 
            //             (id_kitchen, id_pelanggan, rating) VALUES
            //             ('$id_kitchen', '$id_pelanggan', 1)");
            //         }else {
            //             mysqli_query($conn, "INSERT INTO tb_rating 
            //             (id_kitchen, id_pelanggan, rating) VALUES
            //             ('$id_kitchen', '$id_pelanggan', 0)");
            //         }
            //         $i = $i+1;
            //     }
            // }
        }
        
    }

    header("location:kitchen.php");

    // echo $nama_kitchen;


?>