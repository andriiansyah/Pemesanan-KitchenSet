<?php 
    include '../layout/header.php';
    include '../koneksi.php';
?>

<main class="mt-3 pt-3">
    <div class="container-fluid">
        <h1 class="">Pelanggan</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Edit Pelanggan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php 
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
                    <form method="POST" action="edit_pelanggan_proses.php">
                    <input type="text" class="form-control" name="id_pelanggan" value=<?= $id_pelanggan; ?> >
                        <div class="mb-3">
                            <label>Id User</label>
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
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pelanggan" value="<?= $nama_pelanggan; ?>" placeholder="Masukan nama pelanggan">
                        </div>
                        <div class="mb-3">
                            <label>No Telpon Pelanggan</label>
                            <input type="text" class="form-control" name="no_telp_pelanggan" value="<?= $no_telp_pelanggan; ?>" placeholder="Masukan nomor telepon pelanggan">
                        </div>
                        <div class="mb-3">
                            <label>Alamat Pelanggan</label>
                            <input type="text" class="form-control" name="alamat_pelanggan" value="<?= $alamat_pelanggan; ?>" placeholder="Masukan alamat pelanggan">
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