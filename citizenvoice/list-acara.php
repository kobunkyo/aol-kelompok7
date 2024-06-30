<?php
    session_start();
    require './controller/function.php';
    $query = "SELECT a.acara_id as id, u.nama as nama, DATE_FORMAT(fa.tanggal_acara, '%d-%m-%Y') as tanggal, fa.judul_acara as judul, fa.deskripsi_acara as isi, fa.image as gambar
    FROM Acara a JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id
    JOIN Users u ON fa.user_id = u.user_id ORDER BY fa.tanggal_acara ASC;";
    $listAcara = query($query);
    
    if(isset($_POST["submit"])){
        if(isset($_POST["search"])){
            if($_POST["search"] !== ""){
                $keyword = $_POST["search"];
                $query = "SELECT a.acara_id as id, u.nama as nama, DATE_FORMAT(fa.tanggal_acara, '%d-%m-%Y') as tanggal, fa.judul_acara as judul, fa.deskripsi_acara as isi, fa.image as gambar
                FROM Acara a JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id
                JOIN Users u ON fa.user_id = u.user_id
                WHERE fa.judul_acara LIKE '%$keyword%' OR
                fa.deskripsi_acara LIKE '%$keyword%' OR
                fa.lokasi_acara LIKE '%$keyword%' ORDER BY fa.tanggal_acara ASC;";
                $listAcara = query($query);
            }else{
                $listAcara = query($query);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CitizenVoice | List Acara</title>
    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/list-acara-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <?php include './common-element/navbar.php' ?>
    <div class="container">
        <div class="head">
            <h2>Selenggarakan acaramu!</h2>
            <a href="./form-pengajuan-acara.php">SELENGKAPNYA</a>
        </div>
        <form class="form" action="./list-acara.php" method="post">
            <div class="search">
                <input type="search" name="search" id="search-key" placeholder="Search">
            </div>
            <div class="submit">
                <button type="submit" name="submit" id="submit-key">
                    <img src="./assets/image/gambar/icon-search.svg" alt="">
                </button>
            </div> 
        </form>
        <div id="acara-container">
        <?php
        foreach($listAcara as $acara){
            echo'
        <div class="list-acara" onclick="window.location.href=\'./partisipasi-acara.php?id='.$acara["id"].'\'">
            <div class="title">
                <h2>'.$acara["nama"].'</h2>
                <h3>'.$acara["tanggal"].'</h3>
            </div>
            <img src="./assets/image/formAcara/'.$acara["gambar"].'" alt="gambar">
            <p class="judul">'.$acara["judul"].'</p>
            <p class="isi">'.$acara["isi"].'</p>
        </div>
            ';
        }
        ?>
        </div>
    </div>
</body>
<script src="./js/search-acara.js"></script>
</html>