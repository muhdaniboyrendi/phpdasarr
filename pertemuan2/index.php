<?php
    // syntax php


    // standar output
    // echo, print
    // print_r  --> untuk mencetak isi aray
    // var_dump --> untuk melihat isi dari sebuah variable

    echo "Erlan Azhari ";
    print "Muhdani Boyrendi ";
    print_r("Erlan ");
    var_dump("Erlan ");
    echo 1234;
    // dan echo juga bisa untuk mencetak boolean


    // penulisan syntax php
    // 1. PHP  didalam HTML
    // 2. HTML didalam PHP --> tapi yang ini tidak disarankan


    // variable dan tipe data
    // variable
    // dalam penulisannya tidak boleh diawali dengan angka
    $nama = "Erlan";
    echo "Hallo, nama saya $nama";


    // operator
    // aritmatika
    // + - * / %
    echo 2 * 2;

    // penggabung string
    // .
    $nama_depan = "Erlan";
    $nama_belakang = "Azhari";
    echo $nama_depan . " " . $nama_belakang;

    // assignment
    // =, +=, -=, *=, /=, %=, .=
    $x = 1;
    $x = 5; //ini menimpa yang diatasnya
    echo $x;

    $i = 2;
    $i += 5; //ini menanbahkannyya
    echo $i;

    $name = "Erlan";
    $name .= " ";
    $name .= "Azhari";
    echo $name;

    // perbandingan, ini menghasilkan nilai boolean
    // <, >, <=, >=, ==, !=

    // identitas, ini hampir sama dengan operator perbandingan tapi juga membandingakan tipe data
    // ===, !==

    // logika
    // &&, ||, !
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>
<body>
    <h1>Hallo, selamat datang <?php echo $nama ?></h1>
    <?php
        echo "<h2>Hello World</h2>";
    ?>
</body>
</html>