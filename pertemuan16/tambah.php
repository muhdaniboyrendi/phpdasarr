<?php
    session_start();

    // jika user tidak memiliki session login
    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    
    require 'function.php';

    // cek apakah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"])){
        // cek apakah data berhasil ditambahkan
        if(tambah($_POST) > 0){
            echo "<script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>";

        }else{
            echo "<script>
                    alert('data gagal ditambahkan');
                </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" required>
        <br>
        <label for="nrp">NRP : </label>
        <input type="text" name="nrp" id="nrp" required>
        <br>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" required>
        <br>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="gambar">Gambar : </label>
        <input type="file" name="gambar" id="gambar" required>
        <br><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>