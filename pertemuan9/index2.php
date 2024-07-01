<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar"); //urutan parameter adalah host, username, password, nama database

    // ambil data dari table mahasiswa
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
    // if(!$result){ //jika $result ada error
    //     echo mysqli_error($conn);
    // }

    // ambil data (fetch) mahasiswa dari object result
    // ada 4 cara yaitu : 
    // mysqli_fetch_row() => mengembalikan array numeric
    // mysqli_fetch_assoc() => mengembalikan array assosiative
    // mysqli_fetch_array() => mengembalikan array numeric dan assosiative
    // mysqli_fetch_object()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php while($mhs = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">Ubah</a> | <a href="">Hapus</a>
            </td>
            <td><?= $mhs["nrp"]; ?></td>
            <td><?= $mhs["nama"]; ?></td>
            <td><?= $mhs["email"]; ?></td>
            <td><?= $mhs["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile;?>
    </table>
</body>
</html>