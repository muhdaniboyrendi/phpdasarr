<?php
    // array assosiative
    // key nya adalh string yang kita buat sendiri
    $mahasiswa = [
        ["nama" => "Erlan", "nrp" => "123456", "jurusan" => "Teknik Informatika", "email" => "email"],
        ["nama" => "Azka", "nrp" => "234567", "jurusan" => "Teknik Elektro", "email" => "email"],
        ["nama" => "Aini", "nrp" => "345678", "jurusan" => "Teknik Desain", "email" => "email"]
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
    <h1>Daftar Mahasiswa</h1>
    <?php foreach($mahasiswa as $mhs) : ?>
        <ul>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NRP : <?= $mhs["nrp"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>