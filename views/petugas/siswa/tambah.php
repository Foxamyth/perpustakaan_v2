<h3>Form Tambah Siswa</h3>
<hr>

<form action="routes/proses.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="">NISN</label>
    <input type="text" name="nisn" placeholder="Masukkan NISN" class="form-control">
</div>
<div class="form-group">
    <label for="">Nama Siswa</label>
    <input type="text" name="nama_siswa" placeholder="Masukkan Nama" class="form-control">
</div>
<div class="form-group">
    <label for="">Kelas</label>
    <input type="text" name="kelas" placeholder="Masukkan Kelas" class="form-control">
</div>
<div class="form-group">
    <label for="">Photo</label>
    <input type="file" name="photo" class="form-control">
</div>
<div class="form-group">
    <input type="submit" name="simpan_siswa" value="Simpan" class="btn btn-primary">
    <a href="dashboard.php?pages=siswa" class="btn btn-danger">Kembali</a>
</div>
</form>