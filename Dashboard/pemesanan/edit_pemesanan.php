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
                        $status = $data['status'];
                        $tgl_pemesanan = $data['tgl_pemesanan'];
                    }
                ?>
                    <form method="POST" action="edit_pemesanan_proses.php">
                    <input type="text" class="form-control" name="id_pemesanan" value=<?= $id_pemesanan; ?> >
                        <div class="mb-3">
                            <label>Id Kitchen</label>
                            <select name="id_kitchen" class="form-control">
                                <?php 
                                    $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM kitchen_set");
                                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)) {
                                        $nama_kitchen = $fetcharray['nama_kitchen'];
                                        $id_kitchen2 = $fetcharray['id_kitchen'];
                                ?>
                                <option value="<?= $id_kitchen; ?>" <?php if($id_kitchen == $id_kitchen2){ echo "selected"; } ?>><?= $nama_kitchen . $id_kitchen2; ?></option>
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
                                        $id_pelanggan2 = $fetcharray['id_pelanggan'];
                                ?>
                                <option value="<?= $id_pelanggan; ?>" <?php if($id_pelanggan == $id_pelanggan2){ echo "selected"; } ?>><?= $nama_pelanggan . $id_pelanggan2; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rincian Pemesanan</label>
                            <textarea class="form-control" name="rincian_pemesanan" placeholder="Masukan rincian pemesanan" required><?= $rincian_pemesanan; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status1" value="Belum Lunas" <?php if($status == 'Belum Lunas'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="status1">
                                    Belum Lunas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status2" value="Lunas" <?php if($status == 'Lunas'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="status2">
                                    Lunas
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Pemesanan</label>
                            <input type="text" class="form-control" name="tgl_pemesanan" value="<?= $tgl_pemesanan; ?>" placeholder="Masukan password">
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