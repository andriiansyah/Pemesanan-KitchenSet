<?php 
    include '../layout/header.php';
    include '../koneksi.php';
?>

<main class="mt-3 pt-3">
    <div class="container-fluid">
        <h1 class="">User</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Edit User</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php 
                    $id_user = $_GET['id'];
                    
                    $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
                    while($data = mysqli_fetch_array($result))
                    {
                        $username = $data['username'];
                        $password = $data['password'];
                        $hak_akses = $data['hak_akses'];
                    }
                ?>
                    <form method="POST" action="edit_user_proses.php">
                    <input type="text" class="form-control" name="id_user" value=<?= $id_user; ?> >
                        <div class="mb-3">
                            <label for="namabarang">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $username; ?>" placeholder="Masukan nama username" required />
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" value="<?= $password; ?>" placeholder="Masukan password">
                        </div>
                        <div class="mb-3">
                            <label>Hak Akses</label>
                            <input type="text" class="form-control" name="hak_akses" value="<?= $hak_akses; ?>" placeholder="Masukan hak akses" required>

                            <select name="hak_akses" class="form-control">
                                <option value="admin" <?php if($hak_akses == "admin") echo "selected"; ?>>Admin</option>
                                <option value="user" <?php if($hak_akses == "user") echo "selected"; ?>>User</option>
                            </select>

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