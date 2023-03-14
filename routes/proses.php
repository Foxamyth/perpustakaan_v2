<?php
include '../controllers/db.php';

//Proses Login
if (@$_POST['login']) {
    $uname = $_POST['username'];
    $passwd = $_POST['password'];

    $perpus->proses_login($uname, $passwd);
}

// Proses Logout
if (@$_GET['aksi'] == 'logout') {
    $perpus->logout();
}

//Proses Simpan User
if(@$_POST['simpan_user']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $perpus->simpan_user($username,$password);
}
if(@$_POST['ubah_user']) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $perpus->ubah_user($id,$username,$password);
}

if(@$_GET['act'] == 'hapus1') {
    $id = $_GET['id'];
    $perpus->hapus_user($id);
}

//Proses Simpan Siswa
if(@$_POST['simpan_siswa']) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $gambar = $_FILES['photo']['name'];
    $perpus->simpan_siswa($nisn,$nama,$kelas,$gambar);
}
//Hapus Siswa
if(@$_GET['act'] == 'hapus2') {
    $id = $_GET['id'];
    $perpus->hapus_siswa($id);
}
//Ubah Siswa
if(@$_POST['ubah_siswa']) {
    $id = $_POST['id'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gambar = $_FILES['photo']['name'];

    $perpus->ubah_siswa($id,$nisn,$nama,$kelas,$gambar);
}
//Proses Simpan Buku
if(@$_POST['simpan_buku']) {
    $judul = $_POST['judul_buku'];
    $deskripsi = $_POST['deskripsi'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $gambar = $_FILES['gambar']['name'];
    $perpus->simpan_buku($judul,$deskripsi,$penulis,$penerbit,$gambar);
}
//Hapus Buku
if(@$_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    $perpus->hapus_buku($id);
}
//Ubah Buku
if(@$_POST['ubah_buku']) {
    $id = $_POST['id'];
    $judul = $_POST['judul_buku'];
    $deskripsi = $_POST['deskripsi'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $gambar = $_FILES['gambar']['name'];

    $perpus->ubah_buku($id,$judul,$deskripsi,$penulis,$penerbit,$gambar);
}
//peminjaman
if (@$_POST['simpan_pinjam']) {
    $no_peminjaman = $_POST['idd'] . "-" . date('Y-m-d');
    $siswa = $_POST['idd'];
    $buku = $_POST['buku'];
    $tgl_pinjam = date('Y-m-d');
    $tgl_kembali = $_POST['tgl_kembali'];
    $perpus->proses_simpan_peminjaman($no_peminjaman, $siswa, $buku, $tgl_pinjam, $tgl_kembali);
}

if (@$_POST['cari_nis']) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $perpus->cari_nis($nis);
}