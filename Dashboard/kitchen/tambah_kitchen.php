<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <h1 class="mt-4">Kitchen Set</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Tambah Data Kitchen Set</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="tambah_kitchen_proses.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nama Kitchen Set</label>
                            <input type="text" class="form-control" name="nama_kitchen" placeholder="Masukan nama kitchen set" required>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori_kitchen" id="kategori_kitchen1" value="Minimalis">
                            <label class="form-check-label" for="kategori_kitchen1">
                                Minimalis
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kategori_kitchen" id="kategori_kitchen2" value="Bentuk L">
                            <label class="form-check-label" for="kategori_kitchen2">
                                Kitchen Set Bentuk L
                            </label>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto_kitchen">
                        </div>
                        <button type="submit" class="btn btn-primary" name="addnewuser">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    include '../layout/footer.php';
?>