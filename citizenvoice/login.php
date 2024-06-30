<?php
    session_start();
    require './controller/function.php';

    if(isset($_POST["submit"])){
        if(login($_POST)){
            header('Location: beranda.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CitizenVoice | Login</title>
    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/login-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <div class="container">
        <div class="title">
            <p>CitizenVoice</p>
        </div>
        <div class="form-login">
            <p >MASUK</p>
            <div class="isi-form">
                <form name="login-form" action="./login.php" method="post">
                    <div class="email-input">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukan alamat email">
                    </div>
                    <div class="password-input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukan password">
                    </div>
                    <div class="masuk-btn">
                        <button type="submit" name="submit">MASUK</button>
                    </div>
                </form>
            </div>
            <div class="regist-redirect">
                <a href="./register.php">Belum punya akun?</a>
            </div>
            
        </div>
        <div class="index-redirect">
            <a href="./index.php">&lt; Kembali ke Laman Utama</a>
        </div>
    </div>
</body>
</html>

