<?php
    // cek apabila tidak ada data di $_GET
    if(!isset($_GET["nama"]) || !isset($_GET["nrp"]) || !isset($_GET["jurusan"]) || !isset($_GET["email"])){ //isset berfungsi untuk mengecek apakah sebuah variable sudak pernah dibuat atau belum
        header("Location: latihan1.php"); //redirect : memaksa user untuk pindah ke halaman ini
        exit; //arag script yang dibawahnya tidak dieksesusi
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h1>Detail Mahasiswa</h1>
    <ul>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["nrp"]; ?></li>
        <li><?= $_GET["jurusan"]; ?></li>
        <li><?= $_GET["email"]; ?></li>
    </ul>

    <a href="latihan1.php">kembali</a>
</body>
</html>