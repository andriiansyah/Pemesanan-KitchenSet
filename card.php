<?php 
    include 'layout/header.php';

    $id_pelanggan = $_GET['id'];

    ?>
    <div class="div bg-secondary">
        <div class="container">
            <h1 class="fw-bold text-white pt-3">Cart</h1>
            <hr>
        </div>
    </div>
<div class="container mt-3">
        <h2 class="text-danger fw-bold">Pemesanan</h2>
        <hr>
    <?php


    $result = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_pelanggan = $id_pelanggan AND NOT konfirmasi_pemesanan = 'Selesai'");
    
    if ($result->num_rows == 0) {
        ?>
        <div class="container mt-3">
            <h1 class="text-center">Belum ada Kitchen Set yang dipesan!</h1>
        </div>
        <?php
    }


    while($data = mysqli_fetch_array($result))
    {
        $id_pemesanan = $data['id_pemesanan'];
        $id_kitchen = $data['id_kitchen'];
        $id_pelanggan = $data['id_pelanggan'];
        $qty = $data['qty'];
        $bahan = $data['bahan'];
        $warna = $data['warna'];
        $ukuran_kitchen_set = $data['ukuran_kitchen_set'];
        $survey = $data['survey'];
        $rincian_pemesanan = $data['rincian_pemesanan'];
        $konfirmasi_pemesanan = $data['konfirmasi_pemesanan'];
        $harga_pemesanan = $data['harga_pemesanan'];
        $tgl_pemesanan = $data['tgl_pemesanan'];

        $result_kitchen = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE id_kitchen = $id_kitchen");
        while($data_kitchen = mysqli_fetch_array($result_kitchen))
        {
            $nama_kitchen = $data_kitchen['nama_kitchen'];
            $kategori_kitchen = $data_kitchen['kategori_kitchen'];
            $foto_kitchen = $data_kitchen['foto_kitchen'];
        }
    
        $result_pembayaran = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pemesanan = $id_pemesanan");
        while($data_pembayaran = mysqli_fetch_array($result_pembayaran))
        {
            $id_pembayaran = $data_pembayaran['id_pembayaran'];
            $id_pemesanan2 = $data_pembayaran['id_pemesanan'];
            $konfirmasi_pembayaran = $data_pembayaran['konfirmasi_pembayaran'];
        }


        
        ?>

        <div class="row mb-3">
            <div class="col-sm-2">
                <img src="dashboard/images/kitchen/<?= $foto_kitchen ?>" width="180" height="150" alt="">
            </div>
            <div class="col-sm-9">
            <div class="row">
                <div class="col-8 col-sm-6 mb-3 mt-3">
                    <h5 class="fw-bold"><?= $nama_kitchen ?></h5>
                </div>
                <div class="col-4 col-sm-6 align-middle mt-3">
                    Harga : Rp. <?= $harga_pemesanan ?>
                </div>
                <div class="col align-middle">
                    <?php
                        if($result_pembayaran->num_rows == 0) {
                    ?>
                    <?php
                            if($konfirmasi_pemesanan == ""){
                    ?>
                            <h5 for="">Silahkan menunggu konfirmasi pemesanan dari admin, untuk membayar pemesanan</h5>
                    <?php 
                            } 
                    ?>
                    <?php
                        }else if($konfirmasi_pembayaran == "Ya") {
                    ?>
                            <a class="btn btn-warning" href="bayar_final.php?id=<?= $id_pemesanan; ?>" role="button">Lihat Detail Pesanan<?php //$id_pemesanan ?></a>
                    <?php
                        }else if($id_pemesanan2 == $id_pemesanan ){
                    ?>
                            <a class="btn btn-warning" href="bayar_final.php?id=<?= $id_pemesanan; ?>" role="button">Bayar<?php //$id_pemesanan ?></a>
                    <?php 
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
        <?php
    }

    ?>

    <!-- ==================== Pemesanan Selesai ================ -->

        <h2 class="mt-3 text-danger fw-bold">Pemesanan Selesai</h2>
        <hr>

    <?php
        $pembelian_selesai = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_pelanggan = $id_pelanggan AND konfirmasi_pemesanan = 'Selesai' ORDER BY id_pemesanan DESC");

        if ($pembelian_selesai->num_rows == 0)
        {
    ?>
            <div class="container mt-3">
                <h1 class="text-center">Anda belum membeli Kitchen Set!</h1>
            </div>
    <?php
        }else {

            while($data_pembelian_selesai = mysqli_fetch_array($pembelian_selesai))
            {
                $id_pemesanan_res = $data_pembelian_selesai['id_pemesanan'];
                $id_kitchen_res = $data_pembelian_selesai['id_kitchen'];
                $harga_pemesanan_res = $data_pembelian_selesai['harga_pemesanan'];

                $result_kitchen_res = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE id_kitchen = $id_kitchen_res");
                while($data_kitchen_res = mysqli_fetch_array($result_kitchen_res))
                {
                    $nama_kitchen_res = $data_kitchen_res['nama_kitchen'];
                    $kategori_kitchen_res = $data_kitchen_res['kategori_kitchen'];
                    $foto_kitchen_res = $data_kitchen_res['foto_kitchen'];
                }
        ?>
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <img class="rounded" src="dashboard/images/kitchen/<?= $foto_kitchen_res ?>" width="180" height="150" alt="">
                    </div>
                    <div class="col-sm-9">
                        <div class="col-8 col-sm-6 mb-3 mt-3">
                            <h5 class="fw-bold"><?= $nama_kitchen_res ?></h5>
                        </div>
                        <div class="col-4 col-sm-6 align-middle mt-3">
                            Harga : Rp. <?= $harga_pemesanan_res ?>
                        </div>
                        <div class="col-4 align-middle mt-2">
                        <a class="btn btn-warning" href="bayar_final.php?id=<?= $id_pemesanan_res; ?>" role="button">Lihat Detail Pembelian<?php //$id_pemesanan ?></a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
    ?>


    
    



    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
