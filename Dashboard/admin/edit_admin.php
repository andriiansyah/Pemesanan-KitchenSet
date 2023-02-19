<?php 
    include '../layout/header.php';
    include '../koneksi.php';
?>

<main class="mt-3 pt-3">
    <div class="container-fluid">
        <h1 class="">Admin</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Edit Admin</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php 
                    $id_admin = $_GET['id'];
                    
                    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $id_admin");
                    while($data = mysqli_fetch_array($result))
                    {
                        $id_user = $data['id_user'];
                        $nama_admin = $data['nama_admin'];
                        $no_telp_admin = $data['no_telp_admin'];
                        $alamat_admin = $data['alamat_admin'];
                    }
                ?>
                    <form method="POST" action="edit_admin_proses.php">
                    <input type="text" class="form-control" name="id_admin" value=<?= $id_admin; ?> >
                        <div class="mb-3">
                            <label for="namabarang">Id User</label>
                            <select name="id_user" class="form-control">
                                <?php 
                                    $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM user");
                                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                        $username = $fetcharray['username'];
                                        $id_user2 = $fetcharray['id_user'];
                                ?>

                                <option value="<?= $id_user2; ?>" <?php if($id_user == $id_user2){ echo "selected"; } ?>><?= $id_user2 . " " . $username; ?></option>

                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Nama Admin</label>
                            <input type="text" class="form-control" name="nama_admin" value="<?= $nama_admin; ?>" placeholder="Masukan password">
                        </div>
                        <div class="mb-3">
                            <label>No Telpon Admin</label>
                            <input type="text" class="form-control" name="no_telp_admin" value="<?= $no_telp_admin; ?>" placeholder="Masukan password">
                        </div>
                        <div class="mb-3">
                            <label>Alamat Admin</label>
                            <input type="text" class="form-control" name="alamat_admin" value="<?= $alamat_admin; ?>" placeholder="Masukan password">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    include '../layout/footer.php';
?>