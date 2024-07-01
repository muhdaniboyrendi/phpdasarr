<?php
    // melakukan pengulangan pada array
    // for / foreach

    $arr = [1, 2, 3, 4, 67, 86, 54, 21];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kotak{
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }
        .clear{
            clear: both;
        }
    </style>
</head>
<body>
    <?php for($i = 0; $i < count($arr); $i++) : ?>
        <div class="kotak"><?= $arr[$i]; ?></div>
    <?php endfor; ?>

    <div class="clear"></div>

    <?php foreach($arr as $a) : ?>
        <div class="kotak"><?= $a; ?></div>
    <?php endforeach; ?>
</body>
</html>