<?php
    $mahasiswa = [
        ["Erlan", "123456", "Teknik Informatika", "email"],
        ["Azka", "234567", "Teknik Elektro", "email"]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Mahasiawa</h1>
    <?php foreach($mahasiswa as $mhs) : ?>
        <ul>
        <li>Nama : <?= $mhs[0]; ?></li>
        <li>NRP : <?= $mhs[1]; ?></li>
        <li>Jurusan : <?= $mhs[2]; ?></li>
        <li>Email : <?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>