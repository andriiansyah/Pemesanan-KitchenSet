<?php 
    include 'layout/header.php';

    $id_pembayaran = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran = $id_pembayaran");
    while($data = mysqli_fetch_array($result))
    {
        $id_pemesanan = $data['id_pemesanan'];
        $no_rek_tujuan = $data['no_rek_tujuan'];
        $transfer_atas_nama = $data['transfer_atas_nama'];
        $atas_nama = $data['atas_nama'];
        $no_telp = $data['no_telp'];
        $alamat = $data['alamat'];
        $nominal = $data['nominal'];
        $bukti_tranfer = $data['bukti_tranfer'];
        $konfirmasi_pembayaran = $data['konfirmasi_pembayaran'];
        $status = $data['status'];
        $tgl_pembayaran = $data['tgl_pembayaran'];
    }
?>
<div class="container mt-80px">
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="bayar_konfirmasi_proses.php" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id_pembayaran" value="<?= $id_pembayaran; ?>" placeholder="Masukan nama kitchen set" required>
                <div class="mb-3">
                    <label class="form-label">Nominal</label>
                    <input type="hidden" class="form-control" name="nominal" value="<?= $nominal; ?>" placeholder="Masukan nama kitchen set" required>
                    <input type="text" class="form-control" name="nominal" value="<?= $nominal; ?>" placeholder="Masukan nama kitchen set" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rekening Tujuan</label>
                    <input type="hidden" class="form-control" name="no_rek_tujuan" value="<?= $no_rek_tujuan; ?>" placeholder="Masukan kategori" required>
                    <input type="text" class="form-control" name="no_rek_tujuan" value="<?= $no_rek_tujuan; ?>" placeholder="Masukan kategori" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rekening Atas Nama Anda</label>
                    <input type="text" class="form-control" name="transfer_atas_nama" placeholder="Masukan rekening atas nama" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bukti Transfer</label>
                    <input type="file" class="form-control" name="bukti_tranfer">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="hidden" class="form-control" name="tgl_pembayaran" value="<?= date("Y-m-d") ?>">
                    <input type="text" class="form-control" name="tgl_pembayaran" value="<?= date("Y-m-d") ?>" disabled>
                </div>
                <button type="submit" class="btn btn-primary" name="addnewuser">Submit</button>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>