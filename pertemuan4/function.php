<?php
    function salam($waktu = "Datang", $nama = "Admin"){ //ini adalah argumen defgault yang ketika function dipanggil tp tidak ada argumen makak akan diisi argumen dafault
        return "Selamat $waktu, $nama";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>
<body>
    <h1><?= salam("Pagi", "Erlan");?></h1>
</body>
</html>