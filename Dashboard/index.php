<?php 
    require_once("koneksi.php");

    error_reporting(0);
    
    if($_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "desainer"){
        header("Location: kitchen/kitchen.php");
    }else if($_SESSION['hak_akses'] == "pelanggan") {
        header("Location: ../index.php");
    }
    
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            
            $row = mysqli_fetch_assoc($result);

            $id = $row['id_user'];
            // mencari id admin
            $data_admin = "SELECT * FROM admin WHERE id_user='$id'";
            $result_admin = mysqli_query($conn, $data_admin);
            $row_admin = mysqli_fetch_assoc($result_admin);

            // mencari id pelanggan
            $data_pelanggan = "SELECT * FROM pelanggan WHERE id_user='$id'";
            $result_pelanggan = mysqli_query($conn, $data_pelanggan);
            $row_pelanggan = mysqli_fetch_assoc($result_pelanggan);

            if($row["hak_akses"] == "admin") {
                $_SESSION['username'] = $row['username'];
                $_SESSION['hak_akses'] = "admin";
                $_SESSION['id_admin'] = $row_admin['id_admin'];
                header("Location: kitchen/kitchen.php");
            }else if($row["hak_akses"] == "pemilik") {
                $_SESSION['username'] = $row['username'];
                $_SESSION['hak_akses'] = "pemilik";
                header("Location: laporan/laporan.php");
            }else if($row["hak_akses"] == "pelanggan") {
                $_SESSION['username'] = $row['username'];
                $_SESSION['hak_akses'] = "pelanggan";
                $_SESSION['id_pelanggan'] = $row_pelanggan['id_pelanggan'];
                header("Location: ../index.php");
            }
        }else {
            echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Frontendfunn - Bootstrap 5 Admin Dashboard Template</title>
  </head>
  <body style="background-image: url('images/bglogin2.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-4 m-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                    <h2 class="text-center">Login</h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukan username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukan password" required>
                        </div>
                        <div class="d-grid text-center mt-3">
                            <button class="btn btn-primary" name="submit">Login</button>
                        <a href="../register.php" class="nav-link">Belum punya akun ?</a>
                        <a href="../index.php" class="nav-link">Kembali ke halaman home</a>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
  </body>