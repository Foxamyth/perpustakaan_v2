<a href="dashboard.php?pages=siswa&act=tambah" class="btn btn-success mb-3">Tambah Data Siswa</a>

<table class="table border shadow">
    <tr class='bg-info'>
        <td>No</td>
        <td>NISN</td>
        <td>Nama Siswa</td>
        <td>Kelas</td>
        <td>Photo</td>
        <td>Opsi</td>
    </tr>
    <?php
    $no = 1;
    foreach ($perpus->list_siswa() as $u) {
    ?>
    <tr>
        <td><?=$no;?></td>
        <td><?=$u->nisn;?></td>
        <td><?=$u->nama_siswa;?></td>
        <td><?=$u->kelas;?></td>
        <td>
            <img src='assets/img/siswa/<?=$u->photo?>' height='100'/>
        </td>
        <td>
        <a href="dashboard.php?pages=siswa&act=ubah&id=<?=$u->siswa_id;?>" class="btn btn-primary">Ubah</a>
        <a href="routes/proses.php?pages=siswa&act=hapus2&id=<?=$u->siswa_id;?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
        </td>

    </tr>
    <?php
    $no++;
    }
    ?>
</table>