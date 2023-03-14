<?php
class perpustakaan
{
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = new mysqli('localhost', 'root', '', 'perpustakaanv2');
        if (mysqli_connect_errno()) {
            echo "koneksi gagal" . mysqli_connect_error();
        }
    }

    public function proses_login($uname, $passwd)
    {
        $query = $this->koneksi->query("SELECT * FROM users WHERE 
       username='$uname' AND password=md5('$passwd')");
        $data = $query->fetch_object();
        $count = $query->num_rows;
        if ($count > 0) {
            session_start();
            $_SESSION['login'] = 1;
            $_SESSION['username'] = $data->username;
            $_SESSION['level'] = $data->level;
            $_SESSION['nis'] = $data->nis;
            header("location:../dashboard.php");
        } else {
            session_start();
            $_SESSION['warning'] = 'Anda gagal login,periksa username/password anda';
            header("location:../login.php");
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        //alert
        session_start();
        $_SESSION['success'] = 'Anda Berhasil Logout';
        header("location:../login.php");
    }

//DATA USER
public function list_users()
{
    $query = $this->koneksi->query("SELECT * FROM users");
    while ($data = $query->fetch_object()) {
        $hasil[] = $data;
    }
    return $hasil;
}

public function jumUsers()
{
    $query = $this->koneksi->query("SELECT * FROM users");
    return $query->num_rows;
}

public function simpan_user($username,$password)
{
    $query = $this->koneksi->query("INSERT INTO users VALUES (null,'$username',md5('$password'),'Petugas','0')");
    if($query) {
        session_start();
        $_SESSION['success'] = 'Data user berhasil disimpan!';
        header('location:../dashboard.php?pages=users');
    }
}

public function tampil_user($id)
{
    $query = $this->koneksi->query("SELECT * FROM users WHERE user_id='$id'");
    return $query->fetch_object();
}

public function ubah_user($id,$username,$password)
{
    if($password == null){
        $query = $this->koneksi->query("UPDATE users SET username='$username' WHERE user_id='$id'");
        session_start();
        $_SESSION['success'] = 'Data user berhasil di ubah';
        header("location:../dashboard.php?pages=users");
    } else {
        $query = $this->koneksi->query("UPDATE users SET username='$username',password=md5('$password') WHERE user_id='$id'");
        session_start();
        $_SESSION['success'] = 'Data user berhasil di ubah';
        header("location:../dashboard.php?pages=users");
    }
}

public function hapus_user($id)
{
    $query = $this->koneksi->query("DELETE FROM  users WHERE user_id='$id'");
    header("location:../dashboard.php?pages=users");
}


//DATA SISWA
public function list_siswa()
{
    $query = $this->koneksi->query("SELECT * FROM siswa");
    while ($data = $query->fetch_object()) {
        $hasil[] = $data;
    }
    return $hasil;
}

public function jumSiswa()
{
    $query = $this->koneksi->query("SELECT * FROM siswa");
    return $query->num_rows;
}

public function simpan_siswa($nisn,$nama,$kelas,$gambar)
{
    $query = $this->koneksi->query("INSERT INTO siswa VALUES (null,'$nisn','$nama','$kelas','$gambar')");
    if($query) {
        $this->koneksi->query("INSERT INTO users VALUES (null,'$nama',md5('$nisn'),'Siswa','$nisn')");
        move_uploaded_file($_FILES['photo']['tmp_name'],'../assets/img/siswa/'. $gambar);
        session_start();
        $_SESSION['success'] = 'Data siswa berhasil disimpan!';
        header('location:../dashboard.php?pages=siswa');
    }
}

public function hapus_siswa($id)
{
    $query = $this->koneksi->query("DELETE FROM  siswa WHERE siswa_id='$id'");
    header("location:../dashboard.php?pages=siswa");
}

public function tampil_siswa($id)
{
    $query = $this->koneksi->query("SELECT * FROM siswa WHERE siswa_id='$id'");
    return $query->fetch_object();
}

public function ubah_siswa($id,$nisn,$nama,$kelas,$gambar)
{
    if($gambar == null){
        $query = $this->koneksi->query("UPDATE siswa SET nisn='$nisn',nama_siswa='$nama',kelas='$kelas' WHERE siswa_id='$id'");
        session_start();
        $_SESSION['success'] = 'Data siswa berhasil di ubah';
        header("location:../dashboard.php?pages=siswa");
    } else {
        move_uploaded_file($_FILES['photo']['tmp_name'],'../assets/img/siswa/'. $gambar);
        $query = $this->koneksi->query("UPDATE siswa SET nisn='$nisn',nama_siswa='$nama',kelas='$kelas',photo='$gambar' WHERE siswa_id='$id'");
        session_start();
        $_SESSION['success'] = 'Data siswa berhasil di ubah';
        header("location:../dashboard.php?pages=siswa");
    }
}

public function jumBuku()
{
    $query = $this->koneksi->query("SELECT * FROM buku");
    return $query->num_rows;
}

public function tampil_buku($id)
{
    $query = $this->koneksi->query("SELECT * FROM buku WHERE buku_id='$id'");
    return $query->fetch_object();
}

public function list_buku()
{
    $query = $this->koneksi->query("SELECT * FROM buku");
    while ($data = $query->fetch_object()) {
        $hasil[] = $data;
    }
    return @$hasil;
}

public function simpan_buku($judul,$deskripsi,$penulis,$penerbit,$gambar)
{
    $query = $this->koneksi->query("INSERT INTO buku VALUES (null,'$judul','$deskripsi','$penulis','$penerbit','$gambar')");
    if($query) {
        move_uploaded_file($_FILES['gambar']['tmp_name'],'../assets/img/buku/'. $gambar);
        session_start();
        $_SESSION['success'] = 'Data buku berhasil disimpan!';
        header('location:../dashboard.php?pages=buku');
    }
}

public function hapus_buku($id)
{
    $query = $this->koneksi->query("DELETE FROM  buku WHERE buku_id='$id'");
    header("location:../dashboard.php?pages=buku");
}

public function ubah_buku($id,$judul,$deskripsi,$penulis,$penerbit,$gambar)
{
    if($gambar == null){
        $query = $this->koneksi->query("UPDATE buku SET judul_buku='$judul',deskripsi='$deskripsi',penulis='$penulis',penerbit='$penerbit' WHERE buku_id='$id'");
        session_start();
        $_SESSION['success'] = 'Data buku berhasil di ubah';
        header("location:../dashboard.php?pages=buku");
    } else {
        move_uploaded_file($_FILES['gambar']['tmp_name'],'../assets/img/buku/'. $gambar);
        $query = $this->koneksi->query("UPDATE buku SET judul_buku='$judul',deskripsi='$deskripsi',penulis='$penulis',penerbit='$penerbit',gambar='$gambar' WHERE buku_id='$id'");
        session_start();
        $_SESSION['success'] = 'Data buku berhasil di ubah';
        header("location:../dashboard.php?pages=buku");
    }
}


public function jumPeminjaman()
{
    $query = $this->koneksi->query("SELECT * FROM peminjaman");
    return $query->num_rows;
}

    //data peminjaman user
    public function list_peminjaman()
    {
        $query = $this->koneksi->query("SELECT * FROM peminjaman INNER JOIN buku ON buku.buku_id = peminjaman.buku_id INNER JOIN siswa ON siswa.nisn = peminjaman.nisn");
        while ($pinjam = $query->fetch_object()) {
            $hasil3[] = $pinjam;
        }
        return $hasil3;
    }

    public function proses_simpan_peminjaman($no_peminjaman, $siswa, $buku, $tgl_pinjam, $tgl_kembali)
    {
        $query = $this->koneksi->query("INSERT INTO peminjaman VALUES ('$no_peminjaman','$buku','$siswa','$tgl_pinjam','$tgl_kembali')");

        if ($query) {
            session_start();
            $_SESSION['success'] = 'Data peminjaman berhasil disimpan';
            header("location:../dashboard.php?pages=peminjaman");
        }
    }

        public function menghitung_peminjaman()
    {
        $query = $this->koneksi->query("SELECT * FROM peminjaman");
        return $query->num_rows;
    }

    public function cari_nis($nis)
    {
        header("location:../dashboard.php?pages=peminjaman&act=tambah&nis=$nis");
    }

    public function buku()
    {
        $query = $this->koneksi->query("SELECT * FROM buku");
        while ($data = $query->fetch_object()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

}
$perpus = new perpustakaan();
 