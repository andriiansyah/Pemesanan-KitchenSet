<?php 
    include '../layout/header.php';
    include '../koneksi.php';

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

<main class="mt-3 pt-3">
    <div class="container-fluid">
        <h1 class="">Pembayaran</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Konfirmasi Pembayaran</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php 
                    
                ?>
                    <form method="POST" action="konfirmasi_proses.php">
                        <input type="hidden" class="form-control" name="id_pembayaran" value="<?= $id_pembayaran; ?>">
                        <div class="mb-3">
                            <label>Id Pemesanan</label>
                            <input type="text" class="form-control" name="id_pemesanan" value='<?= $id_pemesanan; ?>' disabled>
                            <input type="text" class="form-control" name="id_pemesanan" value='<?= $id_pemesanan; ?>' hidden>
                        </div>
                        <div class="mb-3">
                            <label>Nomor Rekening Tujuan</label>
                            <input type="text" class="form-control" name="no_rek_tujuan" value='<?= $no_rek_tujuan; ?>' disabled>
                            <input type="text" class="form-control" name="no_rek_tujuan" value='<?= $no_rek_tujuan; ?>' hidden>
                        </div>
                        <div class="mb-3">
                            <label>Atas Nama</label>
                            <input type="text" class="form-control" name="atas_nama" value='<?= $atas_nama; ?>' disabled>
                            <input type="text" class="form-control" name="atas_nama" value='<?= $atas_nama; ?>' hidden>
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" name="no_telp" value='<?= $no_telp; ?>' disabled>
                            <input type="text" class="form-control" name="no_telp" value='<?= $no_telp; ?>' hidden>
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value='<?= $alamat; ?>' disabled>
                            <input type="text" class="form-control" name="alamat" value='<?= $alamat; ?>' hidden>
                        </div>
                        <div class="mb-3">
                            <label>Nominal</label>
                            <input type="text" class="form-control" name="nominal" value='<?= $nominal; ?>' disabled>
                            <input type="text" class="form-control" name="nominal" value='<?= $nominal; ?>' hidden>
                        </div>
                        <div class="mb-3">
                            <label>Bukti Transfer</label>
                            <input type="text" class="form-control" name="bukti_tranfer" value='<?= $bukti_tranfer; ?>' disabled>
                            <input type="text" class="form-control" name="bukti_tranfer" value='<?= $bukti_tranfer; ?>' hidden>
                        </div>
                        <img src="../images/bukti/<?php echo $bukti_tranfer; ?>" style="width:100px;height:50px;">
                        <div class="mb-3">
                            <label>Konfirmasi</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="konfirmasi_pembayaran" id="konfirmasi_pembayaran1" value="Ya" <?php if($konfirmasi_pembayaran == 'Ya'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="konfirmasi_pembayaran1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="konfirmasi_pembayaran" id="konfirmasi_pembayaran2" value="Tidak" <?php if($konfirmasi_pembayaran == 'Tidak'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="konfirmasi_pembayaran2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status1" value="Pendding" <?php if($status == 'Pendding'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="status1">
                                    Pendding
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status2" value="Konfirmasi Pembayaran" <?php if($status == 'Konfirmasi Pembayaran'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="status2">
                                    Konfirmasi Pembayaran
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status3" value="Proses" <?php if($status == 'Proses'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="status3">
                                    Proses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status4" value="Kirim" <?php if($status == 'Kirim'){ echo 'checked'; } ?>>
                                <label class="form-check-label" for="status4">
                                    Kirim
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pembayaran</label>
                            <input type="text" class="form-control" name="tgl_pembayaran" value="<?= $tgl_pembayaran; ?>" disabled>
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