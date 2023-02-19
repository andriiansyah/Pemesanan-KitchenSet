<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>Pemesanan</h1>
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
                <!-- <a class="btn btn-primary" href="tambah_pemesanan.php" role="button">Tambah Pemesanan</a> -->
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
                    <th class="text-center">Id Pemesanan</th>
                    <th class="text-center">Nama Kitchen</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">Rincian Pemesanan</th>
                    <th class="text-center">Konfirmasi</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $ambil_semua_data_pemesanan = mysqli_query($conn, "SELECT 
                    pemesanan.id_pemesanan, kitchen_set.nama_kitchen, pelanggan.nama_pelanggan, pemesanan.rincian_pemesanan, pemesanan.konfirmasi_pemesanan, pemesanan.harga_pemesanan, pemesanan.tgl_pemesanan 
                    FROM pemesanan 
                    JOIN kitchen_set ON (kitchen_set.id_kitchen = pemesanan.id_kitchen) 
                    JOIN pelanggan ON (pelanggan.id_pelanggan = pemesanan.id_pelanggan) 
                    ORDER BY id_pemesanan DESC");
                    $i = 1;
                    while($data = mysqli_fetch_array($ambil_semua_data_pemesanan))
                    {
                        $id_pemesanan = $data['id_pemesanan'];
                        $nama_kitchen = $data['nama_kitchen'];
                        $nama_pelanggan = $data['nama_pelanggan'];
                        $rincian_pemesanan = $data['rincian_pemesanan'];
                        $konfirmasi_pemesanan = $data['konfirmasi_pemesanan'];
                        $harga_pemesanan = $data['harga_pemesanan'];
                        $tgl_pemesanan = $data['tgl_pemesanan'];
                  ?>
                  <tr>
                    <td class="align-middle"><?= $i++; ?></td>
                    <td class="align-middle"><?= $id_pemesanan; ?></td>
                    <td class="align-middle"><?= $nama_kitchen; ?></td>
                    <td class="align-middle"><?= $nama_pelanggan; ?></td>
                    <td class="align-middle"><?= $rincian_pemesanan; ?></td>
                    <td class="align-middle"><?= $konfirmasi_pemesanan; ?></td>
                    <td class="align-middle"><?= "Rp. " . $harga_pemesanan; ?></td>
                    <td class="align-middle"><?= $tgl_pemesanan; ?></td>
                    <td class="align-middle text-center">
                      <a class="btn btn-warning mb-1" href="konfirmasi.php?id=<?= $id_pemesanan; ?>" role="button">Konfirmasi</a>
                      <!-- <a class="btn btn-warning" href="edit_pemesanan.php?id=<?php //echo $id_pemesanan; ?>" role="button">Update</a> -->
                      <!-- <a class="btn btn-danger" href="hapus_pemesanan.php?id=<?php //echo $id_pemesanan; ?>" role="button">Delete</a> -->
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