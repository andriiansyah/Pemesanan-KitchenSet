<?php 
    include 'layout/header.php';
?>

    <!-- Jumbotron -->
    <div class="container-fluid banner">
        <div class="container text-center">
            <h4 class="display-6 biru">Selamat Datang di Website Kami</h4>
            <h3 class="display-1 biru">Hai! Halo! <?php  //echo $_SESSION['username'] ." ". $_SESSION['id_pelanggan']; ?></h3>
            <a href="#">
                <button type="button" class="btn btn-danger btn-lg">Cek Layanan</button>
            </a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>