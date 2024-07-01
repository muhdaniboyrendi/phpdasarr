<?php
    session_start();

    // jika user sudah memiliki session login
    if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }

    require 'function.php';

    if(isset($_POST["login"])){ //jika tombol login sudah ditekan
        $username = $_POST["username"];
        $password = $_POST["password"];

        // cek username
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if(mysqli_num_rows($result) === 1){ //berfungsi untuk menghitung ada barapa baris yang dikembalikan dari fungsi SELECT diatas
            // cek password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])){ //ini berfungsi untuk mengecek apakah sebuah stiring sama dengan hash nya
                // set session
                $_SESSION["login"] = true;
                header("Location: index.php");
                exit;
            }
        }
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if(isset($error)) : ?>
        <p style="color: red;">username / password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="username">Username : </label><br>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password : </label><br>
        <input type="password" name="password" id="password">
        <br><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>