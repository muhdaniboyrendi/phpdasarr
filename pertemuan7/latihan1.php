<?php
    // variable scope/lingkup variabel
    // $x = 10; //ini adalh variable lokal untuk file ini

    // function tampilX(){
    //     $x = 20; //ini adalh variable lokal untuk function ini saja
    //     echo $x;
    // }

    // function tampilX(){
    //     global $x; //ini akan mengecek apakah ada valiable x diluar dari function (variable global)
    //     echo $x;
    // }

    // tampilX();
    // echo "<br>";
    // echo $x;



    // dan ada yang namanya variable superglobals, yaitu adalah sebuah variable yang sudah dimiliki oleh php dan bertipe assosiative array

    // $_GET
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
    <title>GET</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach($mahasiswa as $mhs) : ?>
        <li>
            <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&email=<?= $mhs["email"]; ?>"><?= $mhs["nama"]; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>