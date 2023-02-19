<?php 
    include 'layout/header.php';

    $id_pemesanan = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_pemesanan = $id_pemesanan");
    while($data = mysqli_fetch_array($result))
    {
        $id_kitchen = $data['id_kitchen'];
        $id_pelanggan = $data['id_pelanggan'];
        $bahan = $data['bahan'];
        $warna = $data['warna'];
        $ukuran_kitchen_set = $data['ukuran_kitchen_set'];
        $survey = $data['survey'];
        $rincian_pemesanan = $data['rincian_pemesanan'];
        $konfirmasi_pemesanan = $data['konfirmasi_pemesanan'];
        $harga_pemesanan = $data['harga_pemesanan'];
        $tgl_pemesanan = $data['tgl_pemesanan'];
    }

    $result_kitchen = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE id_kitchen = $id_kitchen");
    while($data_kitchen = mysqli_fetch_array($result_kitchen))
    {
        $nama_kitchen = $data_kitchen['nama_kitchen'];
        $kategori_kitchen = $data_kitchen['kategori_kitchen'];
        $foto_kitchen = $data_kitchen['foto_kitchen'];
    }

    $result_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan");
    while($data_pelanggan = mysqli_fetch_array($result_pelanggan))
    {
        $id_user = $data_pelanggan['id_user'];
        $nama_pelanggan = $data_pelanggan['nama_pelanggan'];
        $no_telp_pelanggan = $data_pelanggan['no_telp_pelanggan'];
        $alamat_pelanggan = $data_pelanggan['alamat_pelanggan'];
    }
?>

<div class="container">
    <h1 class="mt-3">Checkout</h1>
    <div class="row">
        <div class="col" style="background: #F8F9FA; border: solid; border-color: #F1F1F1">
            <h4 class="">Detal Pesanan</h4>
            <div class="row mt-3">
                <div class="col">
                    <h5>Produk</h5>
                    <label><?= $nama_kitchen ?></label>
                </div>
                <div class="col">
                    <h5>Total</h5>
                    <label>Rp. <?= $harga_pemesanan ?></label>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Alamat Penerima</h4>
            <form method="POST" action="bayar_proses.php">
            <input type="text" class="form-control" name="id_pemesanan" value="<?= $id_pemesanan ?>" placeholder="Masukan nomor telpon penerima" required>
                <div class="mb-3">
                    <label class="form-label">Nama Penerima</label>
                    <input type="text" class="form-control" name="atas_nama" value="<?= $nama_pelanggan ?>" placeholder="Masukan nama penerima" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No Telpon Penerima</label>
                    <input type="text" class="form-control" name="no_telp" value="<?= $no_telp_pelanggan ?>" placeholder="Masukan nomor telpon penerima" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Masukan alamat penerima" required><?= $alamat_pelanggan ?></textarea>
                </div>
                <input type="text" class="form-control" name="nominal" value="<?= $harga_pemesanan ?>" placeholder="Masukan nomor telpon penerima" required>
                <button type="submit" class="btn btn-primary" name="addnewuser">Submit</button>
            </form>
        </div>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>