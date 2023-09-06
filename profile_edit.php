<?php 
    include 'layout/header.php';

    $id_pelanggan = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan");
    while($data = mysqli_fetch_array($result))
    {
        $id_user = $data['id_user'];
        $nama_pelanggan = $data['nama_pelanggan'];
        $no_telp_pelanggan = $data['no_telp_pelanggan'];
        $alamat_pelanggan = $data['alamat_pelanggan'];
    }
?>

    <div class="container mt-80px">
        <h1 class="mt-4">Profile Data Diri</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Lengkapi Form Berikut</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="edit_profile_proses.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Id Pelanggan</label>
                            <input type="text" class="form-control" name="id_pelanggan" value="<?= $id_pelanggan; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pelanggan" value="<?= $nama_pelanggan; ?>" placeholder="Masukan nama anda" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telpon</label>
                            <input type="text" class="form-control" name="no_telp_pelanggan" value="<?= $no_telp_pelanggan; ?>" placeholder="Masukan nomor telpon anda" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat_pelanggan" required><?= $alamat_pelanggan; ?></textarea>
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