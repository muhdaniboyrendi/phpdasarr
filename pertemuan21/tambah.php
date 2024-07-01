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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            margin-top: 100px;
            text-align: center;
        }
        .form-floating{
            width: 500px;
            margin: auto;
        }
        .gambar{
            width: 523px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-floating mb-1">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
            <label for="nama">Nama Mahasiswa</label>
        </div>
        <div class="form-floating mb-1">
            <input type="text" name="nrp" class="form-control" id="nrp" placeholder="NRP">
            <label for="nrp">NRP</label>
        </div>
        <div class="form-floating mb-1">
            <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan">
            <label for="jurusan">Jurusan</label>
        </div>
        <div class="form-floating mb-1">
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            <label for="email">Email</label>
        </div>
        <div class="gambar mb-3 row">
            <label for="formFile" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="formFile" name="gambar">
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-lg">Tambah</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>