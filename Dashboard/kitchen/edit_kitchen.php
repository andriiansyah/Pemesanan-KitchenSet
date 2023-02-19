<?php 
    include '../layout/header.php';
    include '../koneksi.php';
?>

<main class="mt-3 pt-3">
    <div class="container-fluid">
        <h1 class="">Kitchen</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Edit Kitchen</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php 
                    $id_kitchen = $_GET['id'];
                    
                    $result = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE id_kitchen = $id_kitchen");
                    while($data = mysqli_fetch_array($result))
                    {
                        $nama_kitchen = $data['nama_kitchen'];
                        $kategori_kitchen = $data['kategori_kitchen'];
                        $foto_kitchen = $data['foto_kitchen'];
                    }
                ?>
                    <form method="POST" action="edit_kitchen_proses.php" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_kitchen" value=<?= $id_kitchen; ?> >
                        <div class="mb-3">
                            <label>Nama Kitchen Set</label>
                            <input type="text" class="form-control" name="nama_kitchen" value="<?= $nama_kitchen; ?>" placeholder="Masukan nama pelanggan">
                        </div>
                        <div class="mb-3">
                            <label>Kategori</label>
                            <input type="text" class="form-control" name="kategori_kitchen" value="<?= $kategori_kitchen; ?>" placeholder="Masukan nomor telepon pelanggan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto_kitchen" class="form-control">
                            <br>
                            <?php 
                            if ($foto_kitchen == "") { ?>
                                <img src="../images/default.jpg" style="width:100px;height:50px;">
                            <?php }else{ ?>
                                <img src="../images/kitchen/<?php echo $foto_kitchen; ?>" style="width:100px;height:50px;">
                            <?php } ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    include '../layout/footer.php';
?>