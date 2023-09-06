<?php 
    include 'layout/header.php';

    $id_kitchen = $_GET['id'];

    $ambil_semua_data_kitchen = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE id_kitchen = $id_kitchen");
    while($data = mysqli_fetch_array($ambil_semua_data_kitchen))
    {
        $nama_kitchen = $data['nama_kitchen'];
        $kategori_kitchen = $data['kategori_kitchen'];
        $foto_kitchen = $data['foto_kitchen'];
    }
?>
    <div class="container mt-80px mb-3">
        <h1 class="mt-4 mb-3">Pesan Kitchen Set</h1>
        <div class="row">
            <div class="col-3">
                <img src="dashboard/images/kitchen/<?= $foto_kitchen ?>" width="150" height="250" class="card-img-top" alt="...">
            </div>
            <div class="col">
                <div class="row">
                    <h2><?= $nama_kitchen; ?></h2>
                    <!-- <h4>Rating 3/5</h4> -->
                    <hr>
                    <form method="POST" action="pesan_proses.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <!-- <label class="form-label">Id Kitchen Set</label> -->
                            <input type="hidden" class="form-control" name="id_kitchen" value="<?= $id_kitchen; ?>" placeholder="Masukan nama kitchen set" required>
                        </div>
                        <div class="mb-3">
                            <!-- <label class="form-label">Id Pelanggan</label> -->
                            <input type="hidden" class="form-control" name="id_pelanggan" value="<?= $_SESSION['id_pelanggan']; ?>" placeholder="Masukan nama kitchen set" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pemesanan</label>
                            <input type="hidden" class="form-control" name="tgl_pemesanan" placeholder="Masukan status" value="<?= date('Y-m-d') ?>" required>
                            <input type="text" class="form-control" name="tgl_pemesanan" placeholder="Masukan status" value="<?= date('Y-m-d') ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" name="qty" placeholder="Masukan quantity yang ingin dipesan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bahan Kitchen Set</label>
                            <input type="text" class="form-control" name="bahan" placeholder="Masukan bahan kitchen set" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Warna Kitchen Set</label>
                            <input type="text" class="form-control" name="warna" placeholder="Masukan warna kitchen set" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ukuran Kitchen Set</label>
                            <input type="text" class="form-control" name="ukuran_kitchen_set" placeholder="Masukan ukuran kitchen set" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Apakah Lokasi Anda Ingin Survei ?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey" id="survei1" value="Ya">
                                <label class="form-check-label" for="survei1">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey" id="survei2" value="Tidak">
                                <label class="form-check-label" for="survei2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rincian Pemesanan</label>
                            <textarea class="form-control" name="rincian_pemesanan" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="addnewuser">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- 
    <div class="container">
        <h1 class="mt-4">Pesan Kitchen Set</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Lengkapi Form Berikut</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    
                </div>
            </div>
        </div>
    </div> -->

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>