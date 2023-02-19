<?php
include '../koneksi.php';
    $tgl_awal = $_GET['tgl_awal'];
    $tgl_akhir = $_GET['tgl_akhir'];

    if($tgl_awal == "semua")
    {
        $result = mysqli_query($conn, "SELECT 
                                        pembayaran.id_pembayaran, kitchen_set.nama_kitchen, pembayaran.atas_nama, pembayaran.nominal, pembayaran.tgl_pembayaran
                                        FROM pembayaran 
                                        JOIN pemesanan ON (pemesanan.id_pemesanan = pembayaran.id_pemesanan)
                                        JOIN kitchen_set ON (kitchen_set.id_kitchen = pemesanan.id_kitchen)
                                        ORDER BY id_pembayaran DESC");
        $sum = mysqli_query($conn, "SELECT SUM(nominal) AS total FROM pembayaran");
        $bulanNama = "Semua Data";
    }else {
        $result = mysqli_query($conn, "SELECT 
                                        pembayaran.id_pembayaran, kitchen_set.nama_kitchen, pembayaran.atas_nama, pembayaran.nominal, pembayaran.tgl_pembayaran
                                        FROM pembayaran 
                                        JOIN pemesanan ON (pemesanan.id_pemesanan = pembayaran.id_pemesanan)
                                        JOIN kitchen_set ON (kitchen_set.id_kitchen = pemesanan.id_kitchen)
                                        WHERE tgl_pembayaran 
                                        BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ORDER BY id_pembayaran DESC");
        $sum = mysqli_query($conn, "SELECT SUM(nominal) AS total FROM pembayaran WHERE tgl_pembayaran BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' ORDER BY id_pembayaran DESC");
        $bulanNama = "Dari Tanggal " . $tgl_awal . " Sampai " . $tgl_akhir;
    }


?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Laporan Penjualan</title>
  </head>
  <body>

<div class="container">
     
    <div class="row">
        <div class="col-1">
            <img src="../../images/hylarana.png" style="width:100px;height:100px;">
        </div>
        <div class="col">
            <h1 class="text-center fw-bold">PT. HYLARANA KREASI INSPIRA</h1>
            <h2 class="text-center">Laporan Penjualan</h2>
        </div>
    </div>
    <hr style="border:solid 1px black;color: #FFFF00;height: 1px;">
    <div class="row justify-content-between mt-3 mb-3">
        <div class="col-4">
            <h6> <?php echo $bulanNama; ?></h6>
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-secondary align-end" onclick="myFunction()">Cetak</button>
        </div>
    </div>
    
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
            <th scope="col ll">No</th>
            <th scope="col">Id Pembayaran</th>
            <th scope="col">Nama Kitchen</th>
            <th scope="col">Atas Nama</th>
            <th scope="col">Tanggal Pembayaran</th>
            <th scope="col">Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while($data = mysqli_fetch_array($result))
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
                <td class="align-middle"><?= $tgl_pembayaran; ?></td>
                <td class="align-middle"><?= "Rp. " . $nominal; ?></td>
                </tr>
            <?php
            }
            while($data2 = mysqli_fetch_array($sum))
            {
            ?>
            <tr>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle"></td>
                <td class="align-middle fw-bold">Total</td>
                <td class="align-middle fw-bold"><?= "Rp. " . $data2['total']; ?></td>
            </tr> 
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script src=".././js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src=".././js/jquery-3.5.1.js"></script>
    <script src=".././js/jquery.dataTables.min.js"></script>
    <script src=".././js/dataTables.bootstrap5.min.js"></script>
    <script src=".././js/script.js"></script>

   <!-- Fungsi print report -->
   <script>
        function myFunction() {
            window.print();
        }
    </script>

  </body>
</html>
