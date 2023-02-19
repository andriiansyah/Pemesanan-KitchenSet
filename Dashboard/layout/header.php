<?php 
    require_once("../koneksi.php");
    if (!isset($_SESSION['username'])) {
      header("Location: ../index.php");
    } else if($_SESSION['hak_akses'] == "pelanggan"){
      header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    
    <link rel="stylesheet" href="../css/style.css" />

    <!-- Date Picker -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <title>Dashboard</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 fw-bold"
          href="#"
          >Hylarana</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li> -->
                  <li><p class="dropdown-item">Selamat datang <?= $_SESSION['username'] . $_SESSION['id_admin']; ?></p></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                CORE
              </div>
            </li>
            <?php
              $url = substr($_SERVER['SCRIPT_NAME'],21, 4);
            ?>  
            <li>
              <!-- <a href="../user/user.php" class="nav-link px-3 <?php //if($url == "user"){ echo "active"; } ?>">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>User</span>
              </a> -->
              <!-- <a href="../admin/admin.php" class="nav-link px-3 <?php //if($url == "admi"){ echo "active"; } ?>">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Admin</span>
              </a> -->
              <!-- <a href="../pelanggan/pelanggan.php" class="nav-link px-3 <?php// if($url == "pela"){ echo "active"; } ?>">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Pelanggan</span>
              </a> -->
              <?php
                if($_SESSION['hak_akses'] == "pemilik")
                {
              ?>
                  <a href="../laporan/laporan.php" class="nav-link px-3 <?php if($url == "lapo"){ echo "active"; } ?>">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>Laporan</span>
                  </a>
                  <a href="../logout/logout.php" class="nav-link px-3 <?php //if($url == "pem"){ echo "active"; } ?>">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>LogOut</span>
                  </a>
              <?php
                }else{
              ?>
                  <a href="../kitchen/kitchen.php" class="nav-link px-3 <?php if($url == "kitc"){ echo "active"; } ?>">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>Kitchen Set</span>
                  </a>
                  <!-- <a href="../rekomendasi/rekomendasi.php" class="nav-link px-3 <?php //if($url == "reko"){ echo "active"; } ?>">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>Rekomendasi</span>
                  </a> -->
                  <a href="../pemesanan/pemesanan.php" class="nav-link px-3 <?php if($url == "peme"){ echo "active"; } ?>">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>Pemesanan</span>
                  </a>
                  <a href="../pembayaran/pembayaran.php" class="nav-link px-3 <?php if($url == "pemb"){ echo "active"; } ?>">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>Pembayaran</span>
                  </a>
                  <a href="../logout/logout.php" class="nav-link px-3 <?php //if($url == "pem"){ echo "active"; } ?>">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>LogOut</span>
                  </a>
              <?php 
                }
              ?>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->