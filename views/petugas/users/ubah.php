<h3>Form Ubah Users</h3>
<hr>

<?php
$u = $perpus->tampil_user(@$_GET['id']);
?>

<form action="routes/proses.php" method="POST">
<div class="form-group">
    <label for="">Username</label>
    <input type="hidden" name="id" value="<?=$u->user_id;?>">
    <input type="text" name="username" placeholder="Masukkan Username" class="form-control" value="<?= $u->username; ?>">
</div>
<div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
</div>
<div class="form-group">
    <input type="submit" name="ubah_user" value="Simpan" class="btn btn-primary">
    <a href="dashboard.php?pages=users" class="btn btn-danger">Kembali</a>
</div>
</form>