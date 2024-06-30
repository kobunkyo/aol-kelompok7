<?php
    session_start();
    require './controller/function.php';
    $query = "SELECT u.nama as nama, DATE_FORMAT(fl.tanggal_laporan, '%d-%m-%Y') as tanggal, fl.isi_laporan as isi, fl.status_laporan as status, fl.lampiran as gambar
    FROM FormLaporan fl
    JOIN Users u ON fl.user_id = u.user_id ORDER BY fl.tanggal_laporan DESC;";
    $listLaporan = query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CitizenVoice | List Laporan</title>

    <link rel="stylesheet" href="./css/css-reset.css">
    <link rel="stylesheet" href="./css/list-laporan-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <?php include './common-element/navbar.php' ?>
    <div class="container">
        <h2 class="title">Status Laporan</h2>
        <div class="status">
            <div class="merah">
                <div class="warna-merah"></div>
                <p>Menandakan laporan kalian belum diterima oleh kami dan akan segera kami proses</p>
            </div>
            <div class="kuning">
                <div class="warna-kuning"></div>
                <p>Menandakan Laporan kalian sudah diterima dan sedang proses untuk segera dilaksanakan</p>
            </div>
            <div class="hijau">
                <div class="warna-hijau"></div>
                <p>Menandakan Laporan kalian sudah diterima dan sedang proses pelaksanaan</p>
            </div>
        </div>
        <?php 
        foreach($listLaporan as $laporan){
            echo'
        <div class="list-laporan">
            <div class="detail">
                <div class="left">
                    <div class="head">
                        <p class="user">'.$laporan["nama"].'</p>
                        <p class="date">'.$laporan["tanggal"].'</p>
                    </div>
                    <img src="./assets/image/formLaporan/'.$laporan["gambar"].'" alt="">
                </div>
                <div class="right">
                    <p>'.$laporan["isi"].'</p>
                </div>
            </div>
            <div class="ket-status">
                <p>Status :</p>
                <div class="warna status-'.$laporan["status"].'"></div>
            </div>
        </div>
            ';
        }
        
        ?>
        
    </div>
</body>
</html>