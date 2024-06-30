<?php
    session_start();
    require './controller/function.php';

    if(isset($_POST["submit"])){
        if(register($_POST) > 0){
            echo "<script>
                    alert('Register succed');
                    window.location.href = './login.php';
                </script>";
          } else{
              echo "<script>
                      alert('Register failed');
                  </script>";     
          }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CitizenVoice | Register</title>
    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/register-style.css">

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
        <div class="form-register">
            <p >DAFTAR</p>
            <div class="isi-form">
                <form name="register-form" action="./register.php" method="post">
                    <div class="nama-input">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukan nama">
                    </div>
                    <div class="alamat-input">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder="Masukan alamat">
                    </div>
                    <div class="email-input">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukan alamat email">
                    </div>
                    <div class="password-input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukan password">
                    </div>
                    <div class="conf-password-input">
                        <label for="conf-password">Konfirmasi password Password</label>
                        <input type="password" name="conf-password" id="conf-password" placeholder="Masukan password kembali">
                    </div>
                    <div class="masuk-btn">
                        <button type="submit" name="submit">DAFTAR</button>
                    </div>
                </form>
            </div>
            <div class="login-redirect">
                <a href="./login.php">Sudah punya akun?</a>
            </div>
            
        </div>
        <div class="index-redirect">
            <a href="./index.php">&lt; Kembali ke Laman Utama</a>
        </div>
    </div>
</body>
</html>

