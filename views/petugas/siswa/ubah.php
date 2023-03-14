<h3>Form Ubah Siswa</h3>
<hr>

<?php
$u = $perpus->tampil_siswa(@$_GET['id']);
?>

<form action="routes/proses.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="">NISN</label>
    <input type="hidden" name="id" value="<?=$u->siswa_id;?>">
    <input type="text" name="nisn" placeholder="Masukkan NISN" class="form-control" value="<?= $u->nisn; ?>">
</div>
<div class="form-group">
    <label for="">Nama Siswa</label>
    <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $u->nama_siswa; ?>">
</div>
<div class="form-group">
    <label for="">Kelas</label>
    <input type="text" name="kelas" placeholder="Masukkan Kelas" class="form-control" value="<?= $u->kelas; ?>">
</div>
<div class="form-group">
    <label for="">Photo</label>
    <input type="file" name="photo" class="form-control">
</div>
<div class="form-group">
    <input type="submit" name="ubah_siswa" value="Simpan" class="btn btn-primary">
    <a href="dashboard.php?pages=siswa" class="btn btn-danger">Kembali</a>
</div>
</form>