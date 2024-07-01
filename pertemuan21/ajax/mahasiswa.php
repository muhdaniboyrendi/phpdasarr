<?php
    require '../function.php';

    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR email LIKE '%$keyword%'";
    $mahasiswa = query($query);
?>

<table class="table table-striped table-hover">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $mhs["id"]; ?>" class="badge text-bg-warning">Ubah</a>  <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Apakah andan yakin akan menghapus?')" class="badge text-bg-danger">Hapus</a>
                </td>
                <td><img src="img/<?= $mhs["gambar"]; ?>" width="100px"></td>
                <td><?= $mhs["nrp"]; ?></td>
                <td><?= $mhs["nama"]; ?></td>
                <td><?= $mhs["email"]; ?></td>
                <td><?= $mhs["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach;?>
        </table>