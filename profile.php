<?php 
    include 'layout/header.php';

    $id_user = $_GET['id'];
?>

    <div class="container">
        <h1 class="mt-4">Profile Data Diri</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Lengkapi Form Berikut</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="profile_proses.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Id User</label>
                            <input type="text" class="form-control" name="id_user" value="<?= $id_user; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukan nama anda" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telpon</label>
                            <input type="text" class="form-control" name="no_telp_pelanggan" placeholder="Masukan nomor telpon anda" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat_pelanggan" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="addnewuser">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>