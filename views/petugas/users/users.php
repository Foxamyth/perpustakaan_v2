<a href="dashboard.php?pages=users&act=tambah" class="btn btn-success mb-3">Tambah Data Users</a>

<table class="table border shadow">
    <tr class='bg-info'>
        <td>No</td>
        <td>Username</td>
        <td>Level</td>
        <td>Opsi</td>
    </tr>
    <?php
    $no = 1;
    foreach ($perpus->list_users() as $u) {
    ?>
    <tr>
        <td><?=$no;?></td>
        <td><?=$u->username;?></td>
        <td><?=$u->level;?></td>
        <td>
            <a href="dashboard.php?pages=users&act=ubah&id=<?=$u->user_id;?>" class="btn btn-primary">Ubah</a>
            <a href="routes/proses.php?pages=users&act=hapus1&id=<?=$u->user_id;?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>