<?php
    session_start();

    // jika user tidak memiliki session login
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

    require 'function.php';

    // mengambil data mahasiswa dan diurutkan berdasarkan yang paling baru
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

    // tombol cari ditekan
    if(isset($_POST["cari"])){
        $mahasiswa = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        a.badge, a.tambah, a.logout{
            text-decoration: none;
        }
        .loader{
            width: 100px;
            position: absolute;
            top: 135px;
            z-index: -1;
            left: 405px;
            display: none;
        }

        /* ini hanya berlaku ketika halamannya diprint */
        @media print{
            .logout{
                display: none;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="btn btn-success mb-2">Tambah data mahasiswa</a>

    <br>

    <a href="logout.php" class="logout btn btn-danger mb-3">Logout</a>
    
    <br>

    <form action="" method="post">
        <input type="text" name="keyword" size="50" placeholder="Masukan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
        <img src="img/lg.gif" class="loader">
    </form>

    <br>

    <div id="container">
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
    </div>


    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>