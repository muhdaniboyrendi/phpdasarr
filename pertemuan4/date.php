<?php
    // tanggal
    echo date("l, d-M-Y"); //ada perbedaan antara huruf besar dan kecil

    // time
    // UNIX Timestamp
    // ini adalah detik yang sudah berlalu sejak 1 januari 1970
    echo time();

    echo date("l", time()+172800); //ini artinya tampilkan hari saat ini ditambah sekian detik dan operatornya bisa diganti dengan kurang
    echo date("l", time()+60*60*24*100); //ini artinya tampilkan hari saat ini ditambah 100 hari

    // mktime, untuk membuat sendri detik yang sudah berlalu
    // mktime(0,0,0,0,0,0);
    // urutan parameternya adalah : jam, menit, detik, bulan, tanggal, tahun
    // ini contoh untuk mengetahui hari lahir
    echo date("l", mktime(0,0,0,6,25,2003));

    // strtotime
    // ini juga contoh untuk melihat hari lahir
    echo date("l", strtotime("25 jun 2003"));
?>