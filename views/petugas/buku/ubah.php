<h3>Form Ubah Buku</h3>
<hr>

<?php
$u = $perpus->tampil_buku(@$_GET['id']);
?>

<form action="routes/proses.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="">Judul Buku</label>
    <input type="hidden" name="id" value="<?=$u->buku_id;?>">
    <input type="text" name="judul_buku" placeholder="Judul Buku" class="form-control" value="<?= $u->judul_buku; ?>">
</div>
<div class="form-group">
    <label for="">Deskripsi</label>
    <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" value="<?= $u->deskripsi; ?>">
</div>
<div class="form-group">
    <label for="">Penulis</label>
    <input type="text" name="penulis" placeholder="Penulis" class="form-control" value="<?= $u->penulis; ?>">
</div>
<div class="form-group">
    <label for="">Penerbit</label>
    <input type="text" name="penerbit" placeholder="Penerbit" class="form-control" value="<?= $u->penerbit; ?>">
</div>
<div class="form-group">
    <label for="">Gambar</label>
    <input type="file" name="gambar" class="form-control">
</div>
<div class="form-group">
    <input type="submit" name="ubah_buku" value="Simpan" class="btn btn-primary">
    <a href="dashboard.php?pages=buku" class="btn btn-danger">Kembali</a>
</div>
</form>