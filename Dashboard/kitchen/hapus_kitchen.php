<?php 

    // session_start();
    // require_once("../../function.php");

    require_once("../koneksi.php");
    // Get id from URL to delete that user
    $id = $_GET['id'];
    
    // Mengambil data siswa_foto didalam table siswa
    $get_foto = "SELECT foto_kitchen FROM kitchen_set WHERE id_kitchen = '$id'";
    $data_foto = mysqli_query($conn, $get_foto); 
    // Mengubah data yang diambil menjadi Array
    $foto_lama = mysqli_fetch_array($data_foto);
    unlink("../images/kitchen/".$foto_lama['foto_kitchen']);

    // Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM kitchen_set WHERE id_kitchen = $id");
    
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:kitchen.php");

?>