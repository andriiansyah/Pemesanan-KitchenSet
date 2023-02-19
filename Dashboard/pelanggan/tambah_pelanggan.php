<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <h1 class="mt-4">Pelanggan</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Tambah Data Pelanggan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="tambah_pelanggan_proses.php">
                        <div class="mb-3">
                            <label class="form-label">Id User</label>
                            <select name="id_user" class="form-control">
                                <?php 
                                    $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM user");
                                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                        $username = $fetcharray['username'];
                                        $id_user = $fetcharray['id_user'];
                                ?>
                                <option value="<?= $id_user; ?>"><?= $username . $id_user; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukan nama pelanggan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telpon Pelanggan</label>
                            <input type="text" class="form-control" name="no_telp_pelanggan" placeholder="Masukan nomor telpon pelanggan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Pelanggan</label>
                            <textarea class="form-control" name="alamat_pelanggan" placeholder="Masukan alamat" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="addnewuser">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    include '../layout/footer.php';
?>