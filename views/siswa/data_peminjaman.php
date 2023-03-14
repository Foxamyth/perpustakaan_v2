<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'perpustakaanv2');
@session_start();
?>

<table class="table border shadow">
    <tr class="bg-primary text-white">
        <td>NO</td>
        <td>Judul Buku</td>
        <td>Tgl Pinjam</td>
        <td>Tgl Kembali</td>
    </tr>
    <?php
    $nis = $_SESSION['nis'];
    $no = 1;
    $query_data = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN buku ON buku.buku_id = peminjaman.buku_id WHERE nisn=$nis");
    while ($ps = mysqli_fetch_array($query_data)) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $ps['judul_buku']; ?></td>
            <td><?= $ps['tgl_peminjaman']; ?></td>
            <td><?= $ps['tgl_kembali']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>