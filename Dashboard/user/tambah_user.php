<?php 
    include '../layout/header.php';
?>

<main class="mt-5 pt-3">
    <div class="container-fluid">
        <h1 class="mt-4">User</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Tambah Data User</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="tambah_user_proses.php">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukan username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Masukan password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hak Akses</label>
                            <select class="form-select" name="hak_akses">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
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