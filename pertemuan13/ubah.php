<?php
    require 'function.php';

    $id = $_GET["id"];
    $mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

    // cek apakah tombol submit sudah ditekan atau belum
    if(isset($_POST["submit"])){
        // cek apakah data berhasil diubah
        if(ubah($_POST) > 0){
            echo "<script>
                    alert('data berhasil diubah');
                    document.location.href = 'index.php';
                </script>";

        }else{
            echo "<script>
                    alert('data gagal diubah');
                </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mahasiswa["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mahasiswa["gambar"]; ?>">
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" value="<?= $mahasiswa["nama"]; ?>" required>
        <br>
        <label for="nrp">NRP : </label>
        <input type="text" name="nrp" id="nrp" value="<?= $mahasiswa["nrp"]; ?>" required>
        <br>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" value="<?= $mahasiswa["jurusan"]; ?>" required>
        <br>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" value="<?= $mahasiswa["email"]; ?>" required>
        <br><br>
        <label for="gambar">Gambar : </label>
        <br>
        <img src="img/<?= $mahasiswa["gambar"]; ?>" width="120px">
        <br>
        <input type="file" name="gambar" id="gambar">
        <br><br>
        <button type="submit" name="submit">Ubah</button>
    </form>
</body>
</html>