<a href="dashboard.php?pages=buku&act=tambah" class="btn btn-success mb-3">Tambah Buku</a>

<table class="table border shadow">
    <tr class='bg-info'>
        <td>No</td>
        <td>Judul Buku</td>
        <td>Penulis</td>
        <td>Penerbit</td>
        <td>Gambar</td>
        <td>Opsi</td>
    </tr>
    <?php
    $no = 1;
    foreach ($perpus->list_buku() as $u) {
    ?>
    <tr>
        <td><?=$no;?></td>
        <td><?=$u->judul_buku;?></td>
        <td><?=$u->penulis;?></td>
        <td><?=$u->penerbit;?></td>
        <td>
            <img src='assets/img/buku/<?=$u->gambar?>' height='100'/>
        </td>
        <td>
        <a href="dashboard.php?pages=buku&act=ubah&id=<?=$u->buku_id;?>" class="btn btn-primary">Ubah</a>
        <a href="routes/proses.php?pages=buku&act=hapus&id=<?=$u->buku_id;?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
        </td>

    </tr>
    <?php
    $no++;
    }
    ?>
</table>