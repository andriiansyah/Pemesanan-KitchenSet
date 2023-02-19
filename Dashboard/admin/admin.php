<?php 
    include '../layout/header.php';
?>
<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>Admin</h1>
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
                <a class="btn btn-primary" href="tambah_admin.php" role="button">Tambah Admin</a>
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
                    <th class="text-center">Id Admin</th>
                    <th class="text-center">Id User</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">No Telp</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $ambil_semua_data_admin = mysqli_query($conn, "SELECT * FROM admin");
                    $i = 1;
                    while($data = mysqli_fetch_array($ambil_semua_data_admin))
                    {
                        $id_admin = $data['id_admin'];
                        $id_user = $data['id_user'];
                        $nama_admin = $data['nama_admin'];
                        $no_telp_admin = $data['no_telp_admin'];
                        $alamat_admin = $data['alamat_admin'];
                  ?>
                  <tr>
                    <td class="align-middle"><?= $i++; ?></td>
                    <td class="align-middle"><?= $id_admin; ?></td>
                    <td class="align-middle"><?= $id_user; ?></td>
                    <td class="align-middle"><?= $nama_admin; ?></td>
                    <td class="align-middle"><?= $no_telp_admin; ?></td>
                    <td class="align-middle"><?= $alamat_admin; ?></td>
                    <td class="align-middle text-center">
                      <a class="btn btn-warning" href="edit_admin.php?id=<?= $id_admin; ?>" role="button">Update</a>
                      <a class="btn btn-danger" href="hapus_admin.php?id=<?= $id_admin; ?>" role="button">Delete</a>
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