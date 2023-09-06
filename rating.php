<?php

    include 'layout/header.php';

    $id_pemesanan = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_pemesanan = $id_pemesanan");

    while($data = mysqli_fetch_array($result))
    {
        $id_kitchen = $data['id_kitchen'];
        $id_pelanggan = $data['id_pelanggan'];
    }

    // Mengambil kategori kitchen
    $result_kategori = mysqli_query($conn, "SELECT * FROM kitchen_set WHERE id_kitchen = $id_kitchen");
    while($data = mysqli_fetch_array($result_kategori))
    {
        $kategori_kitchen = $data['kategori_kitchen'];
    }
    $result_rating = mysqli_query($conn, "SELECT * FROM tb_rating WHERE id_kitchen = $id_kitchen AND id_pelanggan = $id_pelanggan");

    while($data = mysqli_fetch_array($result_rating))
    {
        $id_rating = $data['id_rating'];
        $id_kitchen_r = $data['id_kitchen'];
        $id_pelanggan_r = $data['id_pelanggan'];
        $rating = $data['rating'];
    }

    if($result_rating->num_rows > 0)
    {
        // echo $rating . "<br>";
?>
<link rel="stylesheet" href="cssrating/style.css">
        <div class="container mb-3 mt-80px">
            <h1 class="mt-4 mb-3">Memberikan Rating</h1>

            <form method="POST" action="rating_edit_proses.php" enctype="multipart/form-data">
                <label class="form-label">Berikan Rating</label>
                
                <div class="mb-3 rating-wrapper">
                    
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating0" value="0" <?php // if($rating == 0){ echo "checked"; } ?>>
                        <label class="form-check-label" for="rating0">
                            0
                        </label>
                    </div> -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating1" value="1" <?php if($rating == 1){ echo "checked"; } ?>>
                        <label class="form-check-label bi bi-star-fill" for="rating1">
                            1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating2" value="2" <?php if($rating == 2){ echo "checked"; } ?>>
                        <label class="form-check-label bi bi-star-fill" for="rating2">
                            2
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating3" value="3" <?php if($rating == 3){ echo "checked"; } ?>>
                        <label class="form-check-label bi bi-star-fill" for="rating3">
                            3
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating4" value="4" <?php if($rating == 4){ echo "checked"; } ?>>
                        <label class="form-check-label bi bi-star-fill" for="rating4">
                            4
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating5" value="5" <?php if($rating == 5){ echo "checked"; } ?>>
                        <label class="form-check-label bi bi-star-fill" for="rating5">
                            5
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="id_rating" value="<?= $id_rating ?>">
                </div>
                <div class="mb-3">
                    
                </div>
                <button type="submit" class="btn btn-primary" name="addnewuser">Submit</button>
            </form>
        </div>
<?php
    }else {
?>
        <div class="container mb-3 mt-80px">
            <h1 class="mt-4 mb-3">Memberikan Rating</h1>

            <form method="POST" action="rating_tambah_proses.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Berikan Rating</label>
                    <!-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating0" value="0">
                        <label class="form-check-label" for="rating0">
                            0
                        </label>
                    </div> -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating1" value="1">
                        <label class="form-check-label" for="rating1">
                            1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating2" value="2">
                        <label class="form-check-label" for="rating2">
                            2
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating3" value="3">
                        <label class="form-check-label" for="rating3">
                            3
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating4" value="4">
                        <label class="form-check-label" for="rating4">
                            4
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rating" id="rating5" value="5">
                        <label class="form-check-label" for="rating5">
                            5
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="id_kitchen" value="<?= $id_kitchen ?>">
                </div>
                <div class="mb-3">
                    <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                </div>
                <div class="mb-3">
                    <input type="hidden" name="kategori_kitchen" value="<?= $kategori_kitchen ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="addnewuser">Submit</button>
            </form>
        </div>
<?php
    }

    // echo $id_kitchen . "<br>";
    // echo $id_pelanggan . "<br>";
    // echo $id_rating;


?>