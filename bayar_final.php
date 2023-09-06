<?php 
    include 'layout/header.php';

    $id_pemesanan = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pemesanan = $id_pemesanan");
    while($data = mysqli_fetch_array($result))
    {
        $id_pembayaran = $data['id_pembayaran'];
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
        $tgl_selesai = $data['tgl_selesai'];
        $tgl_sampai = $data['tgl_sampai'];
    }

    $result_pemesanan = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_pemesanan = $id_pemesanan");
    while($data_pemesanan = mysqli_fetch_array($result_pemesanan))
    {
        $id_kitchen = $data_pemesanan['id_kitchen'];
        $id_pelanggan = $data_pemesanan['id_pelanggan'];
        $bahan = $data_pemesanan['bahan'];
        $warna = $data_pemesanan['warna'];
        $ukuran_kitchen_set = $data_pemesanan['ukuran_kitchen_set'];
        $survey = $data_pemesanan['survey'];
        $rincian_pemesanan = $data_pemesanan['rincian_pemesanan'];
        $konfirmasi_pemesanan = $data_pemesanan['konfirmasi_pemesanan'];
        $harga_pemesanan = $data_pemesanan['harga_pemesanan'];
        $proses = $data_pemesanan['proses'];
        $pengiriman = $data_pemesanan['pengiriman'];
        $tgl_pemesanan = $data_pemesanan['tgl_pemesanan'];
    }

    $result_kitchen = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE id_kitchen = $id_kitchen");
    while($data_kitchen = mysqli_fetch_array($result_kitchen))
    {
        $nama_kitchen = $data_kitchen['nama_kitchen'];
        $kategori_kitchen = $data_kitchen['kategori_kitchen'];
        $foto_kitchen = $data_kitchen['foto_kitchen'];
    }
?>

<div class="container mt-80px">
    <div class="row mt-3">
        <div class="col">
            <h5>Kode Transaksi</h5>
            <label class="mb-2"><?= $id_pembayaran ?></label>
            
            <!-- <label class="mb-2"><?php //echo date("d M Y"); ?></label> -->
            <?php
              // Jika status proses maka ambil data tanggal selesai di dalam database jika tidak hitung dari coding
              if($status == "Proses" || $status == "Kirim" || $status == "Sampai")
              {
            ?>
                <h5>Tanggal Selesai</h5>
                <label class="mb-2"><?php echo $tgl_selesai; ?></label>
                <h5>Tanggal Sampai</h5>
                <label class="mb-2"><?php echo $tgl_sampai; ?></label>
                <h5>Tanggal Pembayaran</h5>
                <label class="mb-2"><?php echo $tgl_pembayaran; ?></label>
              <?php
              }else if($status == "Konfirmasi Pembayaran") {
                // Tanggal sekarang
                $tgl_sekarang = date("Y/m/d");

                // Tanggal selesai kitchen set, status pembayaran belum di acc
                $tgl_selesai_hitung = date('Y-m-d', strtotime('+' . $proses . ' days', strtotime($tgl_sekarang)));

                // Tanggal sampai kitchen set ke pelanggan
                $hitung_tgl_sampai = $proses + $pengiriman;
                $tgl_sampai_hitung = date('Y-m-d', strtotime('+' . $hitung_tgl_sampai . ' days', strtotime($tgl_sekarang)));
              ?>
                <h5>Tanggal Selesai</h5>
                <label class="mb-2"><?php echo $tgl_selesai_hitung; ?></label>
                <h5>Tanggal Sampai</h5>
                <label class="mb-2"><?php echo $tgl_sampai_hitung; ?></label>
            <?php
              }else {
                // Tanggal sekarang
                $tgl_sekarang = date("Y/m/d");

                // Tanggal selesai kitchen set, status pembayaran belum di acc
                $tgl_selesai_hitung = date('Y-m-d', strtotime('+' . $proses . ' days', strtotime($tgl_sekarang)));

                // Tanggal sampai kitchen set ke pelanggan
                $hitung_tgl_sampai = $proses + $pengiriman;
                $tgl_sampai_hitung = date('Y-m-d', strtotime('+' . $hitung_tgl_sampai . ' days', strtotime($tgl_sekarang)));
            ?>
            
                <h5>Tanggal Selesai</h5>
                <label class="mb-2"><?php echo $tgl_selesai_hitung; ?></label>
                <h5>Tanggal Sampai</h5>
                <label class="mb-2"><?php echo $tgl_sampai_hitung; ?></label>
            <?php
              }
            ?>
            <h5>Status</h5>
            <label class="mb-2"><?= $status ?></label>
        </div>
        <div class="col">
            <h5>Perusahaan</h5>
            <label>PT. Hylarana Kreasi Inspira</label> <br>
            <h5>Nomor Telepon</h5>
            <label>081283812381283</label> <br>
            <h5>Alamat</h5>
            <label>Jl. Kyai H. Syahdan No.21, RW.11, Palmerah, Kec. Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11480</label>
        </div>
        <div class="col">
            <h5>Penerima</h5>
            <label><?= $atas_nama; ?></label> <br>
            <h5>Nomor Telpon</h5>
            <label><?= $no_telp; ?></label> <br>
            <h5>Alamat</h5>
            <label><?= $alamat; ?></label>
        </div>
    </div>
    <div class="row mt-3">
        <div class="table-responsive">
        <table
                id="example"
                class="table table-striped data-table table-bordered"
                style="width: 100%"
              >
                <thead class="table-dark">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kitchen Set</th>
                    <th class="text-center">Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center"><?= $nama_kitchen;?> <!--<img src="dashboard/images/kitchen/<?php //echo $foto_kitchen ?>"  style="width:100px;height:50px;">--></td>
                    <td class="align-middle text-center">Rp. <?= $nominal; ?></td>
                  </tr>
                </tfoot>
              </table>
        </div>
    </div>
    <?php
    if($status == "sampai") {
    ?>
      
    <?php
    }else if($status == "Kirim") {
    ?>
      <a class="btn btn-warning" href="konfirmasi_sampai.php?id=<?=$id_pembayaran;?>" role="button">Konfirmasi Sampai</a>
    <?php
    }else if($status == "Proses") {

    }else if($status == "Konfirmasi Pembayaran") {
    ?>
      <a class="btn btn-warning" href="bayar_konfirmasi.php?id=<?= $id_pembayaran; ?>" role="button">Konfirmasi Pembayaran</a>
    <?php
    }else if($status == "Pendding"){
    ?>
      <a class="btn btn-warning" href="bayar_konfirmasi.php?id=<?= $id_pembayaran; ?>" role="button">Konfirmasi Pembayaran</a>
    <?php
    }
    ?>
    
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>