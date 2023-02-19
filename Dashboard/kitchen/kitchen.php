<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>Kitchen Set</h1>
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
                <a class="btn btn-primary" href="tambah_kitchen.php" role="button">Tambah Kitchen Set</a>
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
                    <th class="text-center">Id Kitchen Set</th>
                    <th class="text-center">Nama Kitchen Set</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $ambil_semua_data_kitchen = mysqli_query($conn, "SELECT * FROM kitchen_set");
                    $i = 1;
                    while($data = mysqli_fetch_array($ambil_semua_data_kitchen))
                    {
                        $id_kitchen = $data['id_kitchen'];
                        $nama_kitchen = $data['nama_kitchen'];
                        $kategori_kitchen = $data['kategori_kitchen'];
                        $foto_kitchen = $data['foto_kitchen'];
                  ?>
                  <tr>
                    <td class="align-middle"><?= $i++; ?></td>
                    <td class="align-middle"><?= $id_kitchen; ?></td>
                    <td class="align-middle"><?= $nama_kitchen; ?></td>
                    <td class="align-middle"><?= $kategori_kitchen; ?></td>
                    <td class="align-middle text-center">
                        <?php 
                        if ($data['foto_kitchen'] == "") { ?>
                            <img class="rounded" src="../images/default.jpg" style="width:100px;height:50px;">
                        <?php }else{ ?>
                            <img class="rounded" src="../images/kitchen/<?php echo $data['foto_kitchen']; ?>" style="width:100px;height:50px;">
                        <?php } ?>
                    </td>
                    <td class="align-middle text-center">
                      <a class="btn btn-warning" href="edit_kitchen.php?id=<?= $id_kitchen; ?>" role="button">Update</a>
                      <a class="btn btn-danger" href="hapus_kitchen.php?id=<?= $id_kitchen; ?>" role="button">Delete</a>
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