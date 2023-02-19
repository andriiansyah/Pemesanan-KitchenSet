<?php 

    // session_start();
    // require_once("../../function.php");

    require_once("../koneksi.php");
    // Get id from URL to delete that user
    $id = $_GET['id'];
    
    // Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM admin WHERE id_admin = $id");
    
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:admin.php");

?>