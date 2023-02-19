<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>Pelanggan</h1>
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
                <a class="btn btn-primary" href="tambah_pelanggan.php" role="button">Tambah Pelanggan</a>
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
                    <th class="text-center">Id Pelanggan</th>
                    <th class="text-center">Id User</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">No Telp</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $ambil_semua_data_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                    $i = 1;
                    while($data = mysqli_fetch_array($ambil_semua_data_pelanggan))
                    {
                        $id_pelanggan = $data['id_pelanggan'];
                        $id_user = $data['id_user'];
                        $nama_pelanggan = $data['nama_pelanggan'];
                        $no_telp_pelanggan = $data['no_telp_pelanggan'];
                        $alamat_pelanggan = $data['alamat_pelanggan'];
                  ?>
                  <tr>
                    <td class="align-middle"><?= $i++; ?></td>
                    <td class="align-middle"><?= $id_pelanggan; ?></td>
                    <td class="align-middle"><?= $id_user; ?></td>
                    <td class="align-middle"><?= $nama_pelanggan; ?></td>
                    <td class="align-middle"><?= $no_telp_pelanggan; ?></td>
                    <td class="align-middle"><?= $alamat_pelanggan; ?></td>
                    <td class="align-middle text-center">
                      <a class="btn btn-warning" href="edit_pelanggan.php?id=<?= $id_pelanggan; ?>" role="button">Update</a>
                      <a class="btn btn-danger" href="hapus_pelanggan.php?id=<?= $id_pelanggan; ?>" role="button">Delete</a>
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