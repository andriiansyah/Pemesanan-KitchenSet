<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <h1 class="mt-4">Pemesanan</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Tambah Data Pemesanan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="tambah_pemesanan_proses.php">
                        <div class="mb-3">
                            <label class="form-label">Id Kitchen</label>
                            <select name="id_kitchen" class="form-control">
                                <?php 
                                    $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM kitchen_set");
                                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                        $nama_kitchen = $fetcharray['nama_kitchen'];
                                        $id_kitchen = $fetcharray['id_kitchen'];
                                ?>
                                <option value="<?= $id_kitchen; ?>"><?= $nama_kitchen . $id_kitchen; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Id Pelanggan</label>
                            <select name="id_pelanggan" class="form-control">
                                <?php 
                                    $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM pelanggan");
                                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                        $nama_pelanggan = $fetcharray['nama_pelanggan'];
                                        $id_pelanggan = $fetcharray['id_pelanggan'];
                                ?>
                                <option value="<?= $id_pelanggan; ?>"><?= $nama_pelanggan . $id_pelanggan; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rincian Pemesanan</label>
                            <textarea class="form-control" name="rincian_pemesanan" placeholder="Masukan rincian pemesanan" required></textarea>
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Konfirmasi Pemesanan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="konfirmasi_pemesanan" id="status1" value="Ya">
                                    <label class="form-check-label" for="status1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="konfirmasi_pemesanan" id="status2" value="Tidak" checked>
                                    <label class="form-check-label" for="status2">
                                        Tidak
                                    </label>
                                </div>
                        </div> -->
                        <div class="mb-3">
                            <label class="form-label">Harga Pemesanan</label>
                            <input type="text" class="form-control" name="harga_pemesanan" placeholder="Masukan harga pemesanan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pemesanan</label>
                            <input type="text" class="form-control" name="tgl_pemesanan" placeholder="Masukan status" value="<?= date('Y-m-d') ?>" required>
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