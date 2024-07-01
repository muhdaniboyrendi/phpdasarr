<?php
    // array, sebuah variable yang dapat memeiliki banyak nilai

    // membuat array
    // cara lama
    $hari = array("Senin", "Selasa", "Rabu");
    // cara baru
    $bulan = ["Januari", "Februari"];
    // elemen array boleh memiliki tipe data yang berbeda
    $arr1 = [123, "tulisan", false];


    // menampilkan array
    // var_dump()  /  print_r()
    var_dump($hari);
    echo "<br>";
    print_r($bulan);
    echo "<br>";
    
    
    // menampilkan 1 elemen pada array
    echo $arr1[1];
    echo "<br>";


    // menambahkan elemen baru pada array
    $hari[] = "Kamis"; //ini menambahkan nya diakhir array
    $hari[] = "Jumat";
    var_dump($hari);
?>