<?php
    session_start();
    require './controller/function.php';
    $id = $_GET["id"];
    $query = "SELECT fa.judul_acara as judul, fa.deskripsi_acara as isi, fa.image as gambar
    FROM Acara a JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id
    WHERE a.acara_id = '$id';";
    $acara = query($query)[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CitizenVoice | Acara</title>

    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/partisipasi-acara-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <?php include './common-element/navbar.php' ?>
    <div class="container">
        <?php
            echo'
        <div class="acara_content">
            <h1 class="label_acara">'.$acara["judul"].'</h1>
            <img src="./assets/image/formAcara/'.$acara["gambar"].'" alt="Image 1">
            <p class="deskripsi_acara">'.$acara["isi"].'</p>
            <a href="./form-partisipasi-acara.php?id='.$id.'" class="ikuti_acara_button button"> IKUTI</a>
        </div>
            ';

        ?>
        
    </div>
</body>
</html>