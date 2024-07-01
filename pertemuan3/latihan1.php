<?php
    // pengulangan
    // for
    // while
    // do.. while
    // foreach ==> ini pengulangan khusus aray

    for($i = 0; $i < 5; $i++){
        echo "Hello World<br>";
    }

    $x = 0;
    while($x < 5){
        echo "Hello World<br>";
        $x++;
    }

    $n = 0;
    do{
        echo "Hello World<br>";
        $n++;
    }while($n < 5);
    // perbedaan dari while adalah ketika blok nya bernilai false maka akan dijakankan dulu 1x sedangkan while tidak
?>