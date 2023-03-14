<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaanv2');
@$nis = $_GET['nis'];
?>

<h5>Form Tambah Peminjaman</h5>
<hr>

<form action="routes/proses.php" method="post">
    <div class="form-group">
        <label for="">NIS</label>
        <input type="text" name="nis" autofocus class="form-control">
        <input type="submit" name="cari_nis" value="Cari" class="btn btn-primary mt-1 mb-1">
    </div>
</form>

<form action="routes/proses.php" method="post">
    <div class="form-group">
        <label for="">Siswa</label>
        <?php
        $query_nama = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nis' ");
        $n = mysqli_fetch_array($query_nama);
        ?>
        <input type="hidden" name="idd" value="<?= $n['nisn']; ?>">
        <input type="text" name="siswa" value="<?= @$n['nama_siswa']; ?>" class="form-control">
        <?php
        ?>
    </div>
    <div class="form-group">
        <label for="">Buku</label>
        <select name="buku" class="form-control">
            <?php
            foreach ($perpus->buku() as $b) {
            ?>
                <option value="<?= $b->buku_id; ?>"><?= $b->judul_buku; ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Tgl Kembali</label>
        <input type="date" name="tgl_kembali" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="simpan_pinjam" class="btn btn-primary" value="simpan">
        <a href="dashboard.php?pages=peminjaman" class="btn btn-danger">Kembali</a>
    </div>
</form>