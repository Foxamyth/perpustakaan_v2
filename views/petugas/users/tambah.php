<h3>Form Tambah Users</h3>
<hr>

<form action="routes/proses.php" method="POST">
<div class="form-group">
    <label for="">Username</label>
    <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
</div>
<div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
</div>
<div class="form-group">
    <input type="submit" name="simpan_user" value="Simpan" class="btn btn-primary">
    <a href="dashboard.php?pages=users" class="btn btn-danger">Kembali</a>
</div>
</form>