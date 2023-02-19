<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>User</h1>
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
                <a class="btn btn-primary" href="tambah_user.php" role="button">Tambah User</a>
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
                    <th class="text-center">Id User</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Hak Akses</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $ambil_semua_data_user = mysqli_query($conn, "SELECT * FROM user");
                    $i = 1;
                    while($data = mysqli_fetch_array($ambil_semua_data_user))
                    {
                        $id_user = $data['id_user'];
                        $username = $data['username'];
                        $password = $data['password'];
                        $hak_akses = $data['hak_akses'];
                  ?>
                  <tr>
                    <td class="align-middle"><?= $i++; ?></td>
                    <td class="align-middle"><?= $id_user; ?></td>
                    <td class="align-middle"><?= $username; ?></td>
                    <td class="align-middle"><?= $password; ?></td>
                    <td class="align-middle"><?= $hak_akses; ?></td>
                    <td class="align-middle text-center">
                      <a class="btn btn-warning" href="edit_user.php?id=<?= $id_user; ?>" role="button">Update</a>
                      <a class="btn btn-danger" href="hapus_user.php?id=<?= $id_user; ?>" role="button">Delete</a>
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