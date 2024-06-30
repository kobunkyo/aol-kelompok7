<?php
    session_start();
    require './controller/function.php';

    if(isset($_POST["submit"])){
        echo('
            <script>
            alert("Form akan di review secepatnya");
            document.location.href = "./beranda.php";
            </script>
        ');
        header("Location: ./beranda.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Acara</title>
    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/form-pengajuan-acara-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <?php include './common-element/navbar.php' ?>
    <div class="container">
        <div class="title">
            <p>Formulir Pengajuan Acara</p>
        </div>
        <div class="form">
            <form name="form-pengajuan" action="./form-pengajuan-acara.php" method="post" enctype="multipart/form-data">
                <div class="judul">
                    <label for="judul">Judul Acara</label>
                    <input type="text" name="judul" id="judul" placeholder="Ketikan judul acara Anda">
                </div>
                <div class="isi">
                    <label for="isi">Isi Acara</label>
                    <textarea name="isi" id="isi" placeholder="Ketikan isi acara Anda"></textarea>
                </div>
                <div class="tanggal">
                    <label for="tanggal">Tanggal Pengadaan Acara</label>
                    <input type="date" name="tanggal" id="tanggal" placeholder="Ketikan daerah yang dilaporkan">
                </div>
                <div class="lokasi">
                    <label for="lokasi">Lokasi Pengadaan Acara</label>
                    <input type="text" name="lokasi" id="lokasi" placeholder="Ketikan lokasi acara Anda">
                </div>
                <div class="dana">
                    <label for="dana">Dana yang dibutuhkan</label>
                    <div class="input">
                        <p>Rp</p>
                        <input type="text" name="dana" id="dana" placeholder="Masukan nominal dana yang dibutuhkan">
                    </div>
                    
                </div>
                <div class="attachment">
                    <label for="attachment"><img src="../assets/image/gambar/icon-lampiran.svg" alt=""> Unggah Lampiran (foto, video, atau sejenisnya)</label>
                    <input type="file" name="attachment" id="attachment">
                </div>
                <button type="submit" name="submit">Kirim</button>
            </form>
        </div>
    </div>
</body>
</html>