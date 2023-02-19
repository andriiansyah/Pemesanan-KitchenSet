<?php 
    include '../layout/header.php';
    include '../koneksi.php';
?>

<main class="mt-3 pt-3">
    <div class="container-fluid">
        <h1 class="">Pemesanan</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Edit Pemesanan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php 
                    $id_pemesanan = $_GET['id'];
                    
                    $result = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_pemesanan = $id_pemesanan");
                    while($data = mysqli_fetch_array($result))
                    {
                        $id_kitchen = $data['id_kitchen'];
                        $id_pelanggan = $data['id_pelanggan'];
                        $rincian_pemesanan = $data['rincian_pemesanan'];
                        $konfirmasi_pemesanan = $data['konfirmasi_pemesanan'];
                        $harga_pemesanan = $data['harga_pemesanan'];
                        $proses = $data['proses'];
                        $pengiriman = $data['pengiriman'];
                        $tgl_pemesanan = $data['tgl_pemesanan'];
                    }
                ?>
                    <form method="POST" action="konfirmasi_proses.php">
                        <input type="text" class="form-control" name="id_pemesanan" value="<?= $id_pemesanan; ?>" hidden>
                        <div class="mb-3">
                            <label>Id Kitchen</label>
                            <input type="text" class="form-control" name="id_kitchen" value='<?= $id_kitchen; ?>' disabled>
                        </div>
                        <div class="mb-3">
                            <?php 
                                $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE id_kitchen = $id_kitchen");
                                while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                    $nama_kitchen = $fetcharray['nama_kitchen'];
                                    $id_kitchen2 = $fetcharray['id_kitchen'];
                            ?>
                                <label>Nama Kitchen Set</label>
                                <input type="text" class="form-control" name="id_kitchen" value="<?= $nama_kitchen; ?>" disabled>

                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label>Id Pelanggan</label>
                            <input type="text" class="form-control" name="id_pelanggan" value='<?= $id_pelanggan; ?>' disabled>
                            <input type="text" class="form-control" name="id_pelanggan" value='<?= $id_pelanggan; ?>' hidden>
                        </div>
                        <div class="mb-3">
                            <?php 
                                $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan");
                                while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                    $nama_pelanggan = $fetcharray['nama_pelanggan'];
                            ?>
                                <label>Nama Pelanggan</label>
                                <input type="text" class="form-control" name="id_kitchen" value="<?= $nama_pelanggan; ?>" disabled>

                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rincian Pemesanan</label>
                            <textarea class="form-control" name="rincian_pemesanan" disabled required><?= $rincian_pemesanan; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Konfirmasi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="konfirmasi_pemesanan" id="konfirmasi_pemesanan1" value="Ya" <?php if($konfirmasi_pemesanan == 'Ya'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="konfirmasi_pemesanan1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="konfirmasi_pemesanan" id="konfirmasi_pemesanan2" value="Tidak" <?php if($konfirmasi_pemesanan == 'Tidak'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="konfirmasi_pemesanan2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Harga</label>
                            <input type="text" class="form-control" name="harga_pemesanan" value='<?= $harga_pemesanan; ?>'>
                        </div>
                        <div class="mb-3">
                            <label>Berapa Hari Selesai Kitchen Set ?</label>
                            <input type="number" class="form-control" name="proses" value='<?= $proses; ?>'>
                        </div>
                        <div class="mb-3">
                            <label>Berapa Hari Proses Pengiriman ?</label>
                            <input type="number" class="form-control" name="pengiriman" value='<?= $pengiriman; ?>'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pemesanan</label>
                            <input type="text" class="form-control" name="tgl_pemesanan" value="<?= $tgl_pemesanan; ?>" disabled>
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