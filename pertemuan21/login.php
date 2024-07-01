<?php
    session_start();
    require 'function.php';

    // cek cookie
    if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];

        // ambil username berdasarkan id
        $result - mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if($key === hash('sha256', $row['username'])){
            $_SESION["login"] = true;
        }
    }

    // jika user sudah memiliki session login
    if(isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }


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

                // cek remember me
                if(isset($_POST["remember"])){
                    // buat cookie
                    setcookie("id", $row["id"], time() + 60);
                    setcookie("key", hash("sha256", $row["username"]), time() + 60);

                }

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            margin-top: 100px;
            text-align: center;
        }
        .form-floating{
            width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1 class="mb-4">Login</h1>
    <?php if(isset($error)) : ?>
        <p style="color: red;">username / password salah</p>
    <?php endif; ?>

    <form class="mb-3" action="" method="post">
        <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
        </div>
        <button class="btn btn-primary" type="submit" name="login">Login</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>