<?php
    session_start();

    // jika user sudah memiliki session login
    if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }
    
    require 'function.php';

    if(isset($_POST["register"])){
        if(registrasi($_POST) > 0){
            echo "<script>
                    alert('Akun anda berhasil didaftarkan');
                    document.location.href = 'index.php';
                </script>";
        }else{
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h1>Registrasi</h1>

    <form action="" method="post">
        <label for="username">Username : </label><br>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password : </label><br>
        <input type="password" name="password" id="password">
        <br>
        <label for="password2">Konfirmasi Password : </label><br>
        <input type="password" name="password2" id="password2">
        <br><br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>