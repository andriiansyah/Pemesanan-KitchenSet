<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>Pembayaran</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-auto me-auto">
                <span><i class="bi bi-table me-2"></i></span>Data Table 
              </div>
              <div class="col-auto">
                <!-- <a class="btn btn-primary" href="tambah_pembayaran.php" role="button">Tambah Pembayaran</a> -->
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                id="example"
                class="table table-striped data-table table-bordered"
                style="width: 100%"
              >
                <thead class="table-dark">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Id Pembayaran</th>
                    <th class="text-center">Nama Kitchen Set</th>
                    <th class="text-center">No Rek Tujuan</th>
                    <th class="text-center">Transfer Atas Nama</th>
                    <th class="text-center">Atas Nama</th>
                    <th class="text-center">Nominal</th>
                    <th class="text-center">Bukti</th>
                    <th class="text-center">Konfirmasi</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $ambil_semua_data_pembayaran = mysqli_query($conn, "SELECT 
                    pembayaran.id_pembayaran, pembayaran.id_pemesanan, kitchen_set.nama_kitchen, pembayaran.no_rek_tujuan, pembayaran.transfer_atas_nama, pembayaran.atas_nama, pembayaran.nominal, pembayaran.bukti_tranfer, pembayaran.konfirmasi_pembayaran, pembayaran.tgl_pembayaran
                    FROM pembayaran 
                    JOIN pemesanan ON (pemesanan.id_pemesanan = pembayaran.id_pemesanan)
                    JOIN kitchen_set ON (kitchen_set.id_kitchen = pemesanan.id_kitchen)
                    ORDER BY id_pembayaran DESC");
                    $i = 1;
                    while($data = mysqli_fetch_array($ambil_semua_data_pembayaran))
                    {
                        $id_pembayaran = $data['id_pembayaran'];
                        $nama_kitchen = $data['nama_kitchen'];
                        $no_rek_tujuan = $data['no_rek_tujuan'];
                        $transfer_atas_nama = $data['transfer_atas_nama'];
                        $atas_nama = $data['atas_nama'];
                        $nominal = $data['nominal'];
                        $bukti_tranfer = $data['bukti_tranfer'];
                        $konfirmasi_pembayaran = $data['konfirmasi_pembayaran'];
                        $tgl_pembayaran = $data['tgl_pembayaran'];
                  ?>
                  <tr>
                    <td class="align-middle"><?= $i++; ?></td>
                    <td class="align-middle"><?= $id_pembayaran; ?></td>
                    <td class="align-middle"><?= $nama_kitchen; ?></td>
                    <td class="align-middle"><?= $no_rek_tujuan; ?></td>
                    <td class="align-middle"><?= $transfer_atas_nama; ?></td>
                    <td class="align-middle"><?= $atas_nama; ?></td>
                    <td class="align-middle"><?= "Rp. " . $nominal; ?></td>
                    <td class="align-middle text-center">
                        <?php 
                            if ($data['bukti_tranfer'] == "") { ?>
                                <!-- <img src="../images/default.jpg" style="width:100px;height:50px;"> -->
                                <label for="">Pelanggan belum menambahkan bukti transfer</label>
                            <?php }else{ ?>
                                <img class="rounded" src="../images/bukti/<?php echo $data['bukti_tranfer']; ?>" style="width:100px;height:50px;">
                        <?php } ?>
                    </td>
                    <td class="align-middle"><?= $konfirmasi_pembayaran; ?></td>
                    <td class="align-middle"><?= $tgl_pembayaran; ?></td>
                    <td class="align-middle text-center">
                      <a class="btn btn-warning mb-1" href="konfirmasi.php?id=<?= $id_pembayaran; ?>" role="button">Konfirmasi</a>
                      <!-- <a class="btn btn-warning" href="edit_pemesanan.php?id=<?php //echo $id_pembayaran; ?>" role="button">Update</a> -->
                      <!-- <a class="btn btn-danger" href="hapus_pemesanan.php?id=<?php //echo $id_pembayaran; ?>" role="button">Delete</a> -->
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php 
    include '../layout/footer.php';
?>