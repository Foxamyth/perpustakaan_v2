<h3>Form Tambah Buku</h3>
<hr>

<form action="routes/proses.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="">Judul Buku</label>
    <input type="text" name="judul_buku" placeholder="Judul Buku" class="form-control">
</div>
<div class="form-group">
    <label for="">Deskripsi</label>
    <input type="text" name="deskripsi" placeholder="deskripsi" class="form-control">
</div>
<div class="form-group">
    <label for="">Penulis</label>
    <input type="text" name="penulis" placeholder="Penulis" class="form-control">
</div>
<div class="form-group">
    <label for="">Penerbit</label>
    <input type="text" name="penerbit" placeholder="Penerbit" class="form-control">
</div>
<div class="form-group">
    <label for="">Gambar</label>
    <input type="file" name="gambar" class="form-control">
</div>
<div class="form-group">
    <input type="submit" name="simpan_buku" value="Simpan" class="btn btn-primary">
    <a href="dashboard.php?pages=buku" class="btn btn-danger">Kembali</a>
</div>
</form>