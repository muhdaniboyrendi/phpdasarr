<?php
    session_start();

    // jika user tidak memiliki session login
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }

    require 'function.php';

    // pagination
    // konfigurasi
    $jumlahDataPerHalaman = 2;
    // menhitung total jumlah data
    $jumlahData = count(query("SELECT * FROM mahasiswa")); //count untuk menghitung jumlah data pada array
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman); //berfungsi untuk membulatkan bilangan desimal ke bilangan bulat diatasnya
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1; //jika nilai nya true masuk ke halam aktif tp jika false maka hasilnya 1
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    // mengambil data mahasiswa
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman"); //untuk paramater limit adalah index awal data yang ditampilkan, jumlah data yang ditampilkan

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
</head>
<style>
    a{
        text-decoration: none;
    }
</style>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <a href="logout.php">Logout</a>
    <br><br>
    
    <form action="" method="post">
        <input type="text" name="keyword" size="50" placeholder="Masukan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br>

    <!-- navigasi -->
    <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: green;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif;?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
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
                <a href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a> | <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Apakah andan yakin akan menghapus?')">Hapus</a>
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
</body>
</html>