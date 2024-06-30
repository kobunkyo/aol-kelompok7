<?php
    session_start();
    require './controller/function.php';
    $id = $_GET["id"];
    $query = "SELECT fa.judul_acara as judul, CONCAT('Rp',FORMAT(a.biaya_operasional, 'c', 'de_DE')) as biaya
    FROM Acara a JOIN FormPengajuanAcara fa ON a.form_pengajuan_acara_id = fa.form_pengajuan_acara_id
    WHERE a.acara_id = '$id';";
    $acara = query($query)[0];
    $biaya = query("SELECT biaya_operasional FROM Acara WHERE acara_id = '$id';");

    if(isset($_POST["submit"])){
    //     if(formPartisipasi($_POST, $_SESSION["user"],$biaya, $id)){
    //         echo('
    //     <script>
    //       alert("Form akan di review secepatnya");
    //       document.location.href = "./beranda.php";
    //     </script>
    //   ');
    //     }else{
    //         echo('
    //     <script>
    //       alert("Ada kesalahan saat membuat form");
    //     </script>
    //   ');
    //     }
        echo('
            <script>
            alert("Form akan di review secepatnya");
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
    <title>Form Partisipasi Acara</title>
    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/form-partisipasi-acara-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <?php include './common-element/navbar.php' ?>
    <div class="container">
        <div class="title">
            <p>Formulir Parsipasi Acara</p>
        </div>
        <div class="kegiatan">
            <p>Kegiatan: <?php echo $acara["judul"];?></p>
        </div>
        <div class="form">
            <form name="form-pengajuan" action="./form-partisipasi-acara.php" method="post" enctype="multipart/form-data">
                <div class="nama">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Ketikan nama Anda">
                </div>
                <div class="daerah">
                    <label for="daerah">Kota Asal</label>
                    <input type="text" name="daerah" id="daerah" placeholder="Ketikan kota asal Anda">
                </div>
                <div class="biaya">
                    <p>Biaya Operasional: <?php echo $acara["biaya"];?></p>
                    <p id="keterangan">*biaya operasional digunakan untuk sarung tangan, trash bag, seragam, kendaraan, dan keperluan kegiatan.</p>
                </div>
                <div class="pembayaran">
                    <img src="./assets/image/gambar/icon-qris.svg" alt="">
                    <p>LAKUKAN PEMBAYARAN</p>
                </div>
                <div class="attachment">
                    <label for="attachment"><img src="../assets/image/gambar/icon-lampiran.svg" alt=""> Unggah Bukti Pembayaran (foto)</label>
                    <input type="file" name="attachment" id="attachment">
                </div>
                
                <button type="submit" name="submit">Kirim</button>
            </form>
        </div>
    </div>
</body>
</html>