<?php
    include("dashboard/koneksi.php");

    if(isset($_SESSION['username'])){

        $result_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '". $_SESSION["username"]."'");
        while($data_user = mysqli_fetch_array($result_user))
        {
            $id_user = $data_user['id_user'];
            $password = $data_user['password'];
            $hak_akses = $data_user['hak_akses'];
        }

        if($_SESSION['hak_akses'] == "pelanggan"){
            $result_cek = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '". $_SESSION["id_pelanggan"]."' AND id_user = $id_user");
            while($data = mysqli_fetch_array($result_cek))
            {
                $nama_pelanggan = $data['nama_pelanggan'];
                $no_telp_pelanggan = $data['no_telp_pelanggan'];
                $alamat_pelanggan = $data['alamat_pelanggan'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Hylarana Kreasi Inspira</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark shadow-lg">
        <div class="container ">
            <a class="navbar-brand" href="index.php"><img src="images/hylarana.png" width="30" height="30" alt=""> Hylarana</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="produk.php">Produk</a>
                </li>
                <li class="nav-item dropdown">
                <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> -->
            </ul>
            <ul class="navbar-nav d-flex">
                
                
                    <?php
                        if(!isset($_SESSION['username'])){
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard/index.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard/index.php">
                                <i class="bi bi-bag-check-fill" style="color: white;"></i>
                            </a>
                        </li>
                    <?php
                        }else if($_SESSION['hak_akses'] == "admin") {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard/user/user.php">
                                Dashboard
                            </a>
                        </li>
                    <?php
                        }else if($_SESSION['hak_akses'] == "pelanggan" && $result_cek->num_rows == 0){ 
                    ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-fill" style="color: white;"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start dropdown-menu-dark" style="width: 10px;" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profile.php?id=<?= $id_user ?>">Profil</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php?id=<?= $id_user ?>">
                                    <i class="bi bi-bag-check-fill" style="color: white;"></i>
                                </a>
                            </li>
                    <?php
                        }else if($_SESSION['hak_akses'] == "pelanggan") {
                    ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-fill" style="color: white;"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start dropdown-menu-dark" style="width: 10px;" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="profile_edit.php?id=<?= $_SESSION['id_pelanggan'] ?>">Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <a class="nav-link" href="card.php?id=<?php echo $_SESSION['id_pelanggan']; ?>">
                                <i class="bi bi-bag-check-fill" style="color: white;"></i>
                            </a>
                    <?php
                        }
                    ?>
                    
                    
                    
                
            </ul>
            
            <!-- <form class="d-flex"> -->
                <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button> -->
                <!-- <span class="me-2"><i class="bi bi-person" style="font-size: 1.5rem; color: white;"></i></span> -->
            <!-- </form> -->
            </div>
        </div>
    </nav>