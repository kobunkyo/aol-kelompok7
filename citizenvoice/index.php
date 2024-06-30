<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CitizenVoice | Halaman Utama</title>
    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/homepage-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <?php include './common-element/navbar.php' ?>
    <div class="container">
        <div class="title">
            <p>Citizen</p>
            <p>Voice</p>
        </div>
        <div class="choice">
            <div class="lapor">
                <p>Lapor</p>
                <img src="./assets/image/gambar/icon-lapor.svg" alt="Icon Lapor">
                <a href="./form-laporan.php">MULAI LAPOR</a>
            </div>
            <div class="ikut-acara">
                <p>Ikut Acara</p>
                <img src="./assets/image/gambar/icon-ikut-acara.svg" alt="Icon Ikut Acara">
                <a href="./list-acara.php">CARI ACARA</a>
            </div>
        </div>
    </div>
</body>
</html>