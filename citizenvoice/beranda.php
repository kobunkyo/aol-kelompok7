<?php
    session_start();
    require './controller/function.php';
    $query = "SELECT a.acara_id as id, fa.judul_acara as judul, fa.deskripsi_acara as isi, fa.image as gambar
    FROM Acara a 
    JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id ORDER BY id DESC 
    LIMIT 3;";
    $listAcara = query($query);

    $query = "SELECT u.nama as nama, u.profile_picture as pp, fl.isi_laporan as isi
    FROM FormLaporan fl JOIN Users u ON fl.user_id = u.user_id
    ORDER BY fl.tanggal_laporan LIMIT 5";
    $listLaporan = query($query);

    if(isset($_POST["submit"])){
        if(isset($_POST["search"])){
            if($_POST["search"] !== ""){
                $keyword = $_POST["search"];
                $query = "SELECT a.acara_id as id, fa.judul_acara as judul, fa.deskripsi_acara as isi, fa.image as gambar
                FROM Acara a 
                JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id 
                WHERE fa.judul_acara LIKE '%$keyword%' OR
                fa.deskripsi_acara LIKE '%$keyword%' OR
                fa.lokasi_acara LIKE '%$keyword%' LIMIT 3;";
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
    <title>CitizenVoice | Beranda</title>
    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/beranda-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <?php include './common-element/navbar.php' ?>
    <div class="container">
        <div class="left-content">
            <div class="head">
                <h2>Halo, Username</h2>
                <p>“Tingkatkan Suaramu, Jaga Lingkunganmu”</p>
                <p>CitizenVoice - Suara Masyarakat untuk Lingkungan yang Lebih Baik!</p>
            </div>
            <div class="list-laporan">
                <div class="scroll">
                    <?php
                    foreach($listLaporan as $laporan){
                        echo'
                    <div class="laporan">
                        <img src="./assets/image/users/'.$laporan["pp"].'" alt="">
                        <div class="isi-laporan">
                            <h2>'.$laporan["nama"].'</h2>
                            <p>'.$laporan["isi"].'</p>
                        </div>
                    </div>
                        ';
                    }
                        
                    ?>
                    
                </div>
                <a href="./form-laporan.php">Buat laporanmu!</a>
            </div>
            <div class="button">
                <div class="list-partisipasi" onclick="window.location.href = './list-partisipasi.php'">
                    <div class="logo">
                        <img src="./assets/image/gambar/icon-list-partisipasi.svg" alt="">
                    </div>
                    <p>List Partisipasi</p>
                </div>
                
                <div class="list-pelaporan" onclick="window.location.href = './list-laporan.php'">
                    <div class="logo">
                        <img src="./assets/image/gambar/icon-pelaporan.svg" alt="">
                    </div>
                    <p>Status Pelaporan</p>
                </div>
            </div>
        </div>
        <div class="right-content">
            <form class="form" action="./beranda.php" method="post">
                <div class="search">
                    <input type="search" name="search" id="search-key" placeholder="Search">
                </div>
                <div class="submit">
                    <button type="submit" name="submit" id="submit-key">
                        <img src="./assets/image/gambar/icon-search.svg" alt="">
                    </button>
                </div> 
            </form>
            <div class="acara">
            <div class="acara-container" id="acara-container">
            <?php
                foreach($listAcara as $acara){
                    echo'
                <div class="detail-acara" onclick="window.location.href = \'./partisipasi-acara.php?id='.$acara["id"].'\'">
                    <img src="./assets/image/formAcara/'.$acara["gambar"].'" alt="">
                    <h2>'.$acara["judul"].'</h2>
                    <p>'.$acara["isi"].'</p>
                </div>            
                    ';
                }
            ?>
            </div>
            <a href="./list-acara.php">Lihat lebih banyak ></a>
            </div>
            
        </div>
    </div>
</body>
<script src="./js/search-beranda.js"></script>
</html>