<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>Laporan</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mb-3">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-auto me-auto">
                <span><i class="bi bi-table me-2"></i></span>Tampilkan Data Berdasarkan Tanggal Awal Sampai Tanggal Akhir
              </div>
              <div class="row-auto">
                <form method="GET" action="">
                  <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" name="tgl_awal" placeholder="Tanggal Awal">
                      <span class="input-group-append">
                          <span class="input-group-text bg-white">
                            <i class="fa fa-calendar"></i>
                          </span>
                      </span>
                  </div>
                  <div class="input-group date" id="datepicker2">
                    <input type="text" class="form-control" name="tgl_akhir" placeholder="Tanggal Akhir">
                      <span class="input-group-append">
                          <span class="input-group-text bg-white">
                            <i class="fa fa-calendar"></i>
                          </span>
                      </span>
                  </div>
                  <input type="submit" class="btn btn-info" value="Cari">
                  
 
                </form>

        <script type="text/javascript">
          $(function() {
              $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
              });
          });
        </script>

        <script type="text/javascript">
          $(function() {
              $('#datepicker2').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
              });
          });
        </script>



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
                    <th class="text-center">Pelanggan</th>
                    <th class="text-center">Nominal</th>
                    <th class="text-center">Tanggal Pembayaran</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($_GET['tgl_awal']))
                  {
                    $tgl_awal = date($_GET['tgl_awal']);
                    $tgl_akhir = date($_GET['tgl_akhir']);

                    if(!empty($tgl_awal))
                    {
                      if($_GET['tgl_awal'] == "semua")
                      {
                        $ambil_semua_data_kitchen = mysqli_query($conn, "SELECT 
                        pembayaran.id_pembayaran, kitchen_set.nama_kitchen, pembayaran.atas_nama, pembayaran.nominal, pembayaran.tgl_pembayaran
                        FROM pembayaran 
                        JOIN pemesanan ON (pemesanan.id_pemesanan = pembayaran.id_pemesanan)
                        JOIN kitchen_set ON (kitchen_set.id_kitchen = pemesanan.id_kitchen)
                        ORDER BY id_pembayaran DESC");
                        $i = 1;
                        while($data = mysqli_fetch_array($ambil_semua_data_kitchen))
                        {
                            $id_pembayaran = $data['id_pembayaran'];
                            $id_pemesanan = $data['nama_kitchen'];
                            $atas_nama = $data['atas_nama'];
                            $nominal = $data['nominal'];
                            $tgl_pembayaran = $data['tgl_pembayaran'];
                        ?>
                        <tr>
                          <td class="align-middle"><?= $i++; ?></td>
                          <td class="align-middle"><?= $id_pembayaran; ?></td>
                          <td class="align-middle"><?= $id_pemesanan; ?></td>
                          <td class="align-middle"><?= $atas_nama; ?></td>
                          <td class="align-middle"><?= "Rp. " . $nominal; ?></td>
                          <td class="align-middle"><?= $tgl_pembayaran; ?></td>
                        </tr>
                        <?php
                        }
                      }else{
                        $ambil_semua_data_kitchen = mysqli_query($conn, "SELECT 
                        pembayaran.id_pembayaran, kitchen_set.nama_kitchen, pembayaran.atas_nama, pembayaran.nominal, pembayaran.tgl_pembayaran
                        FROM pembayaran 
                        JOIN pemesanan ON (pemesanan.id_pemesanan = pembayaran.id_pemesanan)
                        JOIN kitchen_set ON (kitchen_set.id_kitchen = pemesanan.id_kitchen)
                        WHERE tgl_pembayaran 
                        BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ORDER BY id_pembayaran DESC");
                        $i = 1;
                        while($data = mysqli_fetch_array($ambil_semua_data_kitchen))
                        {
                            $id_pembayaran = $data['id_pembayaran'];
                            $nama_kitchen = $data['nama_kitchen'];
                            $atas_nama = $data['atas_nama'];
                            $nominal = $data['nominal'];
                            $tgl_pembayaran = $data['tgl_pembayaran'];
                      ?>
                      <tr>
                        <td class="align-middle"><?= $i++; ?></td>
                        <td class="align-middle"><?= $id_pembayaran; ?></td>
                        <td class="align-middle"><?= $nama_kitchen; ?></td>
                        <td class="align-middle"><?= $atas_nama; ?></td>
                        <td class="align-middle"><?= "Rp. " . $nominal; ?></td>
                        <td class="align-middle"><?= $tgl_pembayaran; ?></td>
                      </tr>
                      <?php
                        }
                      }
                    }else {
                      $ambil_semua_data_kitchen = mysqli_query($conn, "SELECT 
                      pembayaran.id_pembayaran, kitchen_set.nama_kitchen, pembayaran.atas_nama, pembayaran.nominal, pembayaran.tgl_pembayaran
                      FROM pembayaran 
                      JOIN pemesanan ON (pemesanan.id_pemesanan = pembayaran.id_pemesanan)
                      JOIN kitchen_set ON (kitchen_set.id_kitchen = pemesanan.id_kitchen)
                      ORDER BY id_pembayaran DESC");
                      $i = 1;
                      while($data = mysqli_fetch_array($ambil_semua_data_kitchen))
                      {
                          $id_pembayaran = $data['id_pembayaran'];
                          $id_pemesanan = $data['nama_kitchen'];
                          $atas_nama = $data['atas_nama'];
                          $nominal = $data['nominal'];
                          $tgl_pembayaran = $data['tgl_pembayaran'];
                      ?>
                      <tr>
                        <td class="align-middle"><?= $i++; ?></td>
                        <td class="align-middle"><?= $id_pembayaran; ?></td>
                        <td class="align-middle"><?= $id_pemesanan; ?></td>
                        <td class="align-middle"><?= $atas_nama; ?></td>
                        <td class="align-middle"><?= "Rp. " . $nominal; ?></td>
                        <td class="align-middle"><?= $tgl_pembayaran; ?></td>
                      </tr>
                      <?php
                      }
                    }
                  }else{
                    $ambil_semua_data_kitchen = mysqli_query($conn, "SELECT
                    pembayaran.id_pembayaran, kitchen_set.nama_kitchen, pembayaran.atas_nama, pembayaran.nominal, pembayaran.tgl_pembayaran
                    FROM pembayaran 
                    JOIN pemesanan ON (pemesanan.id_pemesanan = pembayaran.id_pemesanan)
                    JOIN kitchen_set ON (kitchen_set.id_kitchen = pemesanan.id_kitchen)
                    ORDER BY id_pembayaran DESC");
                    $i = 1;
                    while($data = mysqli_fetch_array($ambil_semua_data_kitchen))
                    {
                        $id_pembayaran = $data['id_pembayaran'];
                        $nama_kitchen = $data['nama_kitchen'];
                        $atas_nama = $data['atas_nama'];
                        $nominal = $data['nominal'];
                        $tgl_pembayaran = $data['tgl_pembayaran'];
                    ?>
                    <tr>
                      <td class="align-middle"><?= $i++; ?></td>
                      <td class="align-middle"><?= $id_pembayaran; ?></td>
                      <td class="align-middle"><?= $nama_kitchen; ?></td>
                      <td class="align-middle"><?= $atas_nama; ?></td>
                      <td class="align-middle"><?= "Rp. " . $nominal; ?></td>
                      <td class="align-middle"><?= $tgl_pembayaran; ?></td>
                    </tr>
                    <?php
                    }
                  }
                  ?>
                </tfoot>
              </table>
              <?php
              if(isset($_GET['tgl_awal']))
              {
              ?>
                <a class="btn btn-warning" href="cetak.php?tgl_awal=<?= $_GET['tgl_awal']; ?>&tgl_akhir=<?= $_GET['tgl_akhir']; ?>" target="_blank">CETAK</a>
              <?php
              }else {
              ?>
                <a class="btn btn-warning" href="cetak.php?tgl_awal=semua&tgl_akhir=semua" target="_blank">CETAK</a>
              <?php
              }
              ?>
              
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