<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <h1 class="mt-4">Admin</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Tambah Data Admin</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="tambah_admin_proses.php">
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
                            <label class="form-label">Nama Admin</label>
                            <input type="text" class="form-control" name="nama_admin" placeholder="Masukan nama admin" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telpon Admin</label>
                            <input type="text" class="form-control" name="no_telp_admin" placeholder="Masukan nomor telpon admin" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Admin</label>
                            <textarea class="form-control" name="alamat_admin" placeholder="Masukan alamat" required></textarea>
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