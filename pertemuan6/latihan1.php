<?php
    $angka = [[1,2,3], [4,5,6], [7,8,9]];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .clear{
            clear: both;
        }
    </style>
</head>
<body>
    <?php foreach($angka as $ang) : ?>
        <?php foreach($ang as $a) : ?>
            <?= $a; ?>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>
</body>
</html>