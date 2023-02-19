<?php 
    require_once("dashboard/koneksi.php");

    error_reporting(0);
    
    if($_SESSION['hak_akses'] == "admin" || $_SESSION['hak_akses'] == "desainer"){
        header("Location: dashboard/user/user.php");
    }else if($_SESSION['hak_akses'] == "pelanggan") {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dashboard/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="dashboard/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="dashboard/css/style.css" />
    <title>Register</title>
  </head>
  <body style="background-image: url('images/bglogin2.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-4 m-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                    <h2 class="text-center">Register</h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukan username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukan password" required>
                        </div>
                        <input type="text" class="form-control" name="hak_akses" value="pelanggan" required hidden>
                        <div class="d-grid text-center mt-3">
                            <button class="btn btn-primary" name="submit">Buat</button>
                            <label class="mt-2">Sudah jadi akun? <a href="dashboard/index.php">Login</a></label>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>

<?php
//proses
    if(isset($_POST['submit'])) {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $hak_akses=$_POST['hak_akses'];
    
    //script validasi data

        $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE username='$username'"));
        if ($cek > 0){
            echo "<script>window.alert('Username yang anda masukan sudah ada')
            window.location='register.php'</script>";
        }else {
            mysqli_query($conn,"INSERT INTO user(username, password, hak_akses)
            VALUES ('$username','$password', '$hak_akses')");

            echo "<script>window.alert('DATA SUDAH DISIMPAN')
            window.location='register.php'</script>";
        }
    }
?>